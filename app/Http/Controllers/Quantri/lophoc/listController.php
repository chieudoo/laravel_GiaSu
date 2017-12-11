<?php

namespace App\Http\Controllers\Quantri\lophoc;

use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Lophoc;
use App\Models\Role;
use App\Models\addUserRole;
use App\Models\User;
use App\Models\Rule;
use DB;

class listController extends Controller
{
    public function listClass()
    {
        $data=Lophoc::get()->toArray();
        $quyen = DB::table('giasu_rule')->join('giasu_group','giasu_rule.role_id','=','giasu_group.id')->join('giasu_adduser','giasu_adduser.role_id','=','giasu_group.id')->select('giasu_rule.*','giasu_group.name as group','giasu_adduser.user_id')->get();
        
                // echo "<pre>";
                // print_r($quyen);
                // echo "</pre>";
        $id = Auth::user()->id;


        return view('quantri.lophoc.list',['data'=>$data,'quyen'=>$quyen,'id'=>$id]);
    }
    public function addClass(Request $request)
    {
        $lophoc=new Lophoc();
        $lophoc->name=$request->name;
        $lophoc->slug=str_slug($request->name,"-");
        $lophoc->status=$request->status;
        $lophoc->created_at=new DateTime();
        $lophoc->save();
        return redirect()->route('listClass')->with(['flash_level'=>'result_msg','flash_message'=>'Add item success !']);
        // TODO: Change the autogenerated stub
    }
    public function editClass($id, Request $request)
    {
        $lophoc=Lophoc::find($id);
        $lophoc->name=$request->name;
        $lophoc->slug=str_slug($request->name,"-");
        $lophoc->status=$request->status;
        $lophoc->updated_at=new DateTime();
        $lophoc->save();
        return redirect()->route('listClass')->with(['flash_level'=>'result_msg','flash_message'=>'Edit item success !']);
        // TODO: Change the autogenerated stub
    }
    public function deleteClass($id, Request $request)
    {
        $lophoc=Lophoc::find($id);
        $lophoc->delete();
        return redirect()->route('listClass')->with(['flash_level'=>'result_msg','flash_message'=>'Delelte item success !']);// TODO: Change the autogenerated stub
    }
}
