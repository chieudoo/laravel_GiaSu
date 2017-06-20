@extends('giaodien.home')
@section('title','Tải Tài Liệu Miễn Phí '.$m.' '.$lo)
@section('content')
<div class="col-md-12">
	<div class="tt_tintuc">
        <a href="#">Tài Liệu</a>
        <span>
			<?php
				echo "Môn ".$m." -- ".$lo;
			?>
        </span>
    </div>
    <div class="clearfix"></div>
    <div class="nd_tintuc">
    	<h1> Tải Tài Liệu Miễn Phí 
    		<?php echo $m." ".$lo; ?>
    	</h1>
    	<div>
    		<?php foreach ($tl as $item): ?>
    			<table class="table table-bordered table-hover">
					<tr style="background-color: #ffffff">
						<td style="width: 70%">{{ $item -> name}}</td>
						<td><a href="{{ $item->link }}" target="_blank">Link</a></td>
					</tr>
	    		</table>
    		<?php endforeach ?>
    	</div>
    </div>
</div>
@endsection