@extends('giaodien.home')
@section('title','Tin Tức Giáo Dục Cập Nhật')
@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h1 class="tit"><a href="{{ url('tin-tuc') }}">Tin Tức Giáo Dục Cập Nhập</a></h1>
    </div>
    <div class="clearfix"></div>
    @foreach($news as $item)
        @if($item['status']==1)
            <div class="col-md-4 col-sm-6">
                <div class="items">
                    <img src="{{ url('HinhAnh/Quantri/News/'.$item['image']) }}" alt="{{ $item['slug'] }}">
                    <div class="intro">
                        <p>Tin Tức</p>
                        <h4><a href="{{ url('chi-tiet-tin/'.$item['id'].'/'.$item['slug'].'.html') }}">{{ $item['name'] }}</a></h4>
                        <p class="gt">{{ $item['intro'] }}</p>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    <div class="col-md-12">
        {{ $news->render() }}
    </div>
@endsection