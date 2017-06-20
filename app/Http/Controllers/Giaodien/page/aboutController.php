<?php

namespace App\Http\Controllers\Giaodien\page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Lophoc;


class aboutController extends Controller
{
    public function about()
    {
    	$about=About::get()->toArray();
    	$menu=Category::get()->toArray();
    	$lop=Lophoc::limit(5)->get()->toArray();
    	return view('giaodien.page.about',['menu'=>$menu,'about'=>$about,'lop'=>$lop]);
    }
    public function dichvu()
    {
    	$about=About::get()->toArray();
    	$menu=Category::get()->toArray();
    	$lop=Lophoc::limit(5)->get()->toArray();
    	return view('giaodien.page.dichvu',['menu'=>$menu,'about'=>$about,'lop'=>$lop]);
    }
    public function lienhe()
    {
    	$about=About::get()->toArray();
    	$menu=Category::get()->toArray();
    	$lop=Lophoc::limit(5)->get()->toArray();
    	return view('giaodien.page.lienhe',['menu'=>$menu,'about'=>$about,'lop'=>$lop]);
    }
    public function chinhsach()
    {
    	$about=About::get()->toArray();
    	$menu=Category::get()->toArray();
    	$lop=Lophoc::limit(5)->get()->toArray();
    	return view('giaodien.page.chinhsach',['menu'=>$menu,'about'=>$about,'lop'=>$lop]);
    }
}
