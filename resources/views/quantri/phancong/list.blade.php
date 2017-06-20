@extends('quantri.home')
@section('title','List Phân Công Lớp Học')
@section('content')
    <hr>
    <a class="btn btn-primary c_add" data-toggle="modal" href=''><i class="fa fa-plus"></i> Mới</a>
    <div class="c_modal">
        <div class="col-md-8 col-md-offset-2 c_f">
            <form method="POST" role="form" enctype="multipart/form-data">
                <legend id="f_title"></legend>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>Học Viên</label><sup class="required">**</sup>
                    <select name="hv_id" class="form-control" required>
                        <option value="">--Choose--</option>
                        @foreach($hv as $item)
                            @if($item['status']==1)
                                <option value="{{  $item['id'] }}" data-mid="{{ $item['mon_id']  }}">{{ $item['name'] }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group" id="cthv" style="border: 1px solid #2ab27b;padding: 20px;display: none">
                    <label>Chi Tiết Học Viên</label>
                    <div>
                        <table class="table table-hover">

                        </table>
                    </div>
                </div>
                <div class="form-group" id="ajax_hv">
                    <label>Môn Học</label><sup class="required">**</sup>
                    <input type="text" readonly class="form-control" name="mon_hoc" value="">
                </div>
                <div class="form-group" style="width: 50%;float: left">
                    <label>Trình Độ</label><sup class="required">**</sup>
                    <select class="form-control" required id="trinhdo">
                        <option value="">--Choose--</option>
                        <option value="0">Sinh Viên</option>
                        <option value="1">Giáo Viên</option>
                        <option value="2">Giáo Sư</option>
                        <option value="3">Tiến Sỹ</option>
                        <option value="4">Thạc Sỹ</option>
                    </select>
                </div>
                <div class="form-group" style="width: 50%;float: left;" id="ajax_gv">
                    <label>Giáo Viên</label><sup class="required">**</sup>
                    <select name="gv_id" class="form-control" required id="giaovien">
                        <option value=""></option>
                    </select>
                </div>
                <div class="clearfix"></div>
                <div class="form-group" id="ctgv" style="border: 1px solid #ec971f;padding: 15px;display: none">
                    <label>Chi Tiết Giáo Viên</label>
                    <div>
                        <table class="table table-hover">

                        </table>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ngày Bắt Đầu</label><sup class="required">**</sup>
                    <input type="date" class="form-control" name="ngay_bd" required>
                </div>
                <div class="form-group">
                    <label>Tiền/Buổi</label><sup class="required">**</sup>
                    <input type="text" name="money" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Buổi/Tuần</label><sup class="required">**</sup>
                    <input type="number" min="1" max="7" value="1" name="sobuoi" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Chú Thích</label>
                    <textarea name="more" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group" style="display: none">
                    <label>Trạng Thái</label>
                    <div class="radio">
                        <label class="c_active">
                            <input type="radio" name="status" value="0" checked="checked">Continue
                        </label>
                        <label>
                            <input type="radio" name="status" value="1">Finish
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
            <th>Tên Học Viên</th>
            <th>Môn Học</th>
            <th>Gia Sư</th>
            <th>Ngày Bắt Đầu</th>
            <th>Thanh Toán</th>
            <th>Chú Thích</th>
            <th>Status</th>
            <th>Manager</th>
        </tr>
        </thead>
        <tbody>
            <?php listPC($data) ?>
        </tbody>

    </table>
    @include('flash.flash')
@endsection