<?php
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Teacher;
use App\Models\Monhoc;
use App\Models\File;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Định tuyến frontend
Route::group(['namespace'=>'Giaodien'],function (){
    Route::group(['namespace'=>'home'],function (){
        Route::get('/',['as'=>'index','uses'=>'indexController@index']);
    });
    Route::group(['namespace'=>'page'],function (){
        Route::get('tin-tuc',['as'=>'tintuc','uses'=>'tintucController@tintuc']);
        Route::get('hoc-vien',['as'=>'hocvien','uses'=>'hocvienController@hocvien']);
        Route::get('xuly-monhocs',function (){
            $x=$_GET['x'];
            $mon=\App\Models\Monhoc::get()->where('lop_id',$x)->toArray();
            foreach ($mon as $item){
                echo "<label>
                            <input type='checkbox' name='mon_id[]' value='".$item['id']."'>
                            ".$item['name']."
                        </label>";
            }
        }); 
        Route::post('hoc-vien',['as'=>'addhocvien','uses'=>'hocvienController@addhocvien']);

        Route::get('gia-su',['as'=>'giasu','uses'=>'giasuController@giasu']);
        // Route::post('gia-su',['as'=>'addgiasu','uses'=>'giasuController@addgiasu']);
        Route::post('add-gia-su', function() {
            $name=$_POST['name'];$email=$_POST['email'];$sdt=$_POST['sdt'];
            $sex=$_POST['sex'];$ns=$_POST['ns'];$dc=$_POST['dc'];
            $hv=$_POST['hv'];$kn=$_POST['kn'];$td=$_POST['td'];
            $kin=$_POST['kin'];
            $cap=$_POST['cap'];
            $arr=array();
                if(!$cap){
                    array_push($arr,array("error"=>"Please insert Captcha !"));
                }else{
                    $res=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfCeyEUAAAAAPn8rL2GdiN1zdNcnDGGSlpEltSR&response=".$cap."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
                    if($res['success']==true){
                        $gv=new Teacher();
                        $gv->name=$name;
                        $gv->slug=str_slug($name,"-");
                        $gv->email=$email;
                        $gv->sdt=$sdt;
                        $gv->diachi=$dc;
                        $gv->hocvan=$hv;
                        $gv->khanang=$kn;
                        $gv->ngaysinh=$ns;
                        $gv->td=$td;
                        $gv->kn=$kin;
                        $gv->sex=$sex;
                        $gv->created_at=new DateTime();
                        $gv->save();
                        array_push($arr,array("succes"=>"Subscribe Success !"));
                    }
                }
                echo  json_encode($arr);
        });
        Route::get('goc-thao-luan',['as'=>'thaoluan','uses'=>'thaoluanController@thaoluan']);
        Route::get('goc-thao-luan/{id}',['as'=>'cthaoluan','uses'=>'thaoluanController@cthaoluan'])->where('id','[0-9]+');
        Route::get('get-noidung',function (){
            $id=$_GET['id'];
            $ch=\App\Models\Cauhoi::select('noidung')->where('id',$id)->get()->toArray();
            foreach ($ch as $item){
                echo $item['noidung'];
            }
        });
        Route::post('add-question',['as'=>'addch','uses'=>'thaoluanController@addch']);

        Route::get('chi-tiet-tin/{id}/{name}',['as'=>'chitiet','uses'=>'chitiettintucController@chitiet'])->where(['name' => '[0-9a-z\-\.]+','id'=>'[0-9]+']);
        Route::get('get-mon',function(){
            $id=$_GET['id'];
            $mon=Monhoc::where('lop_id',$id)->limit(4)->get()->toArray();
            foreach ($mon as $item) {
                if($item['status']==1){
                    echo "<li><a href='".url('tai-lieu/'.$id.'e'.$item['id'].'/'.$item['slug'].'.html')."'>".$item['name']."</a></li>";
                }
            }
            //echo "<pre>";print_r($mon);echo "</pre>";
        });
        Route::get('tai-lieu',['as'=>'listTL','uses'=>'tailieuController@listTL']);
        Route::get('tai-lieu/{id}e{idmon}/{name}',['as'=>'tailieu','uses'=>'tailieuController@tailieu'])->where(['id'=>'[0-9]+','idmon'=>'[0-9]+','name' => '[0-9a-z\-\.]+']);
        Route::get('xuly-file',function(){
            $x=$_GET['x'];
            if($x!=NULL){
                $file=File::where('lop_id',$x)->get()->toArray();
                foreach ($file as $item) {
                    echo "<tr style='background-color: #ffffff'>
                        <td style='width: 80%'>".$item['name']."</td>
                        <td><a href='".$item['link']."'>Link</a></td>
                    </tr>";
                }
            }else{
                $tl=File::orderBy('id','desc')->get()->toArray();
                foreach ($tl as $item) {
                    echo "<tr style='background-color: #ffffff'>
                        <td style='width: 80%'>".$item['name']."</td>
                        <td><a href='".$item['link']."'>Link</a></td>
                    </tr>";
                }
            }
            
        });
        Route::get('gioi-thieu',['as'=>'about','uses'=>'aboutController@about']);
        Route::get('dich-vu',['as'=>'dichvu','uses'=>'aboutController@dichvu']);
        Route::get('lien-he',['as'=>'lienhe','uses'=>'aboutController@lienhe']);
        Route::get('chinh-sach',['as'=>'chinhsach','uses'=>'aboutController@chinhsach']);
    });
});


//End định tuyến frontend

Route::group(['namespace'=>'Login'],function(){
	Route::get('giasu_login',function(){
		if(Auth::check()){
			if(Auth::user()->level==0){
				return redirect()->route('quantri');
			}else{
				return view("login.login_admin");
			}
		}else{
            return view("login.login_admin");
        }
	})->name('login');
	Route::post('giasu_login',['as'=>'postLogin','uses'=>'giasuController@postLogin']);
	Route::get('dang-xuat',['as'=>'getLogout','uses'=>'giasuController@getLogout']);
});


//Định tuyến quản trị

Route::group(['middleware' => 'verifyadmin'], function() {

	Route::group(['namespace' => 'Quantri'], function() {
        Route::get('quan-tri',['as'=>'quantri','uses'=>'homeController@quantri']);

		Route::group(['namespace' => 'category'], function() {
		    Route::get('list-category',['as'=>'listCate','uses'=>'listController@listCate']);
		    Route::post('list-category',['as'=>'postCate','uses'=>'listController@postCate']);
		    Route::get('edit-category/{id}',function(){
		    	return redirect()->route('listCate');
		    });
		    Route::post('edit-category/{id}',['as'=>'editCate','uses'=>'listController@editCate'])->where('id', '[0-9]+');
		    Route::get('delete-category/{id}',['as'=>'deleteCate','uses'=>'listController@deleteCate'])->where('id', '[0-9]+');
		});

		Route::group(['namespace' => 'news'], function() {
		   Route::get('list-news',['as'=>'listNews','uses'=>'listController@listNews']);
		   Route::post('list-news',['as'=>'addNews','uses'=>'listController@addNews']);
		   Route::get('edit-news/{id}',function (){
		       return redirect()->route('listNews');
           })->where('id','[0-9]+');
		   Route::post('edit-news/{id}',['as'=>'editNews','uses'=>'listController@editNews'])->where('id','[0-9]+');
		   Route::get('delete-news/{id}',['as'=>'deleteNews','uses'=>'listController@deleteNews'])->where('id','[0-9]+');
		});

		Route::group(['namespace'=>'thanhvien'],function (){
            Route::get('list-student',['as'=>'listUsers','uses'=>'listController@listUsers']);
            Route::post('list-student',['as'=>'addUsers','uses'=>'listController@addUsers']);
            Route::get('xuly-monhoc',function (){
                $x=$_GET['x'];
                $mon=\App\Models\Monhoc::get()->where('lop_id',$x)->toArray();
                foreach ($mon as $item){
                    echo "<label>
                            <input type='checkbox' name='mon_id[]' value='".$item['id']."'>
                            ".$item['name']."
                        </label>";
                }
            });
            Route::get('delete-student/{id}',['as'=>'deleteStudent','uses'=>'listController@deleteStudent'])->where('id','[0-9]+');
            Route::get('detail-student/{id}',['as'=>'detailStudent','uses'=>'listController@detailStudent'])->where('id','[0-9]+');
            Route::post('detail-student/{id}',['as'=>'editStudent','uses'=>'listController@editStudent'])->where('id','[0-9]+');
        });

		Route::group(['namespace'=>'lophoc'],function (){
            Route::get('list-class',['as'=>'listClass','uses'=>'listController@listClass']);
            Route::post('list-class',['as'=>'addClass','uses'=>'listController@addClass']);
            Route::get('edit-class/{id}',function (){
                return redirect()->route('listClass');
            })->where('id','[0-9]+');
            Route::post('edit-class/{id}',['as'=>'editClass','uses'=>'listController@editClass'])->where('id','[0-9]+');
            Route::get('delete-class/{id}',['as'=>'deleteClass','uses'=>'listController@deleteClass'])->where('id','[0-9]+');
        });

		Route::group(['namespace'=>'monhoc'],function (){
		    Route::get('list-subject',['as'=>'listSubject','uses'=>'listController@listSubject']);
            Route::post('list-subject',['as'=>'addSubject','uses'=>'listController@addSubject']);
            Route::get('edit-subject/{id}',function (){
                return redirect()->route('listSubject');
            })->where('id','[0-9]+');
            Route::post('edit-subject/{id}',['as'=>'editSubject','uses'=>'listController@editSubject'])->where('id','[0-9]+');
            Route::get('delete-subject/{id}',['as'=>'deleteSubject','uses'=>'listController@deleteSubject'])->where('id','[0-9]+');
        });

		Route::group(['namespace'=>'giaovien'],function (){
            Route::get('list-giaovien',['as'=>'listT','uses'=>'listController@listT']);
            Route::post('list-giaovien',['as'=>'addT','uses'=>'listController@addT']);
            Route::get('delete-giaovien/{id}',['as'=>'deleteT','uses'=>'listController@deleteT'])->where('id','[0-9]+');
            Route::get('detail-giaovien/{id}',['as'=>'detailT','uses'=>'listController@detailT'])->where('id','[0-9]+');
        });
		Route::group(['namespace'=>'phancong'],function (){
		    Route::get('list-phancong',['as'=>'listPC','uses'=>'listController@listPC']);
            Route::post('list-phancong',['as'=>'addPC','uses'=>'listController@addPC']);
            Route::get('xuly-ctsv',function (){
               $y=$_GET['y'];
               $data=\App\Models\Student::with('lophoc')->where('id',$y)->get()->toArray();
               $arr=array();
               foreach ($data as $item){
                   if($item['ycgt']==0){
                       $sex="Nam";
                   }else{
                       $sex="Nữ";
                   }

                   if($item['yctd']==0) {
                       $td="Sinh Viên";
                   }
                   else if($item['yctd']==1){
                       $td="Giáo Viên";
                   }
                   else if($item['yctd']==2){
                       $td="Giáo Sư";
                   }
                   else if($item['yctd']==3){
                       $td="Tiến Sỹ";
                   }else{
                       $td="Thạc Sỹ";
                   }

                   $i=array('lop'=>$item['lophoc']['name'],'email'=>$item['email'],'ns'=>$item['ngaysinh'],'gt'=>$sex,'td'=>$td);
                   array_push($arr,$i);
               }
               echo json_encode($arr);
            });
            Route::get('xuly-ctgv',function (){
                $x=$_GET['x'];
                $gv=\App\Models\Teacher::where('id','=',$x)->get()->toArray();
                $arr=array();
                foreach ($gv as $item){
                    if($item['sex']==0){
                        $sex="Nam";
                    }else{
                        $sex="Nữ";
                    }
                    $i=array("sex"=>$sex,"kn"=>$item['khanang']);
                    array_push($arr,$i);
                }
                echo json_encode($arr);
            });
            Route::get('xuly-hv',function (){
                $x=$_GET['x'];
                $arr=str_split($x,1);
                for ($i=0;$i<count($arr);$i++){
                    $monhoc = \App\Models\Monhoc::get()->where('id','=',$arr[$i])->toArray();
                    foreach ($monhoc as $item) {
                        echo $item['name']." , ";
                    }
                }
                
            });
            Route::get('xuly-gv',function (){
                $x=$_GET['x'];
                $gv=\App\Models\Teacher::get()->where('td','=',$x)->toArray();
                $arr=array();
                foreach ($gv as $item){
                    if($item['status']==0){
                        $i=array('id'=>$item['id'],'name'=>$item['name']);
                        array_push($arr,$i);
                    }
                }
                echo json_encode($arr);
            });
            Route::get('detail-phancong/{id}',['as'=>'detail','uses'=>'listController@detail'])->where('id','[0-9]+');
            Route::post('detail-phancong/{id}',['as'=>'edit','uses'=>'listController@edit'])->where('id','[0-9]+');
            Route::get('delete-phancong/{id}',['as'=>'delete','uses'=>'listController@delete'])->where('id','[0-9]+');
            Route::get('xuly-pc',function (){
                $hv=$_GET['hv'];
                $gv=$_GET['gv'];
                $h=\App\Models\Student::find($hv);
                $h->status=1;
                $h->save();
                $g=\App\Models\Teacher::find($gv);
                $g->status=0;
                $g->save();
            });

        });
	   Route::group(['namespace'=>'cauhoi'],function (){
	        Route::get('list-question',['as'=>'listC','uses'=>'listController@listC']);
            Route::post('list-question',['as'=>'addlistC','uses'=>'listController@addlistC']);
            Route::get('edit-question/{id}',function (){
                return redirect()->route('listC');
            })->where('id','[0-9]+');
            Route::post('edit-question/{id}',['as'=>'editC','uses'=>'listController@editC'])->where('id','[0-9]+');
       });
       Route::group(['namespace'=>'slide'],function()
       {
           Route::get('list-slide',['as'=>'listSlide','uses'=>'listController@listSlide']);
           Route::post('list-slide',['as'=>'alistSlide','uses'=>'listController@alistSlide']);
           Route::get('edit-slide/{id}',function(){
                return redirect()->route('listSlide');
           })->where('id','[0-9]+');
           Route::post('edit-slide/{id}',['as'=>'eSlide','uses'=>'listController@eSlide'])->where('id','[0-9]+');
       });
       Route::group(['namespace'=>'file'],function (){
            Route::get('list-file',['as'=>'listFile','uses'=>'listController@listFile']);
            Route::post('list-file',['as'=>'addFile','uses'=>'listController@addFile']);
            Route::get('edit-file/{id}',function (){
                return redirect()->route('listFile');
            })->where('id','[0-9]+');
            Route::get('xuly-m',function (){
                $id=$_GET['id'];
                $mon=Monhoc::where('lop_id',$id)->get()->toArray();
                foreach ($mon as $item){
                    echo "<option value='".$item['id']."'>".$item['name']."</option>";
                }
            });
            Route::post('edit-file/{id}',['as'=>'editFile','uses'=>'listController@editFile'])->where('id','[0-9]+');
       });
       Route::group(['namespace'=>'user'],function(){
            Route::get('list-user',['as'=>'listUser','uses'=>'listController@listUser']);
            Route::post('list-user',['as'=>'addUser','uses'=>'listController@addUser']);
            Route::get('edit-user/{id}',function(){
                return redirect()->route('listUser');
            })->where('id','[0-9]+');
            Route::post('edit-user/{id}',['as'=>'editUser','uses'=>'listController@editUser'])->where('id','[0-9]+');
       });
       Route::group(['namespace'=>'about'],function(){
            Route::get('about',['as'=>'about','uses'=>'listController@about']);
            Route::post('about',['as'=>'addabout','uses'=>'listController@addabout']);
       });

       Route::group(['namespace'=>'phanquyen'],function(){
            Route::get('phan-quyen',['as'=>'phanquyen','uses'=>'listController@phanquyen']);
            Route::post('phan-quyen',['uses'=>'listController@postphanquyen']); 


            Route::get('add-user-group',['uses'=>'listController@adduser']);
            Route::post('add-user-group',['uses'=>'listController@postadduser']);

            Route::get('detail-group/{id}',['uses'=>'listController@detailgroup'])->where('id','[0-9]+');

            Route::get('add-rule-group',['uses'=>'listController@rulegroup']);
            Route::post('add-rule-group',['uses'=>'listController@postrulegroup']);
       });

	});
});
//End định tuyến quản trị

