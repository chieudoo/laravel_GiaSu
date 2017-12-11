@extends('quantri.home')
@section('title','Phân quyền thành viên')
@section('content')
<hr>

<a class="btn btn-primary" data-toggle="modal" href='#modal-id'><i class="fa fa-plus"> Tạo nhóm</i></a>



<a class="btn btn-info" href="{{ url('add-user-group') }}" role="button">Thêm thành viên tới nhóm</a>

<a class="btn btn-danger" href="{{ url('add-rule-group') }}" role="button">Thêm quyền tới nhóm</a>


<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" role="form">
            {{ csrf_field() }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Create group users</h4>
            </div>
            <div class="modal-body">
                
                
                    <div class="form-group">
                        <label>Group name</label>
                        <input type="text" class="form-control" name="name" placeholder="Input field">
                    </div>

                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<hr>
@include('flash.flash')
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên nhóm</th>
                <th>Quản lý</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $stt=0;
            foreach($data as $item){
                $stt++;
                echo "
                <tr>
                    <td>".$stt."</td>
                    <td>".$item['name']."</td>
                    <td><a href='".url('detail-group/'.$item['id'])."'>Xem</a></td>
                </tr>
                ";
            }
        ?>
            
        </tbody>
    </table>
</div>


@endsection