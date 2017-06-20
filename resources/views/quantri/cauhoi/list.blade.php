@extends('quantri.home')
@section('title','Danh Sách Câu Hỏi')
@section('content')
    <hr>
    <a class="btn btn-primary c_add" data-toggle="modal" href=''><i class="fa fa-plus"></i> Thêm Mới</a>
    <div class="c_modal">
        <div class="col-md-6 col-md-offset-3 c_f">
            <form method="POST" role="form" enctype="multipart/form-data">
                <legend id="f_title">Thêm Câu Hỏi</legend>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="obj">
                    <div class="form-group">
                        <label>Họ Tên của Bạn</label><sup class="required">**</sup>
                        <input type="text" class="form-control" name="name" required placeholder="Vui lòng nhập  !">
                    </div>
                    <div class="form-group">
                        <label>Email của Bạn</label><sup class="required">**</sup>
                        <input type="email" class="form-control" name="email" required placeholder="Vui lòng nhập !">
                    </div>
                    <div class="form-group">
                        <label>Nội Dung</label><sup class="required">**</sup>
                        <textarea name="noidung" class="form-control" cols="30" rows="5" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label>Trạng Thái</label>
                    <div class="radio">
                        <label class="c_active">
                            <input type="radio" name="status" value="0" checked="checked">Xuất
                        </label>
                        <label>
                            <input type="radio" name="status" value="1">Ẩn
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
            <th>Họ Tên</th>
            <th>Email</th>
            <th style="width: 30%">Nội Dung</th>
            <th>Status</th>
            <th>Quản Lý</th>
        </tr>
        </thead>
        <tbody>
        <?php listCH($ch) ?>
        </tbody>
    </table>
    @include('flash.flash')
@endsection