<?php

namespace App\Http\Controllers\contact\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
class ContactController extends Controller
{
    public function get(){
        return view('contact.frontend.index');
    }
    public function post(Request $request){
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ],[
            'fullname.required' => 'Họ và tên là trường bắt buộc.',
            'phone.required' => 'Số điện thoại là trường bắt buộc.',
            'email.required' => 'Email là trường bắt buộc.',
            'address.required' => 'Địa chỉ là trường bắt buộc.',
        ]);
        if ($validator->passes()) {
            $id = Contact::insertGetId([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'message' => $request->message,
                'type' => 'contact',
                'created_at' => Carbon::now()
            ]);
            if($id > 0){
                return response()->json(['success'=>'Gửi thông tin liên hệ thành công']);

            }else{
                return response()->json(['error'=>'Có lỗi xảy ra']);
            }
        }
    	return response()->json(['error'=>$validator->errors()->all()]);
    }
}
