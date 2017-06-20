@extends('quantri.home')
@section('title','Chi Tiết Giáo Viên')
@section('content')
    <hr>
    @foreach($data as $item)
    <table class="table table-responsive">
        <tr>
            <th>Gia Sư</th>
            <td>{{$item['name']}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$item['email']}}</td>
        </tr>
        <tr>
            <th>Địa Chỉ</th>
            <td>{{$item['diachi']}}</td>
        </tr>
        <tr>
            <th>Số Điện Thoại</th>
            <td>{{$item['sdt']}}</td>
        </tr>
        <tr>
            <th>Học Vấn</th>
            <td>{{$item['hocvan']}}</td>
        </tr>
        <tr>
            <th>Ngày Sinh</th>
            <td>{{$item['ngaysinh']}}</td>
        </tr>
        <tr>
            <th>Khả Năng</th>
            <td>{{$item['khanang']}}</td>
        </tr>
        <tr>
            <th>Giới Tính</th>
            @if($item['sex']==0)
                <td>Nam</td>
            @else
                <td>Nữ</td>
            @endif
        </tr>
        <tr>
            <th>Trình Độ</th>
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
        <tr>
            <th>Kinh Nghiệm</th>
            @if($item['kn']==0)
                <td>Chưa</td>
            @else
                <td>Đã có</td>
            @endif
        </tr>
        <tr>
            <th>Trạng Thái</th>
            @if($item['status']==0)
                <td>Đang Rỗi</td>
            @else
                <td>Đang Bận</td>
            @endif
        </tr>
    </table>
    @endforeach
@endsection