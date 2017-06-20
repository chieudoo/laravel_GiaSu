@extends('quantri.home')
@section('title','Danh Sách Quản Trị Viên')
@section('content')
<hr>
    <a class="btn btn-primary c_add" data-toggle="modal" href=''><i class="fa fa-plus"></i> Thêm Mới</a>
    <div class="c_modal">
        <div class="col-md-6 col-md-offset-3 c_f">
            <form method="POST" role="form" enctype="multipart/form-data">
                <legend id="f_title"></legend>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="umore">
	                <div class="form-group">
	                    <label>Tên Quản Trị</label><sup class="required">**</sup>
	                    <input type="text" class="form-control" name="name" required placeholder="Vui lòng nhập !">
	                </div>
	                <div class="form-group">
	                    <label>Email</label><sup class="required"></sup>
	                    <input type="email" name="email" required class="form-control" placeholder="Vui lòng nhập !">
	                </div>
                </div>
                <div class="form-group">
                    <label>Mật Khẩu</label><sup class="required">**</sup>
                    <input type="password" class="form-control" name="password" required placeholder="Vui lòng nhập !">
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
    @include('flash.errors')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên Quản Trị</th>
            <th>Email</th>
            <th>Status</th>
            <th>Manager</th>
        </tr>
        </thead>
        <tbody>
        <?php listUser($data) ?>
        </tbody>
    </table>
    @include('flash.flash')
@endsection