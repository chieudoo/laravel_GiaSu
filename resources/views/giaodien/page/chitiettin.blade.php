@extends('giaodien.home')
@section('title',$td)
@section('content')
<div class="col-md-12">
    <div class="tt_tintuc">
        <a href="">Tin Tức</a>
        @foreach($tt as $item)
        <span>{{ $item['name'] }}</span>
            <p>{{ $item['created_at'] }} GMT +7</p>
    </div>
    <div class="clearfix"></div>
    <div class="nd_tintuc">
        <h1>{{ $item['name'] }}</h1>
        <h3>{{ $item['intro'] }}</h3>
        @endforeach
        <ul>
            @foreach($ran as $item)
                @if($item['status']==1)
                <li>
                    <a href="{{ url('chi-tiet-tin/'.$item['id'].'/'.$item['slug'].'.html') }}">{{ $item['name'] }}</a>
                </li>
                @endif
            @endforeach
        </ul>
        @foreach($tt as $item)
        <div style="display: block;">{!! $item['content'] !!}</div>
        @endforeach
    </div>
    <div class="clearfix"></div>
    <div class="nd_more">
        <div class="fb-comments" data-href="{{ url('chi-tiet-tin/'.$item['id'].'/'.$item['slug'].'.html') }}" data-width="100%" data-numposts="5"></div>
    </div>
</div>
@endsection