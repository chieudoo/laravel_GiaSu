@extends('quantri.home')
@section('title','List Lớp Học')
@section('content')
<hr>
@if(Auth::user()->id == 1)
<a class="btn btn-primary c_add" data-toggle="modal" href=''><i class="fa fa-plus"></i> Thêm Mới</a>
@else
<?php
	add($quyen,2,$id);
?>
@endif
    <div class="c_modal">
        <div class="col-md-6 col-md-offset-3 c_f">
            <form method="POST" role="form" enctype="multipart/form-data">
                <legend id="f_title"></legend>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>Tên Lớp</label><sup class="required">**</sup>
                    <input type="text" class="form-control" name="name" required placeholder="Vui lòng nhập !">
                </div>
                <div class="form-group">
                    <label>Trạng Thái</label>
                    <div class="radio">
                        <label class="c_active">
                            <input type="radio" name="status" value="1" checked="checked">Xuất
                        </label>
                        <label>
                            <input type="radio" name="status" value="0">Ẩn
                        </label>
                    </div>
                </div>

                <hr>


                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-default c_close">Close</button>
            </form>
        </div>
    </div>
    <hr>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên Lớp</th>
            <th>Status</th>
            <th>Manager</th>
        </tr>
        </thead>
        <tbody>
        <?php listLophoc($data) ?>
        </tbody>
    </table>
    @include('flash.flash')
@endsection