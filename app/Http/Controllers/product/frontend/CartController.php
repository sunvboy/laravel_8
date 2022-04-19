<?php

namespace App\Http\Controllers\product\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Products_version;
use Illuminate\Support\Facades\DB;
use Session;
use App\Components\Coupon as CouponHelper;

class CartController extends Controller
{
    protected $coupon;
    public function __construct()
    {
        $this->coupon = new CouponHelper();
    }

    public function index()
    {
        $cart = Session::get('cart');
        $coupon = Session::get('coupon');
        $seo['canonical'] = route('cart.index');
        $seo =  seoFrontend('cart_index');
        return view('cart.index', compact('cart', 'coupon', 'seo'));
    }
    public function checkout()
    {
        $cart = Session::get('cart');
        if (!isset($cart)) {
            return redirect()->route('homepage.index')->with('error', "Có lỗi xảy ra");
        }
        $coupon = Session::get('coupon');
        $getCity = DB::table('vn_province')->orderBy('name', 'asc')->get();
        $listCity['0'] = 'Tỉnh/Thành Phố';
        if (isset($getCity)) {
            foreach ($getCity as $key => $val) {
                $listCity[$val->provinceid] = $val->name;
            }
        }
        // Session::forget('coupon');
        // Session::save();
        $detail = Page::find(4);
        $seo['canonical'] = route('cart.checkout');
        $seo =  seoFrontend('cart_checkout');
        return view('cart.checkout', compact('cart', 'coupon', 'seo', 'listCity'));
    }
    public function success($id)
    {
        if (empty($id)) {
            return redirect()->route('homepage.index')->with('error', "Có lỗi xảy ra");
        }
        $detail = Order::find($id);
        if (!isset($detail)) {
            return redirect()->route('homepage.index')->with('error', "Có lỗi xảy ra");
        }
        //xóa giỏ hàng
        Session::forget('cart');
        Session::forget('coupon');
        //xóa coupon
        Session::save();
        $seo =  seoFrontend('cart_success');
        return view('cart.success', compact('seo', 'detail'));
    }


    public function getversion(Request $request)
    {
        $attr = $request->attr;
        $id = $request->id;
        $attr = substr($attr, 1, strlen($attr));
        $ex = explode(";", $attr);
        $id_sort = array();
        foreach ($ex as $key => $row) {
            $id_sort[$key] = $row;
        }
        array_multisort($id_sort, SORT_DESC, $ex);
        $getVersionproduct = Products_version::select('title_version', 'price_version', 'id_sort')->where('productid', $id)->where('id_sort', json_encode($id_sort))->first();

        echo json_encode($getVersionproduct);
        die();
    }

    public function addtocart(Request $request)
    {
        $alert = array(
            'error' => '',
            'message' => 'Sản phẩm được thêm vào giỏ hàng thành công!',
            'result' => ''
        );
        $id = $request->id;
        $id_version = $request->id_version;
        $product = Product::find($id);
        if (!$product) {
            $alert['error'] = 'Sản phẩm không tồn tại';
        }
        //Lấy giá nếu tồn tại product version
        $getVersionproduct = Products_version::select('title_version', 'price_version', 'id_sort')->where('productid', $id)->where('id_sort', $id_version)->first();
        if (!empty($getVersionproduct)) {
            $price = $getVersionproduct->price_version;
        } else {
            $price = getPrice(array('price' => $product->price, 'price_sale' => $product->price_sale, 'price_contact' => $product->price_contact));
            $price = $price['price_final_none_format'];
        }
        $title_version = !empty($getVersionproduct->title_version) ? $getVersionproduct->title_version : '';
        // Session::forget('cart');die;
        $cart = Session::get('cart');
        //tạo rowid
        $rowid = md5($product->id . $title_version);
        if (isset($cart[$rowid])) {
            $cart[$rowid]['quantity'] =  $cart[$rowid]['quantity'] + $request->quantity;
        } else {
            $cart[$rowid] = [
                "id" => $product->id,
                "slug" => $product->slug,
                "title" => $product->title,
                "quantity" => $request->quantity,
                "price" => $price,
                "image" => $product->image,
                "options" => $title_version
            ];
        }
        Session::put('cart', $cart);
        Session::save();
        // dd(Session::all());die;
        echo json_encode($alert);
        die();
    }

    public function updatecart(Request $request)
    {
        $alert = array(
            'error' => '',
            'message' => '',
            'html' => '',
            'total' => 0,
            'total_coupon' => 0,
            'total_items' => 0,
            'coupon_price' => 0
        );
        $cart = Session::get('cart');

        if ($request->type == 'update') {
            if ($request->rowid and $request->quantity) {
                $cart[$request->rowid]["quantity"] = $request->quantity;
                //return
                $alert = $this->getUpdateCart($cart, $alert);
            } else {
                $alert['error'] = "Cập nhập giỏ hàng không thành công";
            }
        } else if ($request->type == 'delete') {
            if ($request->rowid) {
                if (isset($cart[$request->rowid])) {
                    unset($cart[$request->rowid]);
                    //return
                    $alert = $this->getUpdateCart($cart, $alert);
                } else {
                    $alert['error'] = "Xóa giỏ hàng không thành công";
                }
            } else {
                $alert['error'] = "Xóa giỏ hàng không thành công";
            }
        } else {
            $alert['error'] = "Có lỗi xảy ra";
        }
        echo json_encode($alert);
        die();
    }

    public function addcounpon(Request $request)
    {

        $name = $request->name;
        if (!empty($name)) {
            $alert = $this->coupon->getCoupon($name, TRUE);
        } else {
            $alert['error'] = "Mã khuyến mại không được để trống";
        }

        echo json_encode($alert);
        die();
    }
    public function deletecoupon(Request $request)
    {
        $alert = array(
            'error' => '',
            'message' => '',
            'price' => 0,
            'total' =>  0
        );
        $id  = $request->id;
        $cart = Session::get('cart');
        $total = 0;
        if ($cart) {
            foreach ($cart as $v) {
                $total += $v['price'] * $v['quantity'];
            }
        }
        $coupon = Session::get('coupon');
        if (!in_array($id, array_keys($coupon))) {
            $alert['error'] = "Mã giảm giá không tồn tại";
        } else {
            unset($coupon[$id]);
            Session::put('coupon', $coupon);
            Session::save();
            //return
            $price_counpon = 0;
            $html = '';
            if (isset($coupon)) {
                foreach ($coupon as $v) {
                    $price_counpon += $v['price'];
                    $html .= '<tr>
                        <th>Mã giảm giá : <span class="cart-coupon-name">' . $v['name'] . '</span></th>
                        <td>-<span class="amount cart-coupon-price">' . number_format($v['price']) . ' VNĐ</span> <a href="" data-id="' . $v['id'] . '" class="remove-coupon">[Xóa]</a></td>
                    </tr>';
                }
            }
            $alert['price'] = $price_counpon;
            $alert['html'] = $html;
            $alert['total'] = number_format($total - $price_counpon) . ' VNĐ';
            $alert['message'] = "Xóa mã giảm giá thành công";
        }
        echo json_encode($alert);
    }
    public function getUpdateCart($cart = [], $alert = [])
    {

        $coupon = Session::get('coupon');
        $html = '';
        Session::put('cart', $cart);
        Session::save();
        $total = 0;
        $total_items = 0;
        if ($cart) {
            foreach ($cart as $k => $v) {
                $total += $v['price'] * $v['quantity'];
                $total_items += $v['quantity'];
                $html .= htmlItemCart($k, $v);
            }
            //nếu tồn tại mã giảm giá thì tính toán lại
            $coupon_price = 0;
            $coupon_html = '';
            if (!empty($coupon)) {
                foreach ($coupon as $v) {
                    $this->coupon->getCoupon($v['name'], FALSE);
                }
            }
            $coupon = Session::get('coupon');
            if (!empty($coupon)) {
                foreach ($coupon as $v) {
                    $coupon_price += $v['price'];
                    $coupon_html .= '<tr>
                        <th>Mã giảm giá : <span class="cart-coupon-name">' . $v['name'] . '</span></th>
                        <td>-<span class="amount cart-coupon-price">' . number_format($v['price']) . ' VNĐ</span> <a href="" data-id="' . $v['id'] . '" class="remove-coupon">[Xóa]</a></td>
                    </tr>';
                }
            }
            //end
            $alert['html'] = $html;
            $alert['message'] = 'Cập nhập sản phẩm!';
            $alert['total'] = $total;
            $alert['total_coupon'] = $total - $coupon_price;
            $alert['total_items'] = $total_items;
            $alert['coupon_price'] = $coupon_price;
            $alert['coupon_html'] = $coupon_html;
        }
        return $alert;
    }
}
