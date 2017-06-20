<?php

namespace App\Http\Controllers\Quantri\file;

use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lophoc;
use App\Models\Monhoc;
use DateTime;

class listController extends Controller
{
    public function listFile(){
        $lop=Lophoc::get()->toArray();
        $data=File::with('lop')->get()->toArray();
        //$mon=Monhoc::get()->toArray();
        return view('quantri.file.a',['lop'=>$lop,'data'=>$data]);
    }
    public function addFile(Request $request)
    {
        $file=new File();
        $file->name=$request->name;
        $file->lop_id=$request->lop_id;
        $file->mon_id=$request->mon_id;
        $file->link=$request->link;
        $file->status=$request->status;
        $file->created_at=new DateTime();
        $file->save();
        return redirect()->route('listFile')->with(['flash_level'=>'result_msg','flash_message'=>'Add item success!']);
    }
    public function editFile(Request $request,$id)
    {
        $file=File::find($id);
        $file->name=$request->name;
        if($request->lop_id==null){
            $file->lop_id=$request->lop;
        }else{
            $file->lop_id=$request->lop_id;
        }
        if($request->mon_id==null){
            $file->mon_id=$request->mon;
        }else{
            $file->mon_id=$request->mon_id;
        }
        $file->link=$request->link;
        $file->status=$request->status;
        $file->updated_at=new DateTime();
        $file->save();
        return redirect()->route('listFile')->with(['flash_level'=>'result_msg','flash_message'=>'Edit item success!']);
    }
}
