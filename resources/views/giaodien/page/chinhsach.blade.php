@extends('giaodien.home')
@section('title','Chính Sách')
@section('content')
<div class="col-md-12">
	<div class="tt_tintuc">
        <a href="">About</a>
        <span>Chính Sách</span>
        <p> GMT +7</p>
    </div>
    <div class="clearfix"></div>
    <div class="nd_tintuc">
        <h1>Chính Sách Của Chúng Tôi</h1>
        @foreach($about as $item)
        	<p>{!! $item['chinhsach'] !!}</p>
        @endforeach
    </div>
</div>
 
@endsection