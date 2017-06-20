<?php

namespace App\Http\Controllers\Quantri\category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CateAddRequest;
use DateTime;

class listController extends Controller
{
	public function listCate()
	{
		$data=Category::get()->toArray();
	    return view('quantri.category.list',['data'=>$data]);
	}
    public function postCate(CateAddRequest $request)
    {
		$cate             = new Category; 
		$cate->name       = $request->name;
		$cate->slug       = str_slug($request->name,"-");
		$cate->parent_id  = $request->parent_id;
		$cate->status     = $request->status;
		$cate->created_at = new DateTime();
		$cate->save();
    	return redirect()->route('listCate')->with(['flash_level'=>'result_msg','flash_message'=>'Add item category success !!']);
    }
    public function editCate(Request $request,$id)
    {
		$cate             = Category::find($id);
		$cate->name       = $request->name;
		$cate->slug       = str_slug($request->name,"-");
		$cate->parent_id  = $request->parent_id;
		$cate->status     = $request->status;
		$cate->updated_at = new DateTime();
		$cate->save();
    	return redirect()->route('listCate')->with(['flash_level'=>'result_msg','flash_message'=>'Edit item category success !!']); 
    }
    public function deleteCate($id)
    {
    	$cate=Category::find($id);
    	$cate->delete();
    	return redirect()->route('listCate')->with(['flash_level'=>'result_msg','flash_message'=>'Delete item category success !!']); 
    }
}
