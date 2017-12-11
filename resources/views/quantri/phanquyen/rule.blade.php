@extends('quantri.home')
@section('title','Thêm quyền tới nhóm')
@section('content')
<hr>
<div class="col-md-6 col-md-push-3">
    
    <form action="" method="POST" role="form">
    {{ csrf_field() }}
    
        <div class="form-group">
            <label>Tên nhóm</label>
            
            <select name="role_id" class="form-control" required="required">
                <option value="">-- ROOT --</option>
                <?php
                    foreach($data as $item){
                        echo "<option value='".$item['id']."'>".$item['name']."</option>";
                    }
                ?>
            </select>
            
        </div>

        <div class="form-group">
            <label>Nhóm chức năng</label>
            
            <select name="chucnang_id" class="form-control" required="required">
                <option value="">-- ROOT --</option>
                <option value="1">Quản lý tin tức</option>
                <option value="2">Quản lý lớp học</option>
                <option value="3">Quản lý môn học</option>
            </select>
            
        </div>
    
        <div class="form-group">
            <label>Cấp quyền</label>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Thêm</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="them" value="1"></td>
                        <td><input type="checkbox" name="sua" value="1"></td>
                        <td><input type="checkbox" name="xoa" value="1"></td>
                    </tr>
                
                </thead>
            </table>
        </div>
    
        <button type="submit" class="btn btn-primary" id="submit_rule">Submit</button>
        
    </form>
    
</div>
@endsection