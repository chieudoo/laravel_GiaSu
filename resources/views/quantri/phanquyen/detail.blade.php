@extends('quantri.home')
@section('title','Chi tiết nhóm')
@section('content')
<hr>

<div class="col-md-6">
<?php
    foreach($data as $item){
        echo "<div class='form-group'><label>Tên Nhóm</label><p>".$item['name']."</p></div>";
        echo "<div class='form-group'><label>Role</label><p>".$item['role']."</p></div>";
    }
?>
    <label>Thành viên</label>

<?php
    foreach($user as $item){
        echo "<ul class='list-group'>
            <li class='list-group-item'>".$item->n."</li>
        </ul>";
    }
?>



</div>

@endsection