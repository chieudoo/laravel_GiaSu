@extends('giaodien.home')
@section('title','Góc Thỏa Luận')
@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h1 class="tit"><a href="{{ url('goc-thao-luan') }}"> Góc Thảo Luận</a></h1>
    </div>
    <div class="col-md-12" style="margin-bottom: 15px">
        <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Đặt Câu Hỏi</a>
        <div class="modal fade" id="modal-id">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #2ab27b">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" role="form">
                            <legend>Vui Lòng Điền Đầy Đủ Thông Tin</legend>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label>Họ Tên</label><sup class="required"> **</sup>
                                <input type="text" class="form-control" name="name" placeholder="Input field" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label><sup class="required"> **</sup>
                                <input type="email" class="form-control" name="email" placeholder="Input field" required>
                            </div>
                            <div class="form-group">
                                <label>Câu Hỏi</label><sup class="required"> **</sup>
                                <textarea name="noidung" class="form-control" rows="5" required></textarea>
                            </div>
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6LfCeyEUAAAAAFvDNrPyh2yxfXO15XhCHI8SS_MZ"></div>
                            </div>


                            <button type="submit" class="btn btn-primary sub-ch">Submit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <label class="note"></label>
                        </form>
                    </div>
                    <div class="modal-footer" style="background-color: #0000cc "></div>
                </div>
            </div>
        </div>

    </div>
    <div class="clearfix"></div>
    <div class="col-md-12 cauhoi">
        @foreach($ch as $item)
            @if($item['status']==0)
            <div class="ques">
                <h4><i class="fa fa-user" style="color: #2a88bd;"></i> {{ $item['name'] }}</h4>
                <p><i class="fa fa-envelope" style="color: #ff2222;"></i> <sup>{{ $item['email'] }}</sup></p>
                <h5><i class="fa fa-question-circle" style="color: #0000cc;"></i> Question</h5>

                @if(strlen($item['noidung']) > 200)
                    <h3>
                        {{ substr($item['noidung'],0,strpos($item['noidung']," ",200)) }}
                        <a href="" data-id="{{ $item['id'] }}" class="cl_more">  ... </a>
                    </h3>
                @else
                    <h3>{{ substr($item['noidung'],0,200) }}</h3>
                @endif

                <a href="" data-id="{{ $item['id'] }}" class="cl_comment"><i class="fa fa-comment"></i> Bình Luận <i class="fa fa-angle-down"></i>
                <div class="comment" style="display: none">
                    <div class="fb-comments" data-href="http://giasu.example.com:88/goc-thao-luan/{{ $item['id'] }}" data-width="100%" data-numposts="5"></div>
                </div>
                </a>
            </div>
            @endif
        @endforeach
    </div>
@endsection