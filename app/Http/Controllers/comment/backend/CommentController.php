<?php

namespace App\Http\Controllers\comment\backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $module = 'comments';
       

        $productid = Comment::where('parentid','=',0)->groupBy('productid')->select('productid')->get();
        $getProduct[''] = 'Chọn sản phẩm';
        foreach($productid as $k=>$v) {
            $getProduct[$v->productid] = $v->product->title;
        }
        $data = Comment::where('parentid','=',0)->select('*',DB::raw('DATE(created_at)')) ->orderBy('id','desc');
        if(is($request->keyword)){
            $data =  $data->where('fullname', 'like', '%' .$request->keyword .'%')->Orwhere('message', 'like', '%' .$request->keyword .'%');
        }     
        if(is($request->date)){
            $date =  explode(' - ',$request->date);
            $date_start = trim($date[0].' 00:00:00');
            $date_end = trim($date[1].' 23:59:59');
            $data =  $data->where('created_at','>=',$date_start)->where('created_at','<=',$date_end);
        }  
        if(is($request->productid)){
            $data =  $data->where('productid', $request->productid);
        }    
        if(is($request->rating)){
            $data =  $data->where('rating', $request->rating);
        }  
        $data = $data->paginate(env('APP_paginate'));
        if(is($request->keyword)){
            $data->appends(['keyword' => $request->keyword]);
        }   
        if(is($request->date)){
            $data->appends(['date' => $request->date]);
        }   
        if(is($request->productid)){
            $data->appends(['productid' => $request->productid]);
        }   
        if(is($request->rating)){
            $data->appends(['rating' => $request->rating]);
        }   
        return view('comment.backend.index', compact('data', 'module','getProduct'));
    }
    public function edit($id)
    {
        $module = 'comments';
       
        $detail  = Comment::find($id);
        if (!isset($detail)) {
            return redirect()->route('comment.index')->with('error', "Bình luận không tồn tại");
        }
        $child = Comment::where('parentid','=',$detail->id)->select('*',DB::raw('DATE(created_at) AS new_date')) ->orderBy('id','desc')->paginate(env('APP_paginate'));
        $dataChild = [];
        foreach ($child as $key => $value) {
            // -> as it return std object
            $dataChild[$value->new_date][] = $value;
        }
        return view('comment.backend.edit', compact('detail', 'module','dataChild','child'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'message' => 'required',
        ],[
            'message.required' => 'Nội dung bình luận là trường bắt buộc.',
            
        ]);
        if($request->images){
            $images = explode('-+-', $request->images);
        }
        Comment::create([
            'fullname' => Auth::user()->name,
            'phone' => Auth::user()->phone,
            'message' => $request->message,
            'type' => 'QTV',
            'parentid' => $id,
            'publish' => 0,
            'images' => !empty($images)?json_encode($images):'',
            'updated_at' => Carbon::now()
        ]);
        
        return redirect()->route('comment.edit',['id'=>$id])->with('success',"Phản hồi bình luận thành công");
    }
}
