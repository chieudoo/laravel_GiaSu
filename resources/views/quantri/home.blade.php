<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="{{ url('assets/css/css-admin.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('assets/css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	
	<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
	<script type="text/javascript" src="{{ url('assets/ckeditor/ckeditor.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/js/js-admin.js') }}"></script>


</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<nav class="navbar navbar-inverse" role="navigation" style="border-radius: 0">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand">Dashboard</a>
					</div>
			
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="{{ url('quan-tri') }}">Home</a></li>
							<li><a href="#">Link</a></li>
						</ul>
						 <form class="navbar-form navbar-left">
						 	<div class="input-group">
						 		<input type="text" class="form-control" placeholder="Search">
						 		<div class="input-group-btn">
						 			<button class="btn btn-default" type="submit">
						 				<i class="glyphicon glyphicon-search"></i>
						 			</button>
						 		</div>
						 	</div>
						 </form>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">Profile</a></li>
									<li><a href="{{ url('/') }}" target="_blank">View Website</a></li>
									<li><a href="{{ url('/dang-xuat') }}">Logout</a></li>
								</ul>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2 col-md-2 col-lg-2" id="nav-left">
				<ul>
					<li><a href="{{ url('quan-tri') }}">HOME</a></li>
					<li><a href="{{ url('list-category') }}">DANH MỤC</a></li>
					<li><a href="{{ url('list-news') }}">TIN TỨC</a></li>
					<li><a href="{{ url('list-class') }}">LỚP HỌC</a></li>
                    <li><a href="{{ url('list-subject') }}">MÔN HỌC</a></li>
					<li><a href="{{ url('list-student')  }}">HỌC VIÊN</a></li>
					<li><a href="{{ url('list-giaovien')  }}">GIÁO VIÊN</a></li>
					<li><a href="{{ url('list-phancong')  }}">PHÂN CÔNG</a></li>
					<li><a href="{{ url('list-question') }}">CÂU HỎI</a></li>
					<li><a href="#">QUẢN LÝ</a>
						<ul>
							<li><a href="{{ url('list-slide') }}">Slide</a></li>
							<li><a href="{{ url('list-file') }}">Tài Liệu</a></li>
							<li><a href="{{ url('about') }}">About</a></li>
							<li><a href="{{ url('list-user') }}">User</a></li>
						</ul>
					</li>
					@if(Auth::user()->id == 1)
					<li><a href="{{ url('phan-quyen') }}">PHÂN QUYỀN</a></li>
					@endif
				</ul>
			</div>
			<div class="col-sm-10 col-md-10 col-lg-10" id="nav-right">
			<h3 style="font-family: Trebuchet MS,Tahoma,Verdana,Arial,sans-serif;color: green"><i class="fa fa-list"></i> @yield('title')</h3>
				@yield('content')
			</div>
		</div>
	</div>
	<script type="text/javascript">
		CKEDITOR.replace( 'contents', {
            filebrowserImageBrowseUrl: "{{ url('assets/ckfinder/ckfinder.html?Type=Images') }}",
            filebrowserImageUploadUrl: "{{ url('assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}",
            filebrowserBrowseUrl: "{{ url('assets/ckfinder/ckfinder.html?Type=Files') }}",
            filebrowserUploadUrl: "{{ url('assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}"
        });
	</script>
</body>
</html>