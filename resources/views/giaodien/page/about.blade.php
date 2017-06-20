@extends('giaodien.home')
@section('title','Giới Thiêu')
@section('content')
<div class="col-md-12">
	<div class="tt_tintuc">
        <a href="">About</a>
        <span>Giới Thiệu</span>
        <p> GMT +7</p>
    </div>
    <div class="clearfix"></div>
    <div class="nd_tintuc">
        <h1>Cơ Bản Về Chúng Tôi</h1>
        @foreach($about as $item)
        	<p>{!! $item['gioithieu'] !!}</p>
        @endforeach
    </div>
</div>
 
@endsection