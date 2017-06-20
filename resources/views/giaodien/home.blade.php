<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <script type="text/javascript" src="{{ url('assets/js/js.js') }}"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

</head>
<body>
<div class="container-fluid" id="header">
    <img src="{{ url('HinhAnh/Giaodien/logo2.png') }}" alt="">
</div>
<div class="clearfix"></div>
<div class="container" id="menu">
    <ul>
        <li><a href="/">TRANG CHỦ</a></li>
        <?php menu($menu,0) ?>
    </ul>
    <div class="menu_mini">
        <img src="{{ url('HinhAnh/Giaodien/nav-icon.png')  }}" alt="icon-nav" >
        <ul>
            <li><a href="/">TRANG CHỦ</a></li>
            <?php menu($menu,0) ?>
        </ul>
    </div>
</div>
<div class="clearfix"></div>
<div class="container" id="main">
    <div class="col-md-3 col-sm-3 contact">
        <div class="col-md-12 col-sm-12" style="padding: 0;margin-bottom: 15px">
            <div class="contact-one">
                <p><i class="fa fa-question-circle fa-2x"></i> Tư Vấn Miễn Phí</p>
            </div>
            @foreach($about as $item)
            <div class="contact-two">
                <img src="{{ url('HinhAnh/Giaodien/hotline.png')  }}" alt="hotline">
                <ul>
                    <li>
                        Tel 1 : <a href="tel:{{ $item['phone1'] }}">{{ $item['phone1'] }}</a>
                    </li>
                    <li>
                        Tel 1 : <a href="tel:{{ $item['phone2'] }}">{{ $item['phone2'] }}</a>
                    </li>
                </ul>
                <div>
                    <img src="{{ url('HinhAnh/Giaodien/location.png') }}" alt="location">
                    <label style="color: #2a88bd">Văn Phòng</label>
                    <p>{{ $item['address'] }}</p>
                </div>
            </div>
            @endforeach
            <div class="contact-three">
                <img src="{{ url('HinhAnh/Giaodien/skype.jpg') }}" alt="banner skype">
                <div>
                    <a href="skype:chieudo95?chat" ><img src="{{ url('HinhAnh/Giaodien/skype-chat.png') }}" alt="chat skype"></a>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 download">
            <div class="download-one">
                <p><i class="fa fa-cloud-download fa-2x"></i> Download Tài Liệu</p>
            </div>
            <div class="download-two">
                <img src="{{ url('HinhAnh/Giaodien/download.png') }}" alt="icon download">
                <ul>
                @foreach($lop as $item)
                @if($item['status']==1)
                    <li data-id="{{ $item['id'] }}">{{ $item['name'] }}
                        <ul></ul>  
                    </li>
                @endif
                @endforeach
                </ul>
                <p style="text-align: center;"><a href="{{ url('tai-lieu') }}">Xem Thêm</a></p>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 social">
            <div class="fb-page" data-href="https://www.facebook.com/geirockthisworld" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/geirockthisworld" class="fb-xfbml-parse-ignore">
                    <a href="https://www.facebook.com/geirockthisworld">Thiếu Nữ Thừa Gei</a>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="col-md-9 col-sm-9 main">
        @yield('content')
    </div>
</div>
<div class="clearfix"></div>
<div id="footer">
    <div class="container">
        <div class="col-md-3 col-sm-3 col-xs-12 footer-logo">

        </div>
        <div class="col-md-9 col-sm-9 col-xs-12 footer-content">
            <ul>
                <li><a href="{{ url('gioi-thieu') }}">Giới Thiệu</a></li>
                <li><a href="{{ url('chinh-sach') }}">Chính Sách</a></li>
                <li><a href="{{ url('dich-vu') }}">Dịch Vụ</a></li>
                <li><a href="{{ url('lien-he') }}">Liên Hệ</a></li>
                <a href=""><img src=""></a>
            </ul>
            <p>Giấy phép Cung cấp Dịch vụ Phát thanh, Truyền hình trên mạng Internet số 515/GP-BTTTT cấp ngày 18/11/2016</p>
        </div>
    </div>
</div>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5921e9b28028bb73270470c4/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
