<?php 

function listCate($data,$parent,$str)
{
	$stt=0;
	foreach ($data as $item) {
		$stt++;
		if($item['parent_id']==$parent){
			echo "<tr>
				<td>".$stt."</td>
				<td>".$str." | ".$item['name']."</td>";
			if($item['status']==1){
				echo "<td><i class='fa fa-check' style='color:green'> Xuất</i></td>";
			}else{
				echo "<td><i class='fa fa-check' style='color:red'> Ẩn</i></td>";
			}
            echo "<td>";
            if($item['id']>5){
                echo   "<a class='btn btn-default edit' data-id='".$item['id']."' data-name='".$item['name']."' data-status='".$item['status']."' data-p='".$item['parent_id']."' href='".url('edit-category/'.$item['id'].'')."'>Edit</a>
                    <a class='btn btn-danger delete' href='".url('delete-category/'.$item['id'].'')."' onclick='return confirm(\"Are you sure ?\")'>Delete</a>";
            }else{
                echo   "<button class='btn btn-default edit'  disabled='disabled'>Edit</button>
                    <button class='btn btn-danger delete'  disabled='disabled'>Delete</button>";
            }
            echo "</td></tr>";
            listCate($data,$item['id'],$str."--");
			
		}
	}
}	
function selMenu($data,$parent,$str){
	foreach ($data as $item) {
		if($item['parent_id']==$parent){
		    if($item['status']==1){
                echo "<option value='".$item['id']."'>".$str." | ".$item['name']."</option>";
                selMenu($data,$item['id'],$str."--");
            }
		}
	}
}
function selNews($data,$parent,$str){
    foreach ($data as $item) {
        if($item['parent_id']==$parent){
            if($item['status']==1 && ($item['id'] == 1 || $item['parent_id'] == 1)){
                echo "<option value='".$item['id']."'>".$str." | ".$item['name']."</option>";
                selMenu($data,$item['id'],$str."--");
            }
        }
    }
}
function selClass($data){
    foreach ($data as $item){
        if($item['status']==1){
            echo "<option value='".$item['id']."'>".$item['name']."</option>";
        }
    }
}
// function selLop($lop){
//     foreach ($lop as $item){
//        if($item['status']==1){
//            echo "<option value='".$item['id']."'>".$item['name']."</option>";
//        }
//     }
// }
function listNews($data){
    $stt=0;
    foreach ($data as $item){
        $stt++;
        echo "<tr>
                <td>".$stt."</td>
                <td>".$item['name']."</td>
                <td>".$item['intro']."</td>";
        if($item['status']==1){
            echo "<td><i class='fa fa-check' style='color:green'> Xuất</i></td>";
        }else{
            echo "<td><i class='fa fa-check' style='color:red'> Ẩn</i></td>";
        }
        echo "
            <td>
				<a class='btn btn-default edit' data-id='".$item['id']."' data-name='".$item['name']."' data-img='".$item['image']."' data-intro='".$item['intro']."' data-content='".$item['content']."' data-cat='".$item['cat_id']."' data-status='".$item['status']."' href='".url('edit-news/'.$item['id'].'')."'>Edit</a>
				<a class='btn btn-danger delete' href='".url('delete-news/'.$item['id'].'')."' onclick='return confirm(\"Are you sure ?\")'>Delete</a>
			</td>
        </tr>";
    }
}
function listLophoc($data){
    $stt=0;
    foreach ($data as $item){
        $stt++;
        echo "<tr>
            <td>".$stt."</td>
            <td>".$item['name']."</td>";
        if($item['status']==1){
            echo "<td><i class='fa fa-check' style='color:green'> Xuất</i></td>";
        }else{
            echo "<td><i class='fa fa-check' style='color:red'> Ẩn</i></td>";
        }
        echo    "
            <td>
                <a class='btn btn-default edit' data-id='".$item['id']."' data-name='".$item['name']."'  href='".url('edit-class/'.$item['id'].'')."'>Edit</a>
				<a class='btn btn-danger delete' href='".url('delete-class/'.$item['id'].'')."' onclick='return confirm(\"Are you sure ?\")'>Delete</a>
			</td>
        </tr>";
    }
}
function listStudent($data){
    $stt=0;
    foreach ($data as $item){
        $stt++;
        echo "<tr>
            <td>".$stt."</td>
            <td>".$item['name']."</td>
            <td>".$item['email']."</td>
            <td>".$item['sdt']."</td>";
            $arr=str_split($item['mon_id'],1);
            echo "<td>";
                for ($i=0;$i<count($arr);$i++){
                    monhoc($arr[$i]);
                }
            echo "</td>";
        if($item['status']==1){
            echo "<td><i class='fa fa-check' style='color:green'> Đợi Lớp</i></td>";
        }else if($item['status']==0){
            echo "<td><i class='fa fa-check' style='color:blue'> Đang Học</i></td>";
        }else{
            echo "<td><i class='fa fa-check' style='color:darkred'> Đã Học Xong</i></td>";
        }
         echo   "
            <td>
                <a class='btn btn-primary detail' href='".url('detail-student/'.$item['id'].'')."'>Detail</a>
				<a class='btn btn-danger delete' href='".url('delete-student/'.$item['id'].'')."' onclick='return confirm(\"Are you sure ?\")'>Delete</a>
			</td>
        </tr>
        ";
    }
}
function monhoc($id){
    $monhoc=\App\Models\Monhoc::where('id','=',$id)->get()->toArray();
    foreach ($monhoc as $item) {
        echo $item['name']." ,";
    }
}
function listGV($data){
    $stt=0;
    foreach ($data as $item){
        $stt++;
        echo "
        <tr>
            <td>".$stt."</td>
            <td>".$item['name']."</td>
            <td>".$item['email']."</td>
            <td>".$item['sdt']."</td>";
        if($item['status']==0){
            echo "<td><i class='fa fa-check' style='color:green'> Đang Rỗi</td>";
        }else{
            echo "<td><i class='fa fa-close' style='color:red'> Đang Bận</td>";
        }
        echo "
            <td>
                <a class='btn btn-primary detail'  href='".url('detail-giaovien/'.$item['id'].'')."'>Detail</a>
				<a class='btn btn-danger delete' href='".url('delete-giaovein/'.$item['id'].'')."' onclick='return confirm(\"Are you sure ?\")'>Delete</a>
			</td>
        </tr>
        ";
    }
}
function listSub($data){
    $stt=0;
    foreach ($data as $item){
        $stt++;
        echo "<tr>
            <td>".$stt."</td>
            <td>".$item['name']."</td>
            <td>".$item['lophoc']['name']."</td>";
        if($item['status']==1){
            echo "<td><i class='fa fa-check' style='color:green'> Xuất</i></td>";
        }else{
            echo "<td><i class='fa fa-check' style='color:red'> Ẩn</i></td>";
        }
        echo "
            <td>
                <a class='btn btn-default edit' data-id='".$item['id']."' data-name='".$item['name']."'  href='".url('edit-subject/'.$item['id'].'')."'>Edit</a>
				<a class='btn btn-danger delete' href='".url('delete-subject/'.$item['id'].'')."' onclick='return confirm(\"Are you sure ?\")'>Delete</a>
			</td>
        </tr>";
    }
}
function listPC($data){
    $stt=0;
    foreach ($data as $item){
        $stt++;
        echo "<tr>
                <td>".$item->tenhv."</td>
                <td>".$item->mon_hoc."</td>
                <td>".$item->tengv."</td>
                <td>".$item->ngay_bd."</td>";
        if($item->trangthai==0){
            echo "<td><i class='fa fa-check' style='color:green'></td>";
        }else{
            echo "<td><i class='fa fa-close' style='color:red'></td>";
        }
        if($item->trangthai==0 && $item->status==1){
            echo "<td> Đã Hoàn Thành </td>";
        }elseif($item->trangthai==1 && $item->status==0){
            echo "<td> Đang Nợ Tiền (Vẫn Được Dậy) </td>";
        }elseif ($item->trangthai==1 && $item->status==1){
            echo "<td> Đang Nợ Tiền (Không Được Dậy) </td>";
        }else{
            echo "<td> Đang Dậy </td>";
        }

        if($item->status==0){
            echo "<td><i class='fa fa-check' style='color:green'> Active</td>";
        }else{
            echo "<td><i class='fa fa-close' style='color:red'> Close</td>";
        }
        echo "
            <td>
                <a class='btn btn-primary detail'  href='".url('detail-phancong/'.$item->id.'')."'>Detail</a>
			</td>
        </tr>";
    }
}
function listCH($data){
    $stt=0;
    foreach ($data as $item) {
        $stt++;
        echo "<tr>
            <td>".$stt."</td>
            <td>".$item['name']."</td>
            <td>".$item['email']."</td>
            <td>".$item['noidung']."</td>";
            if($item['status']==0){
                echo "<td><i class='fa fa-check' style='color:green'> Xuất</td>";
            }else{
                echo "<td><i class='fa fa-close' style='color:red'> Ẩn</td>";
            }
        echo "
            <td>
                <a class='btn btn-default edit' data-id='".$item['id']."' data-status='".$item['status']."' data-name='".$item['name']."'
                 data-email='".$item['email']."' data-content='".$item['noidung']."' href='".url('edit-question/'.$item['id'])."' >Edit</a>
            </td>    
        </tr>";
    }
}
function listSlide($data){
    $stt=0;
    foreach ($data as $item) {
        $stt++;
        echo "<tr>";
        echo "
            <td>".$stt."</td>
            <td>".$item['mota']."</td>
            <td><img class='img-slide' src='".url('HinhAnh/Quantri/Slide/'.$item['image'])."' alt=''></td>";
            if($item['status']==1){
                echo "<td><i class='fa fa-check' style='color:green'> Xuất</td>";
            }else{
                echo "<td><i class='fa fa-close' style='color:red'> Ẩn</td>";
            }
        echo   "<td>
                <a class='btn btn-default edit' data-id='".$item['id']."' data-name='".$item['mota']."' data-img='".$item['image']."' data-status='".$item['status']."'  href='".url('edit-slide/'.$item['id'].'')."'>Edit</a>
            </td>
        ";
        echo "</tr>";
    }
}
function listFile($data){
    $stt=0;
    foreach ($data as $item) {
        $stt++;
        echo "<tr>";
        echo "
            <td>".$stt."</td>
            <td>".$item['name']."</td>
            <td>".$item['lop']['name']."</td>
            <td><a href='".$item['link']."' target='_blank'>Link</a></td>";
            if($item['status']==1){
                echo "<td><i class='fa fa-check' style='color:green'> Xuất</td>";
            }else{
                echo "<td><i class='fa fa-close' style='color:red'> Ẩn</td>";
            }
        echo   "
            <td>
                <a class='btn btn-default edit'
                 data-id='".$item['id']."' data-name='".$item['name']."' data-lop='".$item['lop_id']."' 
                 data-status='".$item['status']."' data-link='".$item['link']."' data-mon='".$item['mon_id']."' 
                 href='".url('edit-file/'.$item['id'].'')."'>Edit
                 </a>
            </td>
        ";
        echo "</tr>";
    }
}
function listUser($data){
    $stt=0;
    foreach ($data as $item) {
        $stt++;
        echo "<tr>";
        echo "
            <td>".$stt."</td>
            <td>".$item['name']."</td>
            <td>".$item['email']."</td>";
            if($item['status']==1){
                echo "<td><i class='fa fa-check' style='color:green'> Xuất</td>";
            }else{
                echo "<td><i class='fa fa-close' style='color:red'> Ẩn</td>";
            }
        echo "<td>";
        if(Auth::user()->id==1){
            echo   "
                <a class='btn btn-default edit'
                 data-id='".$item['id']."' data-name='".$item['name']."' 
                 data-email='".$item['email']."'
                 href='".url('edit-user/'.$item['id'].'')."'>Edit
                 </a>";
        }else{
            if(Auth::user()->id==$item['id']){
                echo   "
                <a class='btn btn-default edit'
                 data-id='".$item['id']."' data-name='".$item['name']."' 
                 data-email='".$item['email']."'
                 href='".url('edit-user/'.$item['id'].'')."'>Edit
                 </a>";
            }
        }
        
        echo "</td></tr>";
    }
}

function add($data,$n,$id)
{
    foreach($data as $item){
        if($item->user_id ==  $id && $item->chucnang_id == $n){
            if($item->rule_add == 1){
                echo "<a class='btn btn-primary c_add' data-toggle='modal' href=''><i class='fa fa-plus'></i> Thêm Mới</a>";
            }
        }
    }
}
//function frontend

function menu($data,$parent){
    foreach ($data as $item){
        $id=$item['id'];
        if($item['parent_id']==$parent) {
            if($item['status']==1){
                echo "<li><a href='".url($item['slug'])."'>" . $item['name'] . "</a>";
            };
            echo "<ul>";
                menu($data,$id);
            echo "</ul></li>";
        };
    };
}

//end

?>