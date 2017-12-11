<?php

namespace App\Http\Controllers\Quantri\phanquyen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\addUserRole;
use App\Models\User;
use App\Models\Rule;
use DB;
use DateTime;

class listController extends Controller
{
    public function phanquyen()
    {
        $data = Role::get()->toArray();
        return view('quantri.phanquyen.list',['data'=>$data]);
    }
    public function postphanquyen(Request $request)
    {
        $str="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $role = new Role();
        $role->name = $request->name;
        $role->role = str_shuffle($str);
        $role->created_at = new DateTime();
        $role->save();
        return redirect()->route('phanquyen')->with(['flash_level'=>'result_msg','flash_message'=>"Tạo nhóm thành công !"]);
       
    }

    public function adduser()
    {
        $data = Role::get()->toArray();
        $user = User::where('id','!=',1)->get()->toArray();
        return view('quantri.phanquyen.add',['data'=>$data,'user'=>$user]);
    }

    public function postadduser(Request $request)
    {
        $add = new addUserRole();
        $add->user_id = $request->user_id;
        $add->role_id = $request->role_id;
        $add->created_at = new DateTime();
        $add->save();
        return redirect()->route('phanquyen')->with(['flash_level'=>'result_msg','flash_message'=>"Thêm thành công !"]);
    }

    public function detailgroup($id)
    {
        $data = Role::where('id',$id)->get()->toArray();
        
        $user = DB::table('giasu_group')->where('giasu_group.id',$id)->join('giasu_adduser','giasu_group.id','=','giasu_adduser.role_id')->join('giasu_users_admin','giasu_adduser.user_id','=','giasu_users_admin.id')->select('giasu_group.*','giasu_users_admin.id as i','giasu_users_admin.name as n','giasu_adduser.id as ia','giasu_adduser.role_id','giasu_adduser.user_id')->get();

        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";

        return view('quantri.phanquyen.detail',['data'=>$data,'user'=>$user]);
    }

    public function rulegroup()
    {
        $data = Role::get()->toArray();
        return view('quantri.phanquyen.rule',['data'=>$data]);
    }

    public function postrulegroup()
    {
        $rule = new Rule();
        $rule->role_id = $_POST['role'];
        $rule->chucnang_id = $_POST['cn'];
        $rule->rule_add = $_POST['add'];
        $rule->rule_edit = $_POST['edit'];
        $rule->rule_delete = $_POST['delete'];
        $rule->save();
    }
}
