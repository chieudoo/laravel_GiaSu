@extends('giaodien.home')
@section('title','Dịch Vụ Của Chúng Tôi')
@section('content')
<div class="col-md-12">
	<div class="tt_tintuc">
        <a href="">About</a>
        <span>Dịch Vụ</span>
        <p> GMT +7</p>
    </div>
    <div class="clearfix"></div>
    <div class="nd_tintuc">
        <h1>Dịch Vụ Của Chúng Tôi</h1>
        @foreach($about as $item)
        	<p>{!! $item['dichvu'] !!}</p>
        @endforeach
    </div>
</div>
 
@endsection