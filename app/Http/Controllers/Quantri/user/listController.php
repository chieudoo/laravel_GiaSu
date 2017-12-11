<?php

namespace App\Http\Controllers\Quantri\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UAdminRequest;
use DateTime;

class listController extends Controller
{
    public function listUser()
    {
    	$data=User::get()->toArray();
    	return view('quantri.user.list',['data'=>$data]);
    }
    public function addUser(UAdminRequest $request)
    {
    	$user = new User();
    	$user->name=$request->name;
    	$user->email=$request->email;
    	$user->password=bcrypt($request->password);
    	$user->status=$request->status;
    	$user->created_at=new DateTime();
    	$user->save();
    	return redirect()->route('listUser')->with(['flash_level'=>'result_msg','flash_message'=>'Add item success !']);
    }
    public function editUser(Request $request,$id)
    {
    	$user=User::find($id);
    	$user->name=$request->name;
    	$user->email=$request->email; 
    	$user->password=bcrypt($request->password);
    	$user->status=$request->status;
    	$user->updated_at=new DateTime();
    	$user->save();
    	return redirect()->route('listUser')->with(['flash_level'=>'result_msg','flash_message'=>'Edit item success !']);
    }
}
