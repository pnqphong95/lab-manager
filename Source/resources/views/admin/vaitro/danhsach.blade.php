@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div class="col-md-12">
    <h1 class="page-header">Vai trò
        <small>Danh sách</small>
    </h1>

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