@extends('giaodien.home')
@section('title','Đăng Ký Là Một Gia Sư')
@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h1 class="tit"><a href="{{ url('gia-su') }}"> Đăng Ký Làm Gia Sư</a></h1>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12">
        <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Nhập Thông Tin</a>
    </div>
    <div class="col-md-12">
        <hr>
        @include('flash.flash') 
    </div>
    <div class="modal fade" id="modal-id">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #2ab27b">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="color: #FFFFFF;"><i class="fa fa-info-circle fa-2x" style="color: #2ca02c;"></i> Đăng Ký Là Một Gia Sư</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" role="form" enctype="multipart/form-data">
                        <legend id="f_title"></legend>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Họ Tên của Bạn</label><sup class="required">**</sup>
                            <input type="text" class="form-control" name="name" required placeholder="Vui lòng nhập  !">
                        </div>
                        <div class="form-group">
                            <label>Email của Bạn</label><sup class="required">**<span class="noteE" style="display: none"></span></sup>
                            <input type="email" class="form-control" name="email" required placeholder="Vui lòng nhập !">
                        </div>
                        <div class="form-group">
                            <label>Giới Tính</label>
                            <select name="sex" class="form-control" required>
                                <option value="0">Nam</option>
                                <option value="1">Nữ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại của Bạn</label><sup class="required">** <span class="noteS" style="display: none"></span></sup>
                            <input type="text" minlength="10" maxlength="11" class="form-control" name="sdt" required placeholder="Vui lòng nhập !">
                        </div>
                        <div class="form-group">
                            <label>Ngày Tháng Năm Sinh</label><sup class="required">**</sup>
                            <input type="date" class="form-control" name="ngaysinh" required placeholder="Vui lòng nhập !">
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ của Bạn (Vui lòng có thể ghi rõ)</label><sup class="required">**</sup>
                            <textarea name="diachi" class="form-control" cols="30" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Học Vấn </label><sup class="required">** (Vui lòng ghi rõ đầy đủ quá trình học tập...)</sup>
                            <textarea name="hocvan" class="form-control" cols="30" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Khả Năng</label><sup class="required">** (Vui lòng ghi rõ khả năng có thể dạy những lớp nào , môn nào...)</sup>
                            <textarea name="khanang" class="form-control" cols="30" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Trình Độ</label>
                            <select name="td" class="form-control" required>
                                <option value="0">Sinh Viên</option>
                                <option value="1">Giáo Viên</option>
                                <option value="2">Giáo Sư</option>
                                <option value="3">Tiến Sỹ</option>
                                <option value="4">Thạc Sỹ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kinh Nghiêm</label>
                            <select name="kn" class="form-control" required>
                                <option value="0">Chưa</option>
                                <option value="1">Đã Có</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>ReCaptcha</label><sup class="required captcha" style="margin: 0px 20px;font-size: 14px"></sup>
                            <div class="g-recaptcha" data-sitekey="6LfCeyEUAAAAAFvDNrPyh2yxfXO15XhCHI8SS_MZ"></div>
                        </div>


                        <button type="submit" class="btn btn-primary subgv">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button><sup class="required note" style="margin: 0px 20px;font-size: 14px"></sup>
                    </form>
                </div>
                <div class="modal-footer" style="background-color: #0f74a8"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <table class="table table-responsive" style="background-color: #fff;box-shadow: 1px 1px 8px 1px #ccc;border: 1px solid #ccc">
            <h2 style="font-size: 20px;color: #2a88bd;text-shadow: 1px 1px 5px orange"><i class="fa fa-table"></i> Bảng Danh Sách Gia Sư</h2>
            <hr>
            <tr>
                <th>Tên Gia Sư</th>
                <th>Giới Tính</th>
                <th>Ngày Sinh</th>
                <th style="width: 20%">Học Vấn</th>
                <th>Trình Độ</th>
            </tr>
            @foreach($gs as $item)
                @if($item['status']==0)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    @if($item['sex']==0)
                        <td>Nam</td>
                    @else
                        <td>Nữ</td>
                    @endif
                    <td>{{ $item['ngaysinh'] }}</td>
                    <td>{{ $item['hocvan'] }}</td>
                    @if($item['td']==0)
                        <td>Sinh Viên</td>
                    @elseif($item['td']==1)
                        <td>Giáo Viên</td>
                    @elseif($item['td']==2)
                        <td>Giáo Sư</td>
                    @elseif($item['td']==3)
                        <td>Tiến Sỹ</td>
                    @else
                        <td>Thạc Sỹ</td>
                    @endif
                </tr>
                @endif
            @endforeach
        </table>
    </div>
@endsection