<?php

namespace App\Http\Controllers\Giaodien\page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\About;
use App\Models\Lophoc;
use App\Models\Monhoc;
use App\Models\File;
use Illuminate\Support\Facades\DB;

class tailieuController extends Controller
{
    public function tailieu($id,$idmon,$name)
    {
    	$menu = Category::get()->toArray();
    	$about=About::get()->toArray();
    	$lop=Lophoc::limit(5)->get()->toArray();
    	$l=Lophoc::where('id',$id)->get()->toArray();
    	$mon=Monhoc::where('id',$idmon)->get()->toArray();
    	foreach ($mon as $item) {
    		$m=$item['name'];
    	}
    	foreach ($l as $item) {
    		$lo=$item['name'];
    	}
    	$tl=DB::table('giasu_file')
    	->join('giasu_lophoc','giasu_file.lop_id','=','giasu_lophoc.id')
    	->where('giasu_file.mon_id','=',$idmon)
    	->select('giasu_file.*','giasu_lophoc.name as n')
    	->get();

    	 return view('giaodien.page.tailieu',
    	 	['menu'=>$menu,'about'=>$about,'lop'=>$lop,'m'=>$m,'lo'=>$lo,'tl'=>$tl]);
    }
    public function listTL()
    {
    	$menu = Category::get()->toArray();
    	$about=About::get()->toArray();
    	$lop=Lophoc::limit(5)->get()->toArray();
    	$l=Lophoc::get()->toArray();
    	$tl=File::orderBy('id','desc')->get()->toArray();
    	return view('giaodien.page.dtailieu',[
    			'menu'=>$menu,
    			'about'=>$about,
    			'lop'=>$lop,
    			'tl'=>$tl,
    			'l'=>$l
    		]);
    }
}
