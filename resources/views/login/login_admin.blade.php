<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Vui lòng đăng nhập quản trị viên</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->

	<script type="text/javascript">
		$(document).ready(function(){
		
			$(window).load(function(){
				$('.login-form').css('display','block').animate({'margin-top':'+=120px'},1000);
			});

		});	
	</script>

</head>
<body style="background-image: url('login/bac.png');">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="col-md-6 col-md-offset-3">
					<form class="login-form" method="POST" role="form" style="display: none;padding: 10%;box-shadow:1px 1px 8px 1px #ccc;border: 1px solid #ccc;background-color: #fff;border-radius: 5px;">
						<legend style="text-align: center;">Đăng Nhập Quản Trị</legend>
						@include('flash.errors')
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label for="">Email</label><span></span>
							<input type="email" name="email" required class="form-control"
							placeholder="Vui lòng nhập email !" value="{{ old('email') }}">
						</div>
						<div class="form-group">
							<label for="">Mật Khẩu</label>
							<input type="password" name="password" required
						 	class="form-control" placeholder="Vui lòng nhập mật khẩu !">
						</div>
					
						
					
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>