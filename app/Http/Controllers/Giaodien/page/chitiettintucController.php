<?php

namespace App\Http\Controllers\Giaodien\page;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lophoc;
use App\Models\About;

class chitiettintucController extends Controller
{
    public function chitiet(Request $request,$id)
    {
        $menu=Category::get()->toArray();
        $tt=News::where('id',$id)->get()->toArray();
        $ran=News::inRandomOrder()->limit(2)->where('id','!=',$id)->get()->toArray();
        $lop=Lophoc::limit(5)->get()->toArray();
        $about=About::get()->toArray();
        foreach ($tt as $item){
            $td=$item['name'];
        }
        return view('giaodien.page.chitiettin',['menu'=>$menu,'tt'=>$tt,'td'=>$td,'ran'=>$ran,'lop'=>$lop,'about'=>$about]);
    }
}
