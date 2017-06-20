@extends('quantri.home')
@section('title','Chi Tiết Lớp')
@section('content')
    <hr>
    <a class="btn btn-primary c_add" data-toggle="modal" href=''><i class="fa fa-edit"></i> Edit</a>
    <div class="c_modal">
        <div class="col-md-6 col-md-offset-3 c_f">
            <form method="POST" role="form" enctype="multipart/form-data">
                <legend id="f_title">Edit</legend>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>Thanh Toán</label>
                    <select class="form-control" name="trangthai">
                        <option value="0">Đã Thanh Toán</option>
                        <option value="1">Chưa Thanh Toán</option>
                    </select>
                </div>
                @foreach($data as $item)
                <input type="hidden" name="hv_id" value="{{ $item->hv_id  }}">
                <input type="hidden" name="gv_id" value="{{ $item->gv_id }}">
                @endforeach
                <div class="form-group">
                    <label>Chú Thích</label>
                    <textarea name="more" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Trạng Thái</label>
                    <div class="radio">
                        <label class="c_active">
                            <input type="radio" name="status" value="0" checked="checked">Active
                        </label>
                        <label>
                            <input type="radio" name="status" value="1">Close
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
    @foreach($data as $item)
        <table class="table table-hover">
            <tr>
                <td>Tên Học Viên</td>
                <td>{{ $item->tenhv  }}</td>
            </tr>
            <tr>
                <td>Tên Gia Sư</td>
                <td>{{ $item->tengv  }}</td>
            </tr>
            <tr>
                <td>Tên Môn Học</td>
                <td>{{ $item->mon_hoc  }}</td>
            </tr>
            <tr>
                <td>Ngày Bắt Đầu</td>
                <td>{{ $item->ngay_bd  }}</td>
            </tr>
            <tr>
                <td>Tiền Một Buổi</td>
                <td>{{ $item->money  }} VND</td>
            </tr>
            <tr>
                <td>Số Buổi Trên Tuần</td>
                <td>{{ $item->sobuoi  }}/Tuần</td>
            </tr>
            <tr>
                <td>Chú Thích</td>
                <td>{{ $item->more  }}</td>
            </tr>
            <tr>
                <td>Trạng Thái</td>
                @if($item->status==0)
                    <td><label style="color: green;">Active</label></td>
                @elseif($item->status==1)
                    <td><label style="color: red;">Close</label></td>
                @endif
            </tr>
            <tr>
                <td>Thanh Toán 30% Lương Tháng Đầu</td>
                @if($item->trangthai==0)
                    <td><i class="fa fa-check" style="color: green;"> Đã Thanh Toán</i></td>
                @else
                    <td><i class="fa fa-close" style="color: red;"> Chưa Thanh Toán</i></td>
                @endif
            </tr>
        </table>
    @endforeach
    @include('flash.flash')
@endsection