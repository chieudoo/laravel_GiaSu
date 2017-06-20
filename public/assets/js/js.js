/**
 * Created by chieu on 5/8/2017.
 */
$(document).ready(function () {
    $('#menu ul li').hover(function () {
        $(this).find('ul').slideDown();
    },function () {
        $(this).find('ul').hide();
    });
    $('#menu .menu_mini img').click(function () {
        $('#menu .menu_mini > ul').toggle(200);
    });
    $('#menu .menu_mini').hover(function () {},function () {
        $(this).find('ul').fadeOut(200);
    });

    var url=window.location.pathname;
    $('#menu ul li a').click(function () {
        var $this=$(this);
        if(url==="/"){
            $this.addClass('m_active');
        }else if(url==="/tin-tuc"){
            $this.addClass('m_active');
        }
    });


    $('.items .intro').hover(function () {
        $(this).find('.gt').css('display','block');
        $(this).animate({'bottom':'0px'},100);
    },function () {
        $(this).find('.gt').css('display','none');
        $(this).animate({'bottom':'-110px'},0);
    });
    $('.download-two > ul > li').click(function () {
       $(this).find('ul').toggle(500);
       // $('.download-two > ul > li > ul').hover(function () {

       // },function () {
       //     $(this).slideUp();
       // })
    });

    $('#lophoc').change(function () {
        var x=$(this).val();
        if(x!=""){
            $('.monhoc').slideDown(500);
        }else{
            $('.monhoc').slideUp(500);
            $(this).val("");
        }
        $.get("/xuly-monhocs",{x:x},function (data) {
            $('#result_mon').html(data);
        })

    });
    $('.subgv').click(function (e) {
        e.preventDefault();
        var name=$('.form-group:eq(0) input[type="text"]').val();
        var email=$('.form-group:eq(1) input[type="email"]').val();
        var sex=$('.form-group:eq(2) select').val();
        var sdt=$('.form-group:eq(3) input[type="text"]').val();
        var ns=$('.form-group:eq(4) input[type="date"]').val();
        var dc=$('.form-group:eq(5) textarea').val();
        var hv=$('.form-group:eq(6) textarea').val();
        var kn=$('.form-group:eq(7) textarea').val();
        var td=$('.form-group:eq(8) select').val();
        var kin=$('.form-group:eq(9) select').val();
        if(name=="" || email=="" || sdt=="" || ns=="" || dc=="" || hv=="" || kn==""){
            $('.note').html("Vui lòng điền đầy đủ thông tin !");
        }else{
            var rejex=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if(!rejex.test(email)) {
                $('.form-group:eq(1) .noteE').fadeIn().html("Vui Lòng Nhập Một Địa Chỉ Email !").delay(4000).slideUp(500);
            }else if(isNaN(sdt)){
                $('.form-group:eq(3) .noteS').fadeIn().html("Vui Lòng Nhập Một Số Điện Thoại !").delay(4000).slideUp(500);
            }else{
                $.post("/add-gia-su",{name:name,email:email,sex:sex,sdt:sdt,ns:ns,dc:dc,hv:hv,kn:kn,td:td,kin:kin,cap:grecaptcha.getResponse()}
                    ,function(data) {

                        var item=JSON.parse(data);
                        console.log(item);
                        for(i=0;i<item.length;i++){
                            if(!item[i].error){
                                $('.note').css('color','green').html(item[i].succes);
                                setTimeout(function () {
                                    location.reload();
                                },1500);

                            }else{
                                $('.captcha').html(item[i].error);
                            }
                        }
                    });
            }

        }

        
    });
    $('.cl_more').click(function (e) {
        e.preventDefault();
        var a=$(this);
        var id=$(this).attr('data-id');
        $.get('get-noidung',{id:id},function (data) {
            a.closest('h1').html(data);
        });
    });
    $('.cl_comment').click(function (e) {
        e.preventDefault();
        var a=$(this);
        a.find('div.comment').toggle();
    });
    $('.sub-ch').click(function (e) {
        e.preventDefault();
        var $this=$(this);
        var name=$('.form-group:eq(0) input[type="text"]').val();
        var email=$('.form-group:eq(1) input[type="email"]').val();
        var noidung=$('.form-group:eq(2) textarea').val();
        var reg=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(name=="" || email=="" || noidung==""){
            $('.note').css('color','red').html("Please fill all data !");
        }else{
            if(!reg.test(email)){
                $('.note').css('color','red').html("Please fill right field email !");
            }else{
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.post('add-question',{name:name,email:email,noidung:noidung,g:grecaptcha.getResponse()},function (data) {
                    var item=JSON.parse(data);
                    for(i=0;i<item.length;i++){
                        if(!item[i].error){
                            $('.note').css('color','green').html(item[i].succ);
                            setTimeout(function () {
                                location.reload();
                            },200)
                        }else{
                            $('.note').css('color','red').html(item[i].error);
                        }
                    }
                })
            }

        }

    });
    $('.download-two ul li').click(function(argument) {
        var $this=$(this);
        var id=$this.attr('data-id');
        $.get("/get-mon",{id:id},function(data) {
            $this.find('ul').html(data);
        });
    });
    // sự kiện change giá tri xắp xếp tài liêu download
    $('#c_lop').change(function(){
        $this=$(this);
        var x=$this.val();
        $.get("/xuly-file",{x:x},function(data){
            $('.change-file').html(data);
        }); 
    });
});

