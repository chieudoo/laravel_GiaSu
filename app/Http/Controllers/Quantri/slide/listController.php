<?php

namespace App\Http\Controllers\Quantri\slide;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Slide;
use DateTime;

class listController extends Controller
{
    public function listSlide()
    {
    	$data=Slide::get()->toArray();
    	return view('quantri.slide.list',['data'=>$data]);
    }
    public function alistSlide(Request $request)
    {
    	$slide=new Slide();
    	$slide->mota=$request->mota;
    	$img=$request->file('image');
    	if($request->hasFile('image')){
    		$name=time()."-".$img->getClientOriginalName();
    		$path="HinhAnh/Quantri/Slide/";
            $img->move($path,$name);
            $slide->image=$name;
    	}
    	$slide->status=$request->status;
    	$slide->created_at=new DateTime();
    	$slide->save();
    	return redirect()->route('listSlide')->with(['flash_level'=>'result_msg','flash_message'=>'Add item success !']);
    }
    public function eSlide(Request $request,$id)
    {
    	$slide=Slide::find($id);
    	$slide->mota=$request->mota;
    	$img=$request->file('image');
    	if($request->hasFile('image')){
    		$acu=$request->acu;
    		$pcu="/HinhAnh/Quantri/Slide/";
    		if(file_exists(public_path().$pcu.$acu)){
                    File::delete(public_path().$pcu.$acu);
            }
            $name=time()."-".$img->getClientOriginalName();
            $path="HinhAnh/Quantri/Slide/";
            $img->move($path,$name);
            $slide->image=$name;
    	}
    	$slide->status=$request->status;
    	$slide->updated_at=new DateTime();
    	$slide->save();
    	return redirect()->route('listSlide')->with(['flash_level'=>'result_msg','flash_message'=>'Edit item success !']);
    }
}
