@extends('giaodien.home')
@section('title','Đăng Ký Tìm Gia Sư')
@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h1 class="tit"><a href="{{ url('hoc-vien') }}"> Tìm Gia Sư Online</a></h1>
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
                    <h4 class="modal-title" style="color: #FFFFFF;"><i class="fa fa-info-circle fa-2x" style="color: #2ca02c;"></i> Đăng Ký Tìm Gia Sư Online</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" role="form" enctype="multipart/form-data">
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
                            <label>Giới Tính</label>
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
                            <label>Yêu Cầu Giới Tính Gia Sư</label>
                            <select name="ycgt" class="form-control" required>
                                <option value="0">Nam</option>
                                <option value="1">Nữ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Yêu Cầu Trình Độ Gia Sư</label>
                            <select name="yctd" class="form-control" required>
                                <option value="0">Sinh Viên</option>
                                <option value="1">Giáo Viên</option>
                                <option value="2">Giáo Sư</option>
                                <option value="3">Tiến Sỹ</option>
                                <option value="4">Thạc Sỹ</option>
                            </select>
                        </div>
                        <hr>


                        <button type="submit" class="btn btn-primary add-hocvien">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
    <table class="table table-responsive" style="background-color: #fff;box-shadow: 1px 1px 8px 1px #ccc;border: 1px solid #ccc">
        <h2 style="font-size: 20px;color: #2a88bd;text-shadow: 1px 1px 5px orange"><i class="fa fa-table"></i> Bảng Danh Sách Học Viên Đang Cần Tìm Gia Sư</h2>
        <hr>
        <tr>
            <th>Tên Sinh Viên</th>
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>
            <th>Lớp</th>
            <th style="width: 20%">Môn Cần Gia Sư</th>
            <th>YCGT</th>
            <th>YCTD</th>
        </tr>
        @foreach($hv as $item)
            @if($item['status']==1)
            <tr>
                <td>{{ $item['name'] }}</td>
                @if($item['sex']==0)
                    <td>Nam</td>
                @else
                    <td>Nữ</td>
                @endif
                <td>{{ $item['ngaysinh'] }}</td>
                <td>{{ $item['lophoc']['name'] }}</td>
                <?php
                    $arr=str_split($item['mon_id'],1);
                    echo "<td>";
                    for ($i=0;$i<count($arr);$i++){
                        monhoc($arr[$i]);
                    }
                    echo "</td>";
                ?>
                @if($item['ycgt']==0)
                    <td>Nam</td>
                @else
                    <td>Nữ</td>
                @endif
                @if($item['yctd']==0)
                    <td>Sinh Viên</td>
                @elseif($item['yctd']==1)
                    <td>Giáo Viên</td>
                @elseif($item['yctd']==2)
                    <td>Giáo Sư</td>
                @elseif($item['yctd']==3)
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