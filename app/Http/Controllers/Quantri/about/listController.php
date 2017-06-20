<?php

namespace App\Http\Controllers\Quantri\about;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use DateTime;

class listController extends Controller
{
    public function about()
    {
    	$data=About::get()->toArray();
    	return view('quantri.about.list',['data'=>$data]);
    }
    public function addabout(Request $request)
    {
    	$about=About::find(1);
    	$about->phone1=$request->phone1;
    	$about->phone2=$request->phone2;
    	$about->address=$request->address;
    	$about->gioithieu=$request->gioithieu;
        $about->chinhsach=$request->chinhsach;
    	$about->dichvu=$request->dichvu;
    	$about->lienhe=$request->lienhe;
    	$about->updated_at=new DateTime();
    	$about->save();
    	return redirect()->route('about')->with(['flash_level'=>'result_msg','flash_message'=>'Update item success !']);
    }
}
