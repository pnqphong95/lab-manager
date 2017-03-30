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
	            <th>Tên quyền</th>
	            <th>Tên dùng hiển thị</th>
	            <th>Mô tả</th>         
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
	        @foreach($pers as $per)
	            <tr class="odd gradeX" align="center">
	                <td>{{$per->name}}</td>
	                <td>{{$per->display_name}}</td>	                
	                <td>{{$per->description}}</td>
	                <td><a href="admin/giaovien/chitiet/{{$per->id}}">Chi tiết</a></td>
	                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/vaitro/xoa/{{$per->id}}"> Xóa</a></td>
	                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/vaitro/sua/{{$per->id}}">Sửa</a></td>
	            </tr>
	        @endforeach
	    </tbody>
	</table>
</div>

@endsection