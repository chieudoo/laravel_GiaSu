@extends('giaodien.home')
@section('title','Gia Sư Cho Bạn ! Định Hướng Online')
@section('content')
    <div class="col-md-12">
        <div class="slide">
            <div id="carousel-id" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-id" data-slide-to="0" class=""></li>
                    <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
                </ol>
                <div class="carousel-inner">
                @foreach($slide as $item)
                @if($item['status']==1)
                @if($item['id']==1)
                    <div class="item active">
                        <img src="{{ url('HinhAnh/Quantri/slide/'.$item['image']) }}" alt="" />
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>{{ $item['mota'] }}</h1>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="item">
                        <img src="{{ url('HinhAnh/Quantri/slide/'.$item['image']) }}" alt="" />
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>{{ $item['mota'] }}</h1>
                            </div>
                        </div>
                    </div>
                @endif
                @endif
                @endforeach
                </div>
                <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-md-offset-4">
        <h1 class="tit"><a href="">Tin Giáo Dục</a></h1>
    </div>
    <div class="clearfix"></div>
    @foreach($news as $item)
        @if($item['status']==1)
    <div class="col-md-4 col-sm-6 col-xs-12 inews">
        <div class="items">
            <img src="{{ url('HinhAnh/Quantri/News/'.$item['image']) }}" alt="{{ $item['slug'] }}">
            <div class="intro">
                <p>Tin Tức</p>
                <h4><a href="{{ url('chi-tiet-tin/'. $item['id'] .'/'.$item['slug'].'.html') }}">{{ $item['name'] }}</a></h4>
                <p class="gt">{{ $item['intro'] }}</p>
            </div>
        </div>
    </div>
        @endif
    @endforeach
    <div class="clearfix"></div>
    <div class="col-md-6 col-sm-12">
        <div class="hmore">
            <h3>Lý Do Chọn Chúng Tôi</h3>
            <ul>
                <li><i class="fa fa-circle-o"></i>
                    Giá Cả Tốt Nhất
                </li>
                <li><i class="fa fa-calendar-check-o"></i>
                    Cập Nhật Thường Xuyên
                </li>
                <li><i class="fa fa-play-circle"></i>
                    Đa Dạng Phong Phú
                </li>
                <li><i class="fa fa-pencil-square"></i>
                    Dịch Vụ Chu Đáo
                </li>
                <li><i class="fa fa-phone-square"></i>
                    Hỗ Trợ Nhiệt Tình
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="gmore">
            <h3>Giáo Dục Tương Lai</h3>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12">
        <div class="set-hv">
            <div class="set-hv-r">
                <img src="{{ url('HinhAnh/Giaodien/tag_gift.png') }}" alt="tag gift">
                <span>Cho Chúng Tôi Biết Bạn Cần Gì !</span>
            </div>
            <div class="set-hv-l">
                <a class="btn-set" href="{{ url('hoc-vien') }}">Đăng Ký Học Viên</a>
                <a class="btn-set" href="{{ url('gia-su') }}">Đăng Ký Gia Sư</a>
            </div>
        </div>
    </div>
@endsection