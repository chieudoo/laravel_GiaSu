@extends('quantri.home')
@section('title','Dashboard')
@section('content')
	
<div class="nav-right-top">
	<div class="col-sm-3 col-md-3 col-lg-3">
		<div class="top-item">
			<div class="top">
				<h1><i class="fa fa-newspaper-o" style="color: #FFFFFF;font-size: 20px"></i> {{ $news }}</h1>
				<p>Tổng Tin Tức</p>
			</div>
			<div class="clearfix"></div>
			<div class="bottom">
				<ul>
					<li>Trong Ngày : <a href="{{ url('list-news') }}">{{ $newsn }}<sub style="color: red;"> Tin Mới</sub></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-sm-3 col-md-3 col-lg-3">
		<div class="top-item">
			<div class="top">
				<h1><i class="fa fa-question-circle" style="color: #9f041b;font-size: 20px"></i> {{ $ch }}</h1>
				<p>Tổng Câu Hỏi</p>
			</div>
			<div class="clearfix"></div>
			<div class="bottom">
				<ul>
					<li>Trong Ngày : <a href="{{ url('list-question') }}">{{ $chn }}<sub style="color: red;"> Câu Hỏi Mới</sub></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-sm-3 col-md-3 col-lg-3">
		<div class="top-item">
			<div class="top">
				<h1><i class="fa fa-user-md" style="color: #ec971f;font-size: 20px"></i> {{ $hv }}</h1>
				<p>Tổng Học Viên</p>
			</div>
			<div class="clearfix"></div>
			<div class="bottom">
				<ul>
					<li>Trong Ngày : <a href="{{ url('list-student') }}">{{ $hvn }}<sub style="color: red;"> Học Viên Mới</sub></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-sm-3 col-md-3 col-lg-3">
		<div class="top-item">
			<div class="top">
				<h1><i class="fa fa-address-book" style="color: #985f0d;font-size: 20px"></i> {{ $gs }}</h1>
				<p>Tổng Gia Sư</p>
			</div>
			<div class="clearfix"></div>
			<div class="bottom">
				<ul>
					<li>Trong Ngày : <a href="{{ url('list-giaovien') }}">{{ $gsn }}<sub style="color: red;"> Gia Sư Mới</sub></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

@endsection