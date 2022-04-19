<?php

namespace App\Http\Controllers\comment\frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function postCmt(Request $request)
    {
        $productid = Product::find($request->productid);
        if(empty($productid)){
            echo 500;
            die();
        }
        $request->validate([
            'fullname' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);
        $customerid = !empty(Auth::guard('customer')->user())?Auth::guard('customer')->user()->id:'';
        if($request->images){
            $images = explode('-+-', $request->images);
        }
        $id = Comment::insertGetId([
           'productid' => $productid->id,
           'customerid' => $customerid,
           'fullname' => $request->fullname,
           'phone' => $request->phone,
           'message' => $request->message,
           'images' => !empty($images)?json_encode($images):'',
           'parentid' => !empty($request->parentid)?$request->parentid:0,
           'rating' => $request->rating,
           'created_at' => Carbon::now(),
           'publish' => 0,
           'type' => 'customer'

        ]);
        
        if($id > 0){
            echo 200;
           
        }else{
            echo 500;
        }
        die();
    }
    public function reply_comment(Request $request)
    {
        
        $request->validate([
            'message' => 'required',
        ]);
        
        $customerid = !empty(Auth::guard('customer')->user())?Auth::guard('customer')->user()->id:'';
        
        $id = Comment::insertGetId([
           'customerid' => $customerid,
           'fullname' => !empty(Auth::guard('customer')->user())?Auth::guard('customer')->user()->name:'',
           'phone' => !empty(Auth::guard('customer')->user())?Auth::guard('customer')->user()->phone:'',
           'message' => $request->message,
           'parentid' => !empty($request->parentid)?$request->parentid:0,
           'created_at' => Carbon::now(),
           'publish' => 0,
           'type' => 'customer'
        ]);
       
        if($id > 0){
            echo json_encode(array(
                'error' => "",
                'message' => "Phản hồi bình luận thành công",
            ));
        }else{
            echo json_encode(array(
                'error' => "1",
                'message' => "Có lỗi xảy ra",
            ));
        }
        die();
    }
    
}
