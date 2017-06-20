<?php

namespace App\Http\Controllers\Quantri\cauhoi;

use App\Models\Cauhoi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;

class listController extends Controller
{
    public function listC()
    {
        $ch=Cauhoi::get()->toArray();
        return view('quantri.cauhoi.list',['ch'=>$ch]);
    }
    public function addlistC(Request $request){
        $ch=new Cauhoi();
        $ch->name=$request->name;
        $ch->email=$request->email;
        $ch->noidung=$request->noidung;
        $ch->status=$request->status;
        $ch->created_at=new DateTime();
        $ch->save();
        return redirect()->route('listC')->with(['flash_level'=>'result_msg','flash_message'=>'Add item success !']);
    }
    public function editC(Request $request,$id){
        $ch=Cauhoi::find($id);
        $ch->name=$request->name;
        $ch->email=$request->email;
        $ch->noidung=$request->noidung;
        $ch->status=$request->status;
        $ch->save();
        return redirect()->route('listC')->with(['flash_level'=>'result_msg','flash_message'=>'Edit item success !']);
    }
}
