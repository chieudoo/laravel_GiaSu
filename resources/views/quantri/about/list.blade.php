@extends('quantri.home')
@section('title','About')
@section('content')

<!-- <a class="btn btn-primary c_add" data-toggle="modal" href=''><i class="fa fa-plus"></i> Thêm Mới</a> -->
<div class="c_modal">
	<div class="col-md-8 col-md-offset-2 c_f">
		<form method="POST" role="form">
			<legend id="f_title"></legend>
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			@foreach($data as $item)
			<div class="form-group">
				<label>Phone 1</label>
				<input type="text" minlength="1" maxlength="11" class="form-control" name="phone1" value="{{ $item['phone1'] }}"  placeholder="Vui lòng nhập tên danh muc !">
			</div>
			<div class="form-group">
				<label>Phone 2</label>
				<input type="text" minlength="1" maxlength="11" class="form-control" name="phone2" value="{{ $item['phone2'] }}"  placeholder="Vui lòng nhập tên danh muc !">
			</div>
			<div class="form-group">
				<label>Địa Chỉ</label>
				<textarea name="address" class="form-control" value="{{ $item['address'] }}" rows="5">{{ $item['address'] }}</textarea>
			</div>
			<div class="form-group">
				<label>Giới Thiệu</label>
				<textarea name="gioithieu" class="form-control" rows="5">
					{{ $item['gioithieu'] }}
				</textarea>
			</div>
			<script type="text/javascript">
				CKEDITOR.replace( 'gioithieu', {
		            filebrowserImageBrowseUrl: "{{ url('assets/ckfinder/ckfinder.html?Type=Images') }}",
		            filebrowserImageUploadUrl: "{{ url('assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}",
		            filebrowserBrowseUrl: "{{ url('assets/ckfinder/ckfinder.html?Type=Files') }}",
		            filebrowserUploadUrl: "{{ url('assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}"
		        });
			</script>
			<div class="form-group">
				<label>Dịch Vụ</label>
				<textarea name="dichvu" class="form-control" rows="5">
					{{ $item['dichvu'] }}
				</textarea>
			</div>
			<script type="text/javascript">
				CKEDITOR.replace( 'dichvu', {
		            filebrowserImageBrowseUrl: "{{ url('assets/ckfinder/ckfinder.html?Type=Images') }}",
		            filebrowserImageUploadUrl: "{{ url('assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}",
		            filebrowserBrowseUrl: "{{ url('assets/ckfinder/ckfinder.html?Type=Files') }}",
		            filebrowserUploadUrl: "{{ url('assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}"
		        });
			</script>
			<div class="form-group">
				<label>Liên Hệ</label>
				<textarea name="lienhe" class="form-control" value="{{ $item['lienhe'] }}" rows="5">
					{{ $item['lienhe'] }}
				</textarea>
			</div>
			<script type="text/javascript">
				CKEDITOR.replace( 'lienhe', {
		            filebrowserImageBrowseUrl: "{{ url('assets/ckfinder/ckfinder.html?Type=Images') }}",
		            filebrowserImageUploadUrl: "{{ url('assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}",
		            filebrowserBrowseUrl: "{{ url('assets/ckfinder/ckfinder.html?Type=Files') }}",
		            filebrowserUploadUrl: "{{ url('assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}"
		        });
			</script>
			<div class="form-group">
				<label>Chính Sách</label>
				<textarea name="chinhsach" class="form-control" value="{{ $item['chinhsach'] }}" rows="5">
					{{ $item['chinhsach'] }}
				</textarea>
			</div>
			<script type="text/javascript">
				CKEDITOR.replace( 'chinhsach', {
		            filebrowserImageBrowseUrl: "{{ url('assets/ckfinder/ckfinder.html?Type=Images') }}",
		            filebrowserImageUploadUrl: "{{ url('assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}",
		            filebrowserBrowseUrl: "{{ url('assets/ckfinder/ckfinder.html?Type=Files') }}",
		            filebrowserUploadUrl: "{{ url('assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}"
		        });
			</script>
			@endforeach
			
		<hr>
			
		
			<button type="submit" class="btn btn-primary">Submit</button>
			<button type="button" class="btn btn-default c_close">Close</button>
		</form>
	</div>
</div>
@include('flash.errors')
<table class="table table-hover">
	@foreach($data as $item)
	<tr>
		<th>Số Điện Thoại 1</th>
		<td>{{ $item['phone1'] }}</td>
		<td><a class='btn btn-default edit' data-id="1">Sửa</a></td>
	</tr>
	<tr>
		<th>Số Điện Thoại 2</th>
		<td>{{ $item['phone2'] }}</td>
		<td><a class='btn btn-default edit'  data-id="2">Sửa</a></td>
	</tr>
	<tr>
		<th>Địa Chỉ</th>
		<td>{{ $item['address'] }}</td>
		<td><a class='btn btn-default edit' data-id="3">Sửa</a></td>
	</tr>
	<tr>
		<th>Giới Thiệu</th>
		<td style="width: 50%">{!! $item['gioithieu'] !!}</td>
		<td><a class='btn btn-default edit' data-id="4">Sửa</a></td>
	</tr>
	<tr>
		<th>Dịch Vụ</th>
		<td style="width: 50%">{!! $item['dichvu'] !!}</td>
		<td><a class='btn btn-default edit' data-id="5">Sửa</a></td>
	</tr>
	<tr>
		<th>Liên Hệ</th>
		<td style="width: 50%">{!! $item['lienhe'] !!}</td>
		<td><a class='btn btn-default edit'  data-id="6">Sửa</a></td>
	</tr>
	<tr>
		<th>Chính Sách</th>
		<td style="width: 50%">{!! $item['chinhsach'] !!}</td>
		<td><a class='btn btn-default edit'  data-id="7">Sửa</a></td>
	</tr>
	@endforeach
</table>
	@include('flash.flash')
@endsection