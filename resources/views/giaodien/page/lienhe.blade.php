@extends('giaodien.home')
@section('title','Liên Hệ Với Chúng Tôi')
@section('content')
<div class="col-md-12">
	<div class="tt_tintuc">
        <a href="">About</a>
        <span>Liên Hệ</span>
        <p> GMT +7</p>
    </div>
    <div class="clearfix"></div>
    <div class="nd_tintuc">
        <h1>Liên Hệ Với Chúng Tôi</h1>
        @foreach($about as $item)
        	<p>{!! $item['lienhe'] !!}</p>
        @endforeach
    </div>
</div>
 
@endsection