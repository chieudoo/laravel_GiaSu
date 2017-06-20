<?php

namespace App\Http\Controllers\Quantri;

use App\Models\Cauhoi;
use App\Models\News;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;

class homeController extends Controller
{
    public function quantri(){
        $now=date('Y-m-d');
        $news=News::count();
        $newsn=News::whereDate('created_at',$now)->count();
        $ch=Cauhoi::count();
        $chn=Cauhoi::whereDate('created_at',$now)->count();
        $hv=Student::count();
        $hvn=Student::whereDate('created_at',$now)->count();
        $gs=Teacher::count();
        $gsn=Teacher::whereDate('created_at',$now)->count();
        return view(
            'quantri.main.index',
            ['news'=>$news,'newsn'=>$newsn,'ch'=>$ch,'chn'=>$chn,'hv'=>$hv,'hvn'=>$hvn,'gs'=>$gs,'gsn'=>$gsn]
            );
    }
}
