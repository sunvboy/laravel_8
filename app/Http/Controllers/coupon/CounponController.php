<?php

namespace App\Http\Controllers\coupon;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CounponController extends Controller
{
    
    public function index(Request $request)
    {
        $module = 'coupon';
     
        $data = Coupon::where('deleted_at','0000-00-00 00:00:00')->orderBy('id','DESC');
        if(is($request->keyword)){
            $data =  $data->where('name', 'like', '%' .$request->keyword .'%')->orWhere('title', 'like', '%' .$request->keyword . '%');
        }   
        $data = $data->paginate(env('APP_paginate'));
        if(is($request->keyword)){
            $data->appends(['keyword' => $request->keyword]);
        }   
        return view('coupon.index',compact('module','data'));
    }

    public function create()
    {
        $module = 'coupon';
        return view('coupon.create',compact('module'));

    }

 
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:coupons',
            'name' => 'required|unique:coupons',
            'value' => 'required'
        ],[
            'title.required' => 'Tiêu đề là trường bắt buộc.',
            'slug.required' => 'Đường dẫn là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn đã tồn tại.',
            'name.required' => 'Mã ưu đãi là trường bắt buộc',
            'name.unique' => 'Mã ưu đãi đã tồn tại.',
            'value.required'=> 'Mức ưu đãi là trường bắt buộc',
        ]);
        $this->submitCoupon($request,'create',0);
        return redirect()->route('coupon.index')->with('success',"Thêm mới mã giảm giá thành công");

    }


    public function edit($id)
    {
        $detail  = Coupon::find($id);
        if (!isset($detail)) {
            return redirect()->route('coupon.index')->with('error', "Mã giảm giá không tồn tại");
        }
        $module = 'coupon';
        return view('coupon.edit', compact('module','detail'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:coupons,slug,' . $id . ',id',
            'name' => 'required|unique:coupons,name,' . $id . ',id',
            'value' => 'required',

        ],[
            'title.required' => 'Tiêu đề là trường bắt buộc.',
            'slug.required' => 'Đường dẫn là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn đã tồn tại.',
            'name.required' => 'Mã ưu đãi là trường bắt buộc',
            'name.unique' => 'Mã ưu đãi đã tồn tại.',
            'value.required'=> 'Mức ưu đãi là trường bắt buộc',

        ]);
        $this->submitCoupon($request,'update',$id);
        return redirect()->route('coupon.index')->with('success',"Cập nhập mã giảm giá thành công");
        
    }
    public function submitCoupon($request = [],$action = '',$id = 0){
        if($action == 'create'){
            $time = 'created_at';
            $user = 'userid_created';
        }else{
            $time = 'updated_at';
            $user = 'userid_updated';
        }
        $date_start = $date_end = '';
        if(!empty($request['expiry_date'])){
            $date = explode('-',$request['expiry_date']);
            if(!empty($date)){
                $date_start .= trim(convert_date($date[0]));
                $date_end .= trim(convert_date($date[1]));
            }
        }
        $product_ids = $exclude_product_ids = $product_categories = $exclude_product_categories = null;
        if($request['typecoupon'] == 'fixed_percent' || $request['typecoupon'] == 'fixed_money'){
            $product_ids .= json_encode($request['product_ids']);
            $exclude_product_ids .= json_encode($request['exclude_product_ids']);
            $product_categories .= json_encode($request['product_categories']);
            $exclude_product_categories .= json_encode($request['exclude_product_categories']);
        }
        $_data= [
            'title' => $request['title'],
            'slug' => $request['slug'],
            'description' => !empty($request['description'])?$request['description']:'',
            'image' => isset($request['image'])? $request['image'] : '',
            'meta_title' => !empty($request['meta_title'])?$request['meta_title']:"",
            'meta_description' => !empty($request['meta_description'])?$request['meta_description']:'',
            'publish' => $request['publish'],
            $user => Auth::user()->id,
            $time => Carbon::now(),

            'name' => $request['name'],
            'type' => $request['typecoupon'],
            'value' => $request['value'],
            'expiry_date' => $request['expiry_date'],
            'date_start' => $date_start,
            'date_end' => $date_end,
            'individual_use' => $request['individual_use'],   
            'min_price' => str_replace('.', '',$request['min_price']),
            'max_price' => str_replace('.', '',$request['max_price']),
            'min_count' => $request['min_count'],
            'max_count' => $request['max_count'],
            'product_ids' => $product_ids,
            'exclude_product_ids' => $exclude_product_ids,
            'product_categories' => $product_categories,
            'exclude_product_categories' => $exclude_product_categories,
            'limit' => $request['limit'],
            'limit_user' => $request['limit_user'],
            'deleted_at' => '0000-00-00 00:00:00'
        ];
        if($action == 'create'){
            $id = Coupon::insertGetId($_data);
        }else{
            Coupon::where('id','=',$id)->update($_data);
            
        }

    }
}
