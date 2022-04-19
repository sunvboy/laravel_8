<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class AjaxController extends Controller
{
    public function select2(Request $request)
    {
        $condition = $request->condition;
        $condition = (!empty($condition)) ? $condition : '';
        $value = !empty($request->value) ? $request->value : '';
        $key = !empty($request->value) ? $request->value : '';
        $catalogueid = json_decode($value, true);
        if (isset($catalogueid)) {
            $data =  DB::table($request->module)->where('alanguage', config('app.locale'))->orderBy('order', 'asc')->orderBy('id', 'desc')->whereIn('id', $catalogueid)->get();
        } else {
            $data =  DB::table($request->module)->where('alanguage', config('app.locale'))->orderBy('order', 'asc')->orderBy('id', 'desc')->where('catalogueid', $condition)->get();
        }
        $temp = [];
        if (isset($data)) {
            foreach ($data as $val) {
                $temp[] = array(
                    'id' => $val->id,
                    'text' => $val->title,
                );
            }
        }
        echo json_encode(array('items' => $temp));
        die();
    }
    public function pre_select2(Request $request)
    {
        $locationVal = $request->locationVal;
        $module =  $request->module;
        $select =  $request->select;
        $value =  $request->value;
        $condition =  $request->condition;
        $condition = (!empty($condition)) ? $condition : '';
        $catalogueid = json_decode($value, true);
        $key =  $request->key;
        if (empty($key)) {
            $key = 'id';
        }
        if (isset($catalogueid)) {
            $data =  DB::table($module)->select('id', 'title')->where('alanguage', config('app.locale'))->whereIn('id', $catalogueid)->orderBy('order', 'asc')->orderBy('id', 'desc')->get();
        }
        $temp = [];
        if (isset($data)) {
            foreach ($data as $val) {
                $temp[] = array(
                    'id' => $val->id,
                    'text' => $val->$select,
                );
            }
        }
        echo json_encode(array('items' => $temp));
        die();
    }
    public function get_select2(Request $request)
    {
        $condition = (!empty($request->condition)) ? $request->condition : '';
        $locationVal = (!empty($request->locationVal)) ? $request->locationVal : '';
        $module = (!empty($request->module)) ? $request->module : '';
        $select = (!empty($request->select)) ? $request->select : '';
        if (!empty($locationVal)) {
            $data =  DB::table($module)->where('alanguage', config('app.locale'))->select('id', 'title')->orderBy('order', 'asc')->orderBy('id', 'desc');
            $data =  $data->where('title', 'like', '%' . $locationVal . '%');
            $data = $data->get();
        } else {
            $data =  DB::table($module)->where('alanguage', config('app.locale'))->select('id', 'title')->orderBy('order', 'asc')->orderBy('id', 'desc')->get();
        }

        $temp = [];
        if (isset($data)) {
            foreach ($data as $val) {
                $temp[] = array(
                    'id' => $val->id,
                    'text' => $val->$select,
                );
            }
        }

        echo json_encode(array('items' => $temp));
        die();
    }
    public function ajax_create(Request $request)
    {

        $module = $request->module;
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:' . $module . '',
        ], [
            'title.required' => 'Tiêu đề là trường bắt buộc.',
            'title.unique' => 'Tiêu đề đã tồn tại.',
        ]);
        $validator->validate();

        DB::table($module)->insert([
            'title' => $request->title,
            'slug' => slug($request->title),
            'userid_created' => Auth::user()->id,
            'created_at' => Carbon::now(),
            'alanguage' => config('app.locale')
        ]);
        return response()->json([
            'code' => 200,
        ], 200);
    }
    public function ajax_delete_all(Request $request)
    {

        $post = $request->param;
        $param['module'] = $post['module'];
        if (isset($post['list']) && is_array($post['list']) && count($post['list'])) {
            foreach ($post['list'] as $val) {
                //Xóa đối tượng
                if ($param['module']  == 'orders') {
                    Order::where('id', $val)->update(['deleted_at' => Carbon::now()]);
                } else if ($param['module']  == 'coupons') {
                    Coupon::where('id', $val)->update(['deleted_at' => Carbon::now()]);
                } else if ($param['module']  == 'comments') {
                    //lấy cmt cha
                    $dataCmt =  DB::table($param['module'])->select('id', 'images')->where('id', $val)->first();

                    //lấy cmt con
                    $dataCmtChild = DB::table($param['module'])->select('id', 'images')->where('parentid', $dataCmt->id)->get();
                    //nếu tồn tại cmt con thì xóa cmt và ảnh
                    if (!$dataCmtChild->isEmpty()) {
                        foreach ($dataCmtChild as $v) {
                            //xóa ảnh cmt child
                            $listImageCmtChild = json_decode($v->images, TRUE);
                            if (!empty($listImageCmtChild)) {
                                foreach ($listImageCmtChild as $image) {
                                    if (file_exists(public_path() . $image)) {
                                        unlink(public_path() . $image);
                                    }
                                }
                            }
                            //xóa cmt child
                            DB::table($param['module'])->where('id', $v->id)->delete();
                        }
                    }
                    //xóa ảnh và cmt parentid = 0
                    if (!empty($dataCmt->images)) {
                        $listImageCmt = json_decode($dataCmt->images, TRUE);
                        if (!empty($listImageCmt)) {
                            foreach ($listImageCmt as $image) {
                                if (file_exists(public_path() . $image)) {
                                    unlink(public_path() . $image);
                                }
                            }
                        }
                    }

                    DB::table($param['module'])->where('id', $dataCmt->id)->delete();
                } else if ($param['module']  == 'customers') {
                    //xoa anh dai dien
                    $dataCustomer =  DB::table($param['module'])->select('image')->where('id', $val)->first();
                    if (file_exists(base_path() . $dataCustomer->image)) {
                        unlink(base_path() . $dataCustomer->image);
                    }
                    DB::table($param['module'])->where('id', $val)->delete();
                } else {
                    DB::table($param['module'])->where('id', $val)->delete();
                }

                if ($param['module'] == 'products') {
                    //xóa catalogue_relationship
                    DB::table('catalogues_relationships')->where('moduleid', $val)->where('module', 'product')->delete();
                    //xóa tags_relationship
                    DB::table('tags_relationships')->where('moduleid', $val)->where('module', 'product')->delete();
                    //xóa brands_relationship
                    DB::table('brands_relationships')->where('moduleid', $val)->where('module', 'product')->delete();
                    //xóa attribute_relationship
                    DB::table('attributes_relationships')->where('moduleid', $val)->delete();
                    //Xóa  products_versions
                    DB::table('products_versions')->where('productid', $val)->delete();
                }
                if ($param['module'] == 'articles') {
                    //xóa catalogue_relationship
                    DB::table('catalogues_relationships')->where('moduleid', $val)->where('module', 'article')->delete();
                    //xóa tags_relationship
                    DB::table('tags_relationships')->where('moduleid', $val)->where('module', 'article')->delete();
                }

                //xóa relationship
                if ($param['module'] == 'tags') {
                    DB::table('tags_relationships')->where('tagid', $val)->delete();
                }
                if ($param['module'] == 'brands') {
                    DB::table('brands_relationships')->where('brandid', $val)->delete();
                }
                if ($param['module'] == 'attributes') {
                    DB::table('attributes_relationships')->where('attrid', $val)->delete();
                }
            }
        }
        return response()->json([
            'code' => 200,
        ], 200);
    }
    public function ajax_delete(Request $request)
    {

        $module = $request->module;
        $id = (int) $request->id;
        $child = (int) $request->child;
        //Order
        if ($module  == 'orders') {
            Order::where('id', $id)->update(['deleted_at' => Carbon::now()]);
        } else if ($module  == 'coupons') {
            Coupon::where('id', $id)->update(['deleted_at' => Carbon::now()]);
        } else if ($module  == 'comments') {
            //lấy cmt cha
            $dataCmt =  DB::table($module)->select('id', 'images')->where('id', $id)->first();
            //lấy cmt con
            $dataCmtChild = DB::table($module)->select('id', 'images')->where('parentid', $dataCmt->id)->get();
            //nếu tồn tại cmt con thì xóa cmt và ảnh
            if (!$dataCmtChild->isEmpty()) {
                foreach ($dataCmtChild as $v) {
                    //xóa ảnh cmt child
                    $listImageCmtChild = json_decode($v->images, TRUE);
                    if (!empty($listImageCmtChild)) {
                        foreach ($listImageCmtChild as $image) {
                            if (file_exists(public_path() . $image)) {
                                unlink(public_path() . $image);
                            }
                        }
                    }
                    //xóa cmt child
                    DB::table($module)->where('id', $v->id)->delete();
                }
            }
            //xóa ảnh và cmt parentid = 0
            if (!empty($dataCmt->images)) {
                $listImageCmt = json_decode($dataCmt->images, TRUE);
                if (!empty($listImageCmt)) {
                    foreach ($listImageCmt as $image) {
                        if (file_exists(public_path() . $image)) {
                            unlink(public_path() . $image);
                        }
                    }
                }
            }
            DB::table($module)->where('id', $dataCmt->id)->delete();
        } else if ($module  == 'customers') {
            //xoa anh dai dien
            $dataCustomer =  DB::table($module)->select('image')->where('id', $id)->first();
            if (file_exists(base_path() . $dataCustomer->image)) {
                unlink(base_path() . $dataCustomer->image);
            }
            DB::table($module)->where('id', $id)->delete();
        } else {
            DB::table($module)->where('id', $id)->delete();
        }



        //tags
        if ($module == 'tags') {
            DB::table('tags_relationships')->where('tagid', $id)->delete();
        }
        //brands
        if ($module == 'brands') {
            DB::table('brands_relationships')->where('brandid', $id)->delete();
        }
        //attributes
        if ($module == 'attributes') {
            DB::table('attributes_relationships')->where('attrid', $id)->delete();
        }
        //products
        if ($module == 'products') {
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
        }
        //articles
        if ($module == 'articles') {
            //xóa catalogue_relationship
            DB::table('catalogues_relationships')->where('moduleid', $id)->where('module', 'article')->delete();
            //xóa tags_relationship
            DB::table('tags_relationships')->where('moduleid', $id)->where('module', 'article')->delete();
        }

        if ($child == 1) {
            $moduleExplode = explode('_', $module);
            DB::table($moduleExplode[1])->where('catalogueid', $id)->delete();
        }

        //$detail = DB::table($module)->where('id', $id)->first();
        // $old_image = $detail->src;
        // if(!empty($old_image) && is_file($old_image)) {
        //     unlink($old_image);
        // }
        return response()->json([
            'code' => 200,
        ], 200);
    }
    public function ajax_order(Request $request)
    {
        $module = $request->param['module'];
        $id = (int) $request->param['id'];
        DB::table($module)->where('id', $id)->update(['order' => (int) $request->param['order']]);
        return response()->json([
            'code' => 200,
        ], 200);
    }
    public function ajax_publish(Request $request)
    {
        $module = $request->param['module'];
        $id = (int) $request->param['id'];
        $title = $request->param['title'];
        $object = DB::table($module)->where('id', $id)->first();
        $_update['' . $title . ''] = (($object->$title == 1) ? 0 : 1);
        DB::table($module)->where('id', $id)->update($_update);
        return response()->json([
            'code' => 200,
        ], 200);
    }
}
