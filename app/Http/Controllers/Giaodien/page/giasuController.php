<?php

namespace App\Http\Controllers\Giaodien\page;

use App\Models\Category;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lophoc;
use App\Models\About;
use DateTime;

class giasuController extends Controller
{
    public function giasu()
    {
        $menu=Category::get()->toArray();
        $gs=Teacher::take(10)->orderBy('id','desc')->get()->toArray();
        $lop=Lophoc::limit(5)->get()->toArray();
        $about=About::get()->toArray();
        return view('giaodien.page.giasu',['menu'=>$menu,'gs'=>$gs,'lop'=>$lop,'about'=>$about]);
    }
    public function addgiasu(Request $request){
        $gv=new Teacher();
        $gv->name=$request->name;
        $gv->slug=str_slug($request->name,"-");
        $gv->email=$request->email;
        $gv->sdt=$request->sdt;
        $gv->diachi=$request->diachi;
        $gv->hocvan=$request->hocvan;
        $gv->khanang=$request->khanang;
        $gv->ngaysinh=$request->ngaysinh;
        $gv->td=$request->td;
        $gv->kn=$request->kn;
        $gv->sex=$request->sex;
        $gv->created_at=new DateTime();
        $gv->save();
        return redirect()->route('giasu')->with(['flash_level'=>'result_msg','flash_message'=>'Bạn Đã Ghi Danh Thành Công ! Vui lòng đợi để chúng tôi liên lạc lại với bạn ']);
    }
}
