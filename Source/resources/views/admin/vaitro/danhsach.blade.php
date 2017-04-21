@extends('admin.layout.index')
@section('title')
Vai trò - Danh sách
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12 text-center" style="color: blue"><h2>DANH SÁCH VAI TRÒ</h2></div>
<div class="col-md-12 text-center" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/vaitro/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
	<a style="width: 20%" class="btn btn-success" href="admin/vaitro/them"><span class="glyphicon glyphicon-plus"></span>  THÊM</a>
</div>
<div class="col-md-12" style="padding-top: 10px">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	    <thead>
	        <tr align="center">
	        	<th>STT</th>
	            <th>Tên vai trò</th>
	            <th>Tên dùng hiển thị</th>
	            <th>Mô tả</th>  
	            <th>Chi tiết</th>       
	            <th>Xóa</th>	
	            <th>Sửa</th>
	        </tr>
	    </thead>
	    <tbody>
	    	@if(session('thongbao'))
	    		<div class="alert alert-success">
	    			{{session('thongbao')}}
	    		</div>
	    	@endif	
	    	<?php $i=0; ?>
	        @foreach($roles as $role)
	        	<?php $i++; ?>
	            <tr class="odd gradeX" align="center">
	            	<td>{{$i}}</td>
	                <td>{{$role->name}}</td>
	                <td>{{$role->display_name}}</td>	                
	                <td>{{$role->description}}</td>
	                <td><a href="admin/giaovien/chitiet/{{$role->id}}">Chi tiết</a></td>
	                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/vaitro/xoa/{{$role->id}}"> Xóa</a></td>
	                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/vaitro/sua/{{$role->id}}">Sửa</a></td>
	            </tr>
	        @endforeach
	    </tbody>
	</table>
</div>

@endsection