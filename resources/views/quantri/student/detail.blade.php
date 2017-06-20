@extends('quantri.home')
@section('title','Detail Học Viên')
@section('content')
    <hr>
    @foreach($data as $item)
    @if($item['status']==2)
    <a class="btn btn-primary c_add" data-toggle="modal" href=''><i class="fa fa-edit"></i> Edit</a>
    @endif
    @endforeach
    @foreach($pc as $item)
    <div class="c_modal">
        <div class="col-md-6 col-md-offset-3 c_f">
            <form method="POST" role="form" enctype="multipart/form-data">
                <legend id="f_title">Thay Đổi Trạng Thái Học Viên</legend>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>Trạng Thái</label>
                    <input type="text" readonly name="status" value="Đợi Lớp" class="form-control">
                </div>
                <input type="hidden" name="hv_id" value="{{ $item['id'] }}">
                <hr>


                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-default c_close">Close</button>
            </form>
        </div>
    </div>
    @endforeach

    @foreach($data as $item)
    <h4 style="color: red"><i class="fa fa-table"></i> Bảng Chi Tiết Học Viên</h4>
        <table class="table table-hover">
            <tr>
                <td>Học Viên </td>
                <td>{{ $item['name']  }}</td>
            </tr>
            <tr>
                <td>Email </td>
                <td>{{ $item['email']  }}</td>
            </tr>
            <tr>
                <td>Địa Chỉ </td>
                <td>{{ $item['diachi']  }}</td>
            </tr>
            <tr>
                <td>Lớp </td>
                <td>{{$item['lophoc']['name']}}</td>
            </tr>
            <tr>
                <td>Số Điện Thoại </td>
                <td>{{ $item['sdt']  }}</td>
            </tr>
            <tr>
                <td>Giới Tính </td>
                @if($item['sex']==0)
                    <td> Nam</td>
                @else
                    <td> Nữ</td>
                @endif
            </tr>
            <tr>
                <td>Ngày Sinh</td>
                <td>{{ $item['ngaysinh'] }}</td>
            </tr>
            <tr>
                <td>Yêu Cầu Giới Tính Gia Sư </td>
                @if($item['ycgt']==0)
                    <td> Nam</td>
                @else
                    <td> Nữ</td>
                @endif
            </tr>
            <tr>
                <td>Yêu Cầu Trình Độ Gia Sư </td>
                @if($item['yctd']==0)
                    <td>Sinh Viên</td>
                @elseif($item['yctd']==1)
                    <td> Giáo Viên</td>
                @elseif($item['yctd']==2)
                    <td> Giáo Sư</td>
                @elseif($item['yctd']==3)
                    <td> Tiến Sỹ</td>
                @else
                    <td> Thạc Sỹ</td>
                @endif
            </tr>
            <tr>
                <td>Môn Muốn Gia Sư </td>
                <td>
                    <?php
                    $arr=str_split($item['mon_id'],1);
                    for ($i=0;$i<count($arr);$i++){
                        monhoc($arr[$i]);
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Trạng Thái </td>
                @if($item['status']==1)
                    <td style="color: green"> Đợi Lớp</td>
                @elseif($item['status']==0)
                    <td style="color: blue"> Đang Học</td>
                @else
                    <td style="color: darkred"> Đã Học Xong</td>
                @endif
            </tr>


        </table>
    @endforeach
@endsection