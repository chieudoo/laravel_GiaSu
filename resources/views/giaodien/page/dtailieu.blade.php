@extends('giaodien.home')
@section('title','Danh Sách Tài Liệu Miễn Phí')
@section('content')
<div class="col-md-6 col-md-offset-3">
    <h1 class="tit"><a href="{{ url('tai-lieu') }}"> Danh Sách Tài Liệu</a></h1>
</div>
<div class="clearfix"></div>
<div class="col-md-12">
		<div class="col-md-3 col-md-sm-3">
			<div class="form-group">
				<label>Chọn</label>
				<select class="form-control" id="c_lop">
					<option value="">-- Xắp Xếp --</option>
					<?php
						foreach ($l as $item) {
							echo "<option value='".$item['id']."'>".$item['name']."</option>";
						}
					?>
				</select>
			</div>
		</div>
		<table class="table table-bordered table-hover change-file">
		@foreach($tl as $item)
			<tr style="background-color: #ffffff">
				<td style="width: 80%">{{ $item['name'] }}</td>
				<td><a href="{{ $item['link'] }}">Link</a></td>
			</tr>
		@endforeach
		</table>
</div>
@endsection