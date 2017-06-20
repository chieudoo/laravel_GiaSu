@if (Session::has('flash_message'))
	<div class="{!! Session::get('flash_level') !!} alert alert-success notice">
		@if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->level==0)
		<audio autoplay>
            <source src="{{ url('HinhAnh/Quantri/mix.mp3') }}">
        </audio>
		@endif
		{!! Session::get('flash_message') !!}
	</div>
@endif