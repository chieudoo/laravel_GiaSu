$(document).ready(function() {
	$('.notice').delay(2000).fadeOut(500);
	$('.radio label:eq(0)').click(function(){
		$(this).addClass('c_active');
		$('.radio label:eq(1)').removeClass('c_active');
		$(this).find('input').attr("checked","checked");
		$('.radio label:eq(1) input').removeAttr('checked');
	});
	$('.radio label:eq(1)').click(function(){
		$(this).addClass('c_active');
		$('.radio label:eq(0)').removeClass('c_active');
		$(this).find('input').attr("checked","checked");
		$('.radio label:eq(0) input').removeAttr('checked');
	});
	$('#nav-left ul li').hover(function(){
		$(this).find('ul').fadeIn();
	},function(){
		$(this).find('ul').fadeOut();
	});

    $('.top-item:eq(0) .top').css('background-color','#39c224');
    $('.top-item:eq(0)').css('border','1px solid #39c224');

	$('.top-item:eq(1) .top').css('background-color','#00ffff');
	$('.top-item:eq(1)').css('border','1px solid #00ffff');

    $('.top-item:eq(3) .top').css('background-color','#f0f8ff');
    $('.top-item:eq(3)').css('border','1px solid #f0f8ff');

    $('.top-item:eq(2) .top').css('background-color','#ffebcd');
    $('.top-item:eq(2)').css('border','1px solid #ffebcd');

	$('#lophoc').change(function () {
	    var x=$(this).val();
	    if(x!=""){
            $('.monhoc').slideDown(500);
        }else{
            $('.monhoc').slideUp(500);
            $(this).val("");
        }
        $.get("/xuly-monhoc",{x:x},function (data) {
            $('#result_mon').html(data);
        })

    });
	$('.c_f .form-group:eq(1) select').change(function () {
		$this=$(this);
		var id=$this.val();
		$.get("/xuly-m",{id:id},function (data) {
			$('.c_f .form-group:eq(2) select').html(data);
        })
    });

	var path=window.location.pathname;

	tab("/quan-tri",0);
	tab("/list-category",1);
	tab("/list-news",2);
	tab("/list-class",3);
	tab("/list-subject",4);
	tab("/list-student",5);
	tab("/detail-student",5);
	tab("/list-giaovien",6);
	tab("/detail-giaovien",6);
	tab("/list-phancong",7);
	tab("/detail-phancong",7);
    tab("/list-question",8);

	function tab(str,i) {
		if(path.indexOf(str)!=-1){
			$('#nav-left ul li a').removeClass('tab_active');
			$('#nav-left ul li:eq("'+i+'") a').addClass('tab_active');
		}
	}
	$('.c_add').click(function(e){
		e.preventDefault();
		switch (path) {
			case "/list-category":
				$('.c_f .form-group:eq(0) input').val("");
				$('#f_title').html("Thêm Danh Mục");
				break;
            case "/list-news":
                $('.c_f .form-group:eq(0) input').val("");
                $('.c_f .form-group:eq(1) input').val("");
                $('.c_f .form-group:eq(2) input').val("");
                CKEDITOR.instances['contents'].setData("");
                $('.c_f .form-group:eq(4) sup.required').show();
                $('.c_f .form-group:eq(4) input[type="hidden"]').val("");
                $('.c_f .form-group:eq(5)').css('display','none');
				$('#f_title').html("Thêm Bài Tin");
				break;
			case "/list-class":
                $('.c_f .form-group:eq(0) input').val("");
				$('#f_title').html("Thêm Lớp Học");
				break;
            case "/list-subject":
                $('.c_f .form-group:eq(0) input').val("");
                $('#f_title').html("Thêm Môn Học");
                break;
			case "/list-phancong":
                $('#f_title').html("Phân Công");
                $('.c_modal .form-group:eq(0) select').change(function () {
					var x=$(this).find('option:selected').attr('data-mid');
					var y=$(this).val();
					if(y!=""){
						$('#cthv').slideDown(500);
                        $.get('/xuly-ctsv',{y:y},function (data) {
                            var item=JSON.parse(data);
                            for(i=0;i<item.length;i++){
                                $('#cthv div table.table').html("<tr><td>Lớp</td><td>"+item[i].lop+"</td></tr><tr><td>Email</td><td>"+item[i].email+"</td></tr><tr><td>Ngày Sinh</td><td>"+item[i].ns+"</td><tr><td>Yêu Cầu Giới Tính Gia Sư</td><td>"+item[i].gt+"</td></tr><tr><td>Yêu Cầu Trình Độ Gia Sư</td><td>"+item[i].td+"</td></tr>");
                            }
                        })
                        $.get("/xuly-hv",{x:x},function (data) {
                            $('#ajax_hv').html("<label>Môn Học</label><sup class='required'>**</sup><input type='text' readonly class='form-control' name='mon_hoc' value='"+data+"'>");
                        });
					}else{
                        $('#cthv').slideUp(500);
                        $('#ajax_hv').html("<label>Môn Học</label><sup class='required'>**</sup><input type='text' readonly class='form-control' name='mon_hoc' value=''>");
                    }
                });
                $('#trinhdo').change(function () {
					var x=$(this).val();
					if(x!=""){
                        $('#ajax_gv select').html("");
                        $.get("/xuly-gv",{x:x},function (data) {
                            item=JSON.parse(data);
                            if(item.length===0){
                                $('#ajax_gv select').html("<option value=''>Updating...</option>");
                            }else{
                                for (i=0;i<item.length;i++){
                                    $('#ajax_gv select').append("<option value='"+item[i].id+"'>"+item[i].name+"</option>");
                                }
                            }
                        });
                    }else{
                        $('#ajax_gv select').html("<option value=''>--Choose--</option>");
                    }
                });
                $('#giaovien').change(function () {
                    var x=$(this).val();
                    if(x!=""){
                        $('#ctgv').slideDown();
                        $.get("/xuly-ctgv",{x:x},function (data) {
                            var item=JSON.parse(data);
                            for(i=0;i<item.length;i++){
                                $('#ctgv div table').html("<tr><td>Giới Tính</td><td>"+item[i].sex+"</td></tr><tr><td>Khả Năng</td><td>"+item[i].kn+"</td></tr>");
                            }
                        });
                    }else{
                        $('#ctgv').slideUp();
                    }
                });
                break;
            case "/list-question":
                $('.c_f div.obj').css('display','block');
                $('.c_f div.obj .form-group:eq(0) input[type="text"]').val("");
                $('.c_f div.obj .form-group:eq(1) input[type="email"]').val("");
                $('.c_f div.obj .form-group:eq(2) input[type="text"]').val("");
                $('.c_f div.obj .form-group:eq(3) textarea').val("");
                break;
            case "/list-slide":
                $('#f_title').html("Thêm Slide");
            	$('.c_f .form-group:eq(0) input[type="text"]').val("");
            	$('.c_f .form-group:eq(1) input[type="hidden"]').val("");
            	$('.c_f .form-group:eq(2)').css('display','none');
            	break;
			case "/list-file":
                $('#f_title').html("Thêm Tài Liệu");
                $('.c_f .form-group:eq(0) input[type="text"]').val("");
                $('.c_f .form-group:eq(1) sup.required').html("**");
                $('.c_f .form-group:eq(1) input[type="hidden"]').val("");
                $('.c_f .form-group:eq(2) input[type="hidden"]').val("");
                $('.c_f .form-group:eq(3) input[type="text"]').val("");
				break;
			case "/list-user":
				$('.c_f .form-group:eq(0) input').val("");
				$('.c_f .umore').css('display','block');
				$('.c_f .form-group:eq(1) input').val("");
				$('#f_title').html("Thêm Quản Trị Viên");
				break;
			default:
                // statements_def
				break;
		}
		$('.c_modal').fadeIn();
		$('.c_modal').find('.c_f').fadeIn().animate({'margin-top':'+=100px'},200);
	});
	$('.edit').click(function(e){
		e.preventDefault();
		var id=$(this).attr('data-id');
		var name=$(this).attr('data-name');
		var email=$(this).attr('data-email');
        var title=$(this).attr('data-title');
		var img=$(this).attr('data-img');
		var intro=$(this).attr('data-intro');
		var content=$(this).attr('data-content');
		var cat=$(this).attr('data-cat');
		var status=$(this).attr('data-status');
		var link=$(this).attr('data-link');
		var l=$(this).attr('data-lop');
        var m=$(this).attr('data-mon');
		var lop=$(this).closest("tr").find("td:eq(2)").html();
		switch (path) {
			case "/list-category":
				window.history.pushState("","","edit-category/"+id);
				$('.c_f .form-group:eq(0) input').val(name);
				$('#f_title').html("Sửa Danh Mục");
				break;
			case "/list-news":
				window.history.pushState("","","edit-news/"+id);
				$('.c_f .form-group:eq(0) input').val(name);
				$('.c_f .form-group:eq(1) input').val(cat);
				$('.c_f .form-group:eq(2) input').val(intro);
				CKEDITOR.instances['contents'].setData(content);
                $('.c_f .form-group:eq(4) sup.required').hide();
				$('.c_f .form-group:eq(4) input[type="hidden"]').val(img);
				$('.c_f .form-group:eq(5)').css('display','block');
                $('.c_f .form-group:eq(5) img').attr('src','../HinhAnh/Quantri/News/'+img);
				$('#f_title').html("Sửa Bài Tin");
				break;
			case "/list-class":
                window.history.pushState("","","edit-class/"+id);
                $('.c_f .form-group:eq(0) input').val(name);
                $('#f_title').html("Sửa Lớp Học");
				break;
            case "/list-subject":
                window.history.pushState("","","edit-subject/"+id);
                $('.c_f .form-group:eq(0) input').val(name);
                $('#f_title').html("Sửa Môn Học");
                break;
			case "/list-question":
                window.history.pushState("","","/edit-question"+id);
                $('.c_f div.obj').css('display','none');
                $('.c_f div.obj .form-group:eq(0) input[type="text"]').val(name);
                $('.c_f div.obj .form-group:eq(1) input[type="email"]').val(email);
                $('.c_f div.obj .form-group:eq(2) input[type="text"]').val(title);
                $('.c_f div.obj .form-group:eq(3) textarea').val(content);
				break;
			case "/list-slide":
				window.history.pushState("","","edit-slide/"+id);
                $('#f_title').html("Edit Slide");
            	$('.c_f .form-group:eq(0) input[type="text"]').val(name);
            	$('.c_f .form-group:eq(1) input[type="hidden"]').val(img);
            	$('.c_f .form-group:eq(2)').css('display','block');
            	$('.c_f .form-group:eq(2) img').attr('src','../HinhAnh/Quantri/Slide/'+img);
            	break;
			case "/list-file":
                $('#f_title').html("Sửa Tài Liệu");
                $('.c_f .form-group:eq(0) input[type="text"]').val(name);
                $('.c_f .form-group:eq(1) sup.required').html(lop);
                $('.c_f .form-group:eq(1) input[type="hidden"]').val(l);
                $('.c_f .form-group:eq(2) input[type="hidden"]').val(m);
                $('.c_f .form-group:eq(3) input[type="text"]').val(link);
                window.history.pushState("","","edit-file/"+id);
				break;
			case "/list-user":
				$('#f_title').html("Sửa Quản Trị Viên");
				window.history.pushState("","","edit-user/"+id);
				$('.c_f .umore').css('display','none');
				$('.c_f .form-group:eq(0) input[type="text"]').val(name);
                $('.c_f .form-group:eq(1) input[type="email"]').val(email);
				break;
			case "/about":
				if(id==1){
					$('#f_title').html("Update Số Điện Thoại");
		    		$('.c_f .form-group:gt(0)').css('display','none');
		    		$('.c_f .form-group:eq(0)').css('display','block');
		    	}else if(id==2){
		    		$('#f_title').html("Update Số Điện Thoại");
		    		$('.c_f .form-group:lt(1)').css('display','none');
		    		$('.c_f .form-group:gt(1)').css('display','none');
		    		$('.c_f .form-group:eq(1)').css('display','block');
		    	}else if(id==3){
		    		$('#f_title').html("Update Địa Chỉ");
		    		$('.c_f .form-group:lt(2)').css('display','none');
		    		$('.c_f .form-group:gt(2)').css('display','none');
		    		$('.c_f .form-group:eq(2)').css('display','block');
		    	}else if(id==4){
		    		$('#f_title').html("Update Giới Thiệu");
		    		$('.c_f .form-group:lt(3)').css('display','none');
		    		$('.c_f .form-group:gt(3)').css('display','none');
		    		$('.c_f .form-group:eq(3)').css('display','block');
		    	}else if(id==5){
		    		$('#f_title').html("Update Dịch Vụ");
		    		$('.c_f .form-group:lt(4)').css('display','none');
		    		$('.c_f .form-group:gt(4)').css('display','none');
		    		$('.c_f .form-group:eq(4)').css('display','block');
		    	}else if(id==6){
		    		$('#f_title').html("Update Liên Hệ");
		    		$('.c_f .form-group:lt(5)').css('display','none');
		    		$('.c_f .form-group:gt(5)').css('display','none');
		    		$('.c_f .form-group:eq(5)').css('display','block');
		    	}else{
		    		$('#f_title').html("Update Chính Sách");
		    		$('.c_f .form-group:lt(6)').css('display','none');
		    		$('.c_f .form-group:eq(6)').css('display','block');
		    	}
				break;
			default:
				// statements_def
				break;
		}
		$('.c_modal').fadeIn();
		$('.c_modal').find('.c_f').fadeIn().animate({'margin-top':'+=100px'},500);
	});
	$('.c_close').click(function(){
		$('.c_modal').fadeOut(200);
		$('.c_modal').find('.c_f').animate({'margin-top':'-=100px'},500);
		switch (path) {
			case "/list-category":
				window.history.pushState("","","/list-category");
				break;
			case "/list-news":
				window.history.pushState("","","/list-news");
				break;
			case "/list-class":
				window.history.pushState("","","/list-class");
				break;
            case "/list-subject":
                window.history.pushState("","","/list-subject");
                break;
            case "/list-question":
                window.history.pushState("","","/list-question");
                break;
            case "/list-slide":
            	window.history.pushState("","","/list-slide");
            	break;
			case "/list-file":
                window.history.pushState("","","/list-file");
                break;
            case "/list-user":
            	window.history.pushState("","","/list-user");
            	break;
			default:
				// statements_def
				break;
		}
		$('#delete_pc').click(function () {
			var hv=$(this).attr('data-hv');
			var gv=$(this).attr('data-gv');
			$.get("/xuly-pc",{hv:hv,gv:gv},function (data) {
				console.log(data);
            });
        });
		
	});
    $('.edit').click(function(){
    	$this=$(this);
    	var id=$this.attr('data-id');

	});
	
	$('#submit_rule').click(function(e) {
		e.preventDefault();

		var q = $('select[name="role_id"]').val();
		var cn = $('select[name="chucnang_id"]').val();
		var t = $('input[name="them"]:checked').val();
		var s = $('input[name="sua"]:checked').val();
		var x = $('input[name="xoa"]:checked').val();

		if(t == null){
			t=0;
		}
		if(s == null){
			s=0;
		}
		if(x == null){
			x=0;
		}
		
		var data = new FormData();
		data.append('role',q);
		data.append('cn',cn);
		data.append('add',t);
		data.append('edit',s);
		data.append('delete',x);
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: 'add-rule-group',
			type: 'POST',
			processData:false,
			contentType:false,
			data: data,
			success:function(kq){
				console.log(kq);   
			}
		});
		
		
		// console.log(q +" "+cn+" "+t+" "+s+" "+x);
	});


});
