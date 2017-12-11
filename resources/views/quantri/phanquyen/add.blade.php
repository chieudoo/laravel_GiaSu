@extends('quantri.home')
@section('title','Thêm thành viên tới nhóm')
@section('content')
<hr>

<a class="btn btn-primary" data-toggle="modal" href='#modal-id'><i class="fa fa-plus"> Plus</i></a>
<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" role="form">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Thêm thành viên tới nhóm</h4>
                </div>
                <div class="modal-body">
                    
                    
                        <div class="form-group">
                            <label>Tên Group</label>
                            
                            <select name="role_id" class="form-control" required="required">
                                <option value=""> -- ROOT --</option>
                                <?php
                                    foreach($data as $item){
                                        echo "<option value='".$item['id']."'>".$item['name']."</option>";
                                    }
                                ?>
                            </select>
                            
                        </div>

                        <div class="form-group">
                            <label>Tên thành viên</label>
                            
                            <select name="user_id" class="form-control" required="required">
                                <option value=""> -- ROOT --</option>
                                <?php
                                    foreach($user as $item){
                                        echo "<option value='".$item['id']."'>".$item['name']."</option>";
                                    }
                                ?>
                            </select>
                            
                        </div>
                    
                        
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection