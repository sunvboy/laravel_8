<?php

namespace App\Http\Controllers\user\backend;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Validator;
class PermissionController extends Controller
{
    
    public function index()
    {
        $data =  Permission::latest()->where('parent_id',0)->paginate(20);
        $module = 'permission';
        return view('user.backend.permission.index',compact('data','module'));
    }

   
    public function create()
    {
        $module = 'permission';

        return view('user.backend.permission.create',compact('module'));

    }

  
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'permission_id' => 'required',
        ],[
            'title.required' => 'Tên module là trường bắt buộc.',
            'permission_id.required' => 'Quyền module là trường bắt buộc.',
        ]);
        $validator->validate();
        $permission = Permission::create([
            'title' => $request->title,
            'description' => !empty( $request->description)? $request->description:'',
            'key_code' => !empty($request->key_code)?$request->key_code:'',
        ]);
        foreach ($request->permission_id as $k=>$v){
            Permission::create([
                'title' => $v,
                'description' => !empty( $request->description)? $request->description:'',
                'parent_id' => $permission->id,
                'key_code' => str_replace("-", "_", $permission->title).'_'.$v,
            ]);
        }
        return redirect()->route('permission.index')->with('success','Thêm mới quyền thành công');
    }

   
    public function show($id)
    {
        
    }

   
    public function edit($id)
    {
        
    }

 
    public function update(Request $request, $id)
    {
        
    }

   
    public function destroy($id)
    {
        
    }
}
