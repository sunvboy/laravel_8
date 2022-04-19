<?php

namespace App\Http\Controllers\user\backend;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    
    public function index()
    {
        $data =  Role::latest()->paginate(20);
        $module = 'roles';
        return view('user.backend.role.index',compact('data','module'));
    
    }

   
    public function create()
    {
        $module = 'roles';
        $permissions = Permission::where('parent_id',0)->get();
        return view('user.backend.role.create',compact('module','permissions'));
    }

   
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'permission_id' => 'required',
        ],[
            'title.required' => 'Tên nhóm thành viên là trường bắt buộc.',
            'permission_id.required' => 'Quyền thành viên là trường bắt buộc.',
        ]);
        $validator->validate();
        $role = Role::create([
            'title' => $request->title,
            'description' => !empty( $request->description)? $request->description:'',
        ]);
        if(!empty($role)){
            $role->permissions()->attach($request->permission_id);
        }
        return redirect()->route('roles.index')->with('success','Thêm mới quyền thành công');

    }

  
    public function show($id)
    {
  
    }

    
    public function edit(Request $request,$id)
    {
        $module = 'roles';
        $permissions = Permission::where('parent_id',0)->get();
        $detailRole = Role::find($id);
        $permissionChecked = $detailRole->permissions;
        return view('user.backend.role.edit',compact('module','permissions','detailRole','permissionChecked'));
    }

    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'permission_id' => 'required',
        ],[
            'title.required' => 'Tên nhóm thành viên là trường bắt buộc.',
            'permission_id.required' => 'Quyền thành viên là trường bắt buộc.',
        ]);
        $validator->validate();
        Role::find($id)->update([
            'title' => $request->title,
            'description' => !empty( $request->description)? $request->description:'',
        ]);
        $role = Role::find($id);
        if(!empty($role)){
            $role->permissions()->sync($request->permission_id);
             //lấy phân quyền upload image
             $temp_permission = [];
             $roles = auth()->user()->roles;
             foreach ($roles as $k=>$v){
                 $permissions = $v->permissions;
                 foreach ($permissions as $v2){
                     if($v2['parent_id'] == 22){
                         $temp_permission[] = $v2['key_code'];
                     }
                 }
 
             }
             //setcookie('authImagesManager', '', time() - 86400, '/');
             setcookie('authImagesManager', json_encode(array(
                'permission' => $temp_permission,
                'folder_upload' => (Auth::user()->id * 168) * 168 + 168,
            )), time() + (86400 * 30), '/');
            //  $auth = isset($_COOKIE['authImagesManager'])?$_COOKIE['authImagesManager']:NULL;
            //  echo "<pre>";var_dump($auth);die;
             //end
        }
        return redirect()->route('roles.edit',['id'=>$id])->with('success','Cập nhập quyền thành công');
    }
    
    public function destroy($id)
    {
        try{
            $role =  DB::table('role_user')
            ->select('role_id')
            ->where('role_id',$id)
            ->get();

            if($role->isEmpty()){
                Role::find($id)->delete();
                return response()->json([
                    'code' => 200,
                ],200);
            }else{
                return response()->json([
                    'code' => 201,
                ],201);
            }
            // Role::find($id)->delete();
            // DB::table('role_user')->where('user_id', $id)->delete();


        }catch(\Exception $e){
            return response()->json([
                'code' => 500,
            ],500);
        }
        
    }
}
