@extends('quantri.home')
@section('title','List Student')
@section('content')
    <hr>
    <a class="btn btn-primary c_add" data-toggle="modal" href=''><i class="fa fa-plus"></i> Thêm Mới</a>
    <div class="c_modal">
        <div class="col-md-6 col-md-offset-3 c_f">
            <form method="POST" role="form" enctype="multipart/form-data">
                <legend id="f_title"></legend>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>Họ Tên của Bạn</label><sup class="required">**</sup>
                    <input type="text" class="form-control" name="name" required placeholder="Vui lòng nhập  !">
                </div>
                <div class="form-group">
                    <label>Email của Bạn</label><sup class="required">**</sup>
                    <input type="email" class="form-control" name="email" required placeholder="Vui lòng nhập !">
                </div>
                <div class="form-group">
                    <label>Giới Tính</label><sup class="required">**</sup>
                    <select name="sex" class="form-control" required>
                        <option value="0">Nam</option>
                        <option value="1">Nữ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ngày Tháng Năm Sinh</label><sup class="required">**</sup>
                    <input type="date" class="form-control" name="ngaysinh" required>
                </div>
                <div class="form-group">
                    <label>Số Điện Thoại của Bạn</label><sup class="required">**</sup>
                    <input type="text" class="form-control" name="sdt" required placeholder="Vui lòng nhập !">
                </div>
                <div class="form-group">
                    <label>Địa Chỉ của Bạn (Vui lòng có thể ghi rõ số nhà đường)</label><sup class="required">**</sup>
                    <textarea name="diachi" class="form-control" cols="30" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label>Bạn Học Lớp</label><sup class="required">**</sup>
                    <select name="lop_id" class="form-control" id="lophoc" required>
                        <option value="">--Choose--</option>
                        <?php selClass($lop) ?>
                    </select>
                </div>
                <div class="form-group monhoc" style="display: none">
                    <label>Môn Bạn Muốn Học Thêm</label><sup class="required">**</sup>
                    <div class="checkbox form-control" id="result_mon"></div>
                </div>
                <div class="form-group">
                    <label>Yêu Cầu Giới Tính Gia Sư</label><sup class="required">**</sup>
                    <select name="ycgt" class="form-control" required>
                        <option value="0">Nam</option>
                        <option value="1">Nữ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Yêu Cầu Trình Độ Gia Sư</label><sup class="required">**</sup>
                    <select name="yctd" class="form-control" required>
                        <option value="0">Sinh Viên</option>
                        <option value="1">Giáo Viên</option>
                        <option value="2">Giáo Sư</option>
                        <option value="3">Tiến Sỹ</option>
                        <option value="4">Thạc Sỹ</option>
                    </select>
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
            <th>Số Điện Thoại</th>
            <th>Môn Học</th>
            <th>Status</th>
            <th>Manager</th>
        </tr>
        </thead>
        <tbody>
            <?php listStudent($data) ?>
        </tbody>
        {{ $data->render() }}
    </table>
    @include('flash.flash')
@endsection