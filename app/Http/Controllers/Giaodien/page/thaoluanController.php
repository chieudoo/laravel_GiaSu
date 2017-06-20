<?php

namespace App\Http\Controllers\Giaodien\page;

use App\Models\Category;
use App\Models\Cauhoi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lophoc;
use App\Models\About;

class thaoluanController extends Controller
{
    public function thaoluan()
    {
        $menu=Category::get()->toArray();
        $ch=Cauhoi::orderBy('id','desc')->get()->toArray();
        $lop=Lophoc::limit(5)->get()->toArray();
        $about=About::get()->toArray();
        return view('giaodien.page.thaoluan',['menu'=>$menu,'ch'=>$ch,'lop'=>$lop,'about'=>$about]);
    }
    public function addch(Request $request){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $nd=$_POST['noidung'];
        $cap=$_POST['g'];

        $arr=array();
        if(!$cap){
            array_push($arr,array('error'=>'Plese finish captcha'));
        }else{
            $res=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfCeyEUAAAAAPn8rL2GdiN1zdNcnDGGSlpEltSR&response=".$cap."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
            if($res['success']==true){
                $ch=new Cauhoi();
                $ch->name=$name;
                $ch->email=$email;
                $ch->noidung=$nd;
                $ch->save();
                array_push($arr,array('succ'=>'Success !'));
            }
        }
        echo json_encode($arr);
    }
}
