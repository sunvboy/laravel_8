<?php

namespace App\Http\Controllers\product\backend;

use App\Components\Nestedsetbie;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Components\Helper;

class ProductController extends Controller
{
    protected $Nestedsetbie;
    protected $Lang;
    public function __construct()
    {
        $this->Nestedsetbie = new Nestedsetbie(array('table' => 'category_products'));
        $this->Helper = new Helper();
    }
    public function index()
    {
        $module = 'product';
        $htmlCatalogue = $this->Nestedsetbie->dropdown();
        $data =  Product::where('alanguage', config('app.locale'))->orderBy('order', 'ASC')->orderBy('id', 'DESC')->paginate(env('APP_paginate'));
        $count =  Product::count();
        return view('product.backend.product.index', compact('data', 'module', 'htmlCatalogue'));
    }
    public function create()
    {
        $module = 'products';
        $dropdown = getFunctions();
        $htmlCatalogue = $this->Nestedsetbie->dropdown();
        $category_attribute = DB::table('category_attributes')
            ->select('id', 'title')
            ->where('id', '!=', 1)
            ->where('alanguage', config('app.locale'))
            ->get();
        //tag
        $getTags = [];
        if (old('tags')) {
            $getTags = old('tags');
        }
        $tags = relationships('\App\Models\Tag', $getTags);
        //end
        //brands
        $getBrands = [];
        if (old('brands')) {
            $getBrands = old('brands');
        }
        $brands = relationships('\App\Models\Brand', $getBrands);
        //end
        if (old('attribute')) {
            $attribute = old('attribute');
        }
        $attribute_json = [];
        if (!empty($attribute)) {
            foreach ($attribute as $key => $value) {
                if ($value == '') {
                    $attribute_json[$key] = '';
                } else {
                    // $attribute_json[$key]['json'] = base64_encode(json_encode($value));
                    $attributes =  DB::table('attributes')->orderBy('order', 'asc')->orderBy('id', 'desc')->whereIn('id', $value)->get();
                    $temp = [];
                    if (!empty($attributes)) {
                        foreach ($attributes as $val) {
                            $temp[] = array(
                                'id' => $val->id,
                                'text' => $val->title,
                            );
                        }
                    }
                    $attribute_json[$key] = $temp;
                }
            }
        }
        $htmlAttribute = $this->Nestedsetbie->DropdownCatalogue($category_attribute);
        return view('product.backend.product.create', compact('module', 'htmlCatalogue', 'htmlAttribute', 'tags', 'brands', 'attribute_json', 'dropdown'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:router',
            'code' => 'unique:products',
            'catalogueid' => 'required|gt:0',
        ], [
            'title.required' => 'Tiêu đề là trường bắt buộc.',
            'slug.required' => 'Đường dẫn là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn đã tồn tại.',
            'code.unique' => 'Mã sản phẩm đã tồn tại.',
            'catalogueid.gt' => 'Danh mục chính là trường bắt buộc.',
        ]);
        $this->submitProduct($request, 'create', 0);
        return redirect()->route('product.index')->with('success', "Thêm mới sản phẩm thành công");
    }
    public function edit($id)
    {
        $module = 'products';
        $dropdown = getFunctions();
        $detail  = Product::where('alanguage', config('app.locale'))->find($id);
        if (!isset($detail)) {
            return redirect()->route('product.index')->with('error', "Sản phẩm không tồn tại");
        }
        $htmlCatalogue = $this->Nestedsetbie->dropdown();
        $category_attribute = DB::table('category_attributes')
            ->select('id', 'title')
            ->where('alanguage', config('app.locale'))
            ->where('id', '!=', 1)
            ->get();
        $htmlAttribute = $this->Nestedsetbie->DropdownCatalogue($category_attribute);
        //tags
        $getTags = [];
        if (old('tags')) {
            $getTags = old('tags');
        } else {
            foreach ($detail->tags as $k => $v) {
                $getTags[] = $v['tagid'];
            }
        }
        $tags = relationships('\App\Models\Tag', $getTags);
        //end tag
        //brands
        $getbrands = [];
        if (old('brands')) {
            $getbrands = old('brands');
        } else {
            foreach ($detail->brands as $k => $v) {
                $getbrands[] = $v['brandid'];
            }
        }
        $brands = relationships('\App\Models\Brand', $getbrands);
        //end brand
        //attr
        if (old('attribute')) {
            $attribute = old('attribute');
        } else {
            $version_json = json_decode(base64_decode($detail->version_json), true);
            $attribute = $version_json[2];
        }
        $attribute_json = [];
        if (!empty($attribute)) {
            foreach ($attribute as $key => $value) {
                if ($value == '') {
                    $attribute_json[$key] = '';
                } else {
                    // $attribute_json[$key]['json'] = base64_encode(json_encode($value));
                    $attributes =  DB::table('attributes')->orderBy('order', 'asc')->orderBy('id', 'desc')->whereIn('id', $value)->get();
                    $temp = [];
                    if (!empty($attributes)) {
                        foreach ($attributes as $val) {
                            $temp[] = array(
                                'id' => $val->id,
                                'text' => $val->title,
                            );
                        }
                    }
                    $attribute_json[$key] = $temp;
                }
            }
        }
        //end attr
        return view('product.backend.product.edit', compact('module', 'detail', 'htmlCatalogue', 'htmlAttribute', 'tags', 'brands', 'attribute_json', 'dropdown'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:router,slug,' . $id . ',moduleid',
            'code' => 'unique:products,code,' . $id . ',id',
            'catalogueid' => 'required|gt:0',
        ], [
            'title.required' => 'Tiêu đề là trường bắt buộc.',
            'slug.required' => 'Đường dẫn là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn đã tồn tại.',
            'code.unique' => 'Mã sản phẩm đã tồn tại.',
            'catalogueid.gt' => 'Danh mục chính là trường bắt buộc.',
        ]);
        $this->submitProduct($request, 'update', $id);
        return redirect()->route('product.index')->with('success', "Cập nhập sản phẩm thành công");
    }
    public function destroy($id)
    {
        //
    }
    public function submitProduct($request = [], $action = '', $id = 0)
    {
        if ($action == 'create') {
            $time = 'created_at';
            $user = 'userid_created';
        } else {
            $time = 'updated_at';
            $user = 'userid_updated';
        }
        $catalogue = $request['catalogue'];
        $tmp_catalogue = [];
        if (isset($catalogue)) {
            foreach ($catalogue as $v) {
                if ($v != 0 && $v != $request['catalogueid']) {
                    $tmp_catalogue[] = $v;
                }
            }
        }
        //version
        $checkbox = isset($request['checkbox_val']) ? $request['checkbox_val'] : [];
        $attribute_catalogue = isset($request['attribute_catalogue']) ? $request['attribute_catalogue'] : [];
        $attribute = isset($request['attribute']) ? $request['attribute'] : [];
        $_data_product = [
            'title' => $request['title'],
            'slug' => $request['slug'],
            'description' => $request['description'],
            'code' => is($request['code']),
            'price' => isset($request['price']) ? str_replace('.', '', $request['price']) : 0,
            'price_sale' => str_replace('.', '', $request['price_sale']),
            'price_contact' => isset($request['price_contact']) ? $request['price_contact'] : 0,
            'image_json' =>  !empty($request['album']) ? json_encode($request['album']) : '',
            'catalogueid' => $request['catalogueid'],
            'catalogue' => json_encode($tmp_catalogue),
            'image' => isset($request['album']) ? $request['album'][0] : '',
            'meta_title' => $request['meta_title'],
            'meta_description' => $request['meta_description'],
            'publish' => $request['publish'],
            $user => Auth::user()->id,
            $time => Carbon::now(),
            'version_json' => base64_encode(json_encode(array($checkbox, $attribute_catalogue, $attribute))),
            'alanguage' => config('app.locale'),
        ];
        if ($action == 'create') {
            $id = Product::insertGetId($_data_product);
        } else {
            DB::table('products')->where('id', '=', $id)->update($_data_product);
        }
        if (!empty($id)) {
            //xóa khi cập nhập
            if ($action == 'update') {
                //xóa catalogue_relationship
                DB::table('catalogues_relationships')->where('moduleid', $id)->where('module', 'product')->delete();
                //xóa tags_relationship
                DB::table('tags_relationships')->where('moduleid', $id)->where('module', 'product')->delete();
                //xóa brands_relationship
                DB::table('brands_relationships')->where('moduleid', $id)->where('module', 'product')->delete();
                //xóa attribute_relationship
                DB::table('attributes_relationships')->where('moduleid', $id)->delete();
                //Xóa  products_versions
                DB::table('products_versions')->where('productid', $id)->delete();
                //xóa router
                DB::table('router')->where('moduleid', $id)->where('module', 'products')->delete();
            }
            //thêm vào bảng catalogue_relationship
            $this->Helper->catalogue_relation_ship($id, $request['catalogueid'], $tmp_catalogue, 'product');
            //thêm vào bảng attribute_relationship
            $this->Helper->attribute_relation_ship($id, $attribute);
            // thêm nhóm thuộc tính vào nhóm sản phẩm
            $this->Helper->updateAttridInProduct_catalogue(array(
                'catalogueid' => $request['catalogueid'],
                'tmp_catalogue' => $tmp_catalogue,
                'attribute_catalogue' => $attribute_catalogue,
                'attribute' => $attribute,
            ));
            // thêm phiên bản sản phẩm
            $this->Helper->createProduct_version(array(
                'id_version' => $request['id_version'],
                'title_version' => $request['title_version'],
                'price_version' => $request['price_version'],
                'code_version' => $request['code_version'],
                'status_version' => $request['status_version'],
                'productid' => $id,
            ));
            //thêm vào bảng brand_relationship
            $this->Helper->_relation_ship($id, $request['brands'], 'brands', 'brandid', 'product');
            //thêm vào bảng tag_relationship
            $this->Helper->_relation_ship($id, $request['tags'], 'tags', 'tagid', 'product');
            //thêm router
            DB::table('router')->insert([
                'moduleid' => $id,
                'module' => 'products',
                'slug' => $request['slug'],
                'created_at' => Carbon::now(),
            ]);
            //them khoang gia vao bang attributes
            $this->Helper->price_attributes((float)str_replace('.', '', $request['price']), $id);
        }
    }
    public function get_attrid(Request $request)
    {
        $catalogueid = $request->catalogueid;
        $detailCatalogue = DB::table('category_products')->select('id', 'attrid')->where('id', '=', $catalogueid)->first();
        $attribute_catalogue = getListAttr($detailCatalogue->attrid);
        $html = '';
        if (check_array($attribute_catalogue)) {
            foreach ($attribute_catalogue as $key => $val) {
                $html = $html . '<li class="catalogue m-b-xs" data-keyword = ' . $val['keyword_cata'] . '>';
                $html = $html . '<div class="m-l-sm m-b-xs" style="color:#2c3e50"><b>' . $key . '</b></div>';
                $html = $html . '<div class="row no-margins" >';
                if (check_array($val)) {
                    foreach ($val as $sub => $subs) {
                        if ($sub != 'keyword_cata') {
                            $html = $html . '<div class="col-sm-3">';
                            $html = $html . '<div class="uk-flex uk-flex-middle m-b-xs attr">';
                            $html = $html . '<input  class="checkbox-item filter" type="checkbox" name="attr[]" value="' . $sub . '">';
                            $html = $html . '<label for="" class="label-checkboxitem m-r"></label>';
                            $html = $html . $subs;
                            $html = $html . '</div>';
                            $html = $html . '</div>';
                        }
                    }
                }
                $html = $html . '</div>';
                $html = $html . '</li>';
            }
        }
        echo json_encode(array(
            'attribute_catalogue' => $html,
        ));
        die();
    }
    public function listproduct(Request $request)
    {
        // $query = '';
        // $json = '';
        $data =  Product::where('alanguage', config('app.locale'))->orderBy('order', 'ASC')->orderBy('id', 'DESC');
        //xử lý $keyword = $request->keyword;
        $keyword = $request->keyword;
        if (!empty($keyword)) {
            //$query = $query . 'AND (tb1.title LIKE \'%' . $keyword . '%\')';
            $data =  $data->where('products.title', 'like', '%' . $keyword . '%');
        }
        //xử lý danh mục
        // $json .= 'JOIN `catalogues_relationships` as `tb3` ON `tb1`.`id` = `tb3`.`moduleid` AND `tb3`.`module` = "product" ';
        $data = $data->join('catalogues_relationships', 'products.id', '=', 'catalogues_relationships.moduleid')->where('catalogues_relationships.module', '=', 'product');
        if (!empty($request->catalogueid)) {
            // $query = $query . ' AND tb3.catalogueid IN' . ' (' . $request->catalogueid . ')';
            $data =  $data->where('catalogues_relationships.catalogueid', $request->catalogueid);
        }
        //xử lý khoảng giá
        $request->start_price = (int)str_replace('.', '', $request->start_price);
        $request->end_price = (int)str_replace('.', '', $request->end_price);
        if (isset($request->start_price) && !empty($request->end_price)) {
            $data =  $data->where('products.price', '>=', $request->start_price);
            $data =  $data->where('products.price', '<=', $request->end_price);
            // $query = $query . ' AND tb1.price >= ' . $request->start_price . ' AND tb1.price <= ' . $request->end_price . ' ';
        }
        //xử lý tags
        if (!empty($request->brand)) {
            // $json .= 'INNER JOIN `brands_relationships` as `brand` ON `tb1`.`id` = `brand`.`moduleid` AND `brand`.`module` ="product" ';
            // $query = $query . ' AND ( ';
            // foreach ($request->brand as $key => $value) {
            //     $query = $query . ' brand.brandid = ' . $value . ' OR ';
            // }
            // $query = substr($query, 0, strlen($query) - 3);
            // $query = $query . ' )';
            $data = $data->join('brands_relationships', 'products.id', '=', 'brands_relationships.moduleid')->where('brands_relationships.module', '=', 'product');
            $data =  $data->whereIn('brands_relationships.brandid', $request->brand);
        }
        //xử lý tags
        if (!empty($request->tag)) {
            // $json .= 'INNER JOIN `tags_relationships` as `tag2` ON `tb1`.`id` = `tag2`.`moduleid` AND `tag2`.`module` ="product" ';
            // $query = $query . ' AND ( ';
            // foreach ($request->tag as $key => $value) {
            //     $query = $query . ' tag2.tagid = ' . $value . ' OR ';
            // }
            // $query = substr($query, 0, strlen($query) - 3);
            // $query = $query . ' )';
            $data = $data->join('tags_relationships', 'products.id', '=', 'tags_relationships.moduleid')->where('tags_relationships.module', '=', 'product');
            $data =  $data->whereIn('tags_relationships.brandid', $request->brand);
        }
        //xử lý thuộc tính
        if (!empty($request->attr)) {
            $attr = explode(';', $request->attr);
            foreach ($attr as $key => $val) {
                if ($key % 2 == 0) {
                    if ($val != '') {
                        $attribute[$val][] = $attr[$key + 1];
                    }
                } else {
                    continue;
                }
            }
            $total = 0;
            $index = 100;
            foreach ($attribute as $key => $val) {
                // $query = $query . ' AND ( ';
                $total++;
                $index++;
                foreach ($val as $subs) {
                    $index = $index + $total;
                    // $query = $query . ' tb' . $index . '.attrid =  ' . $subs . ' OR ';
                    // $json .= ' INNER JOIN `attributes_relationships` as `tb'.$index.'` ON `tb1`.`id` = `tb'.$index.'`.`moduleid` ';
                    $data = $data->join('attributes_relationships as tb' . $index . '', 'products.id', '=', 'tb' . $index . '.moduleid');
                }
                $data =  $data->whereIn('tb' . $index . '.attrid', $val);
                // $query = substr($query, 0, strlen($query) - 3);
                // $query = $query . ' ) ';
            }
            // $query = $query . ' GROUP BY `tb102`.`moduleid`';
            $data =  $data->groupBy('tb102.moduleid');
        }
        $data =  $data->groupBy('catalogues_relationships.moduleid');
        // $query = substr($query, 4, strlen($query));
        //$SELECT = 'SELECT DISTINCT `tb1`.`id` FROM `products` as `tb1` '.$json.'  WHERE '.$query.'';
        //$count = DB::select($SELECT);
        $data =  $data->paginate(env('APP_paginate'));
        return view('product.backend.product.index.data', compact('data'))->render();
    }
}
