@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h1 class="page-header">Phòng thực hành
        <small>Danh sách</small>
    </h1>

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	    <thead>
	        <tr align="center">
	            <th>Tên phòng</th>	            
	            <th>Bộ môn</th>
	            <th>Cấu hình</th>
	            <th>Delete</th>
	            <th>Edit</th>
	        </tr>
	    </thead>
	    <tbody>
	    	@if(session('thongbao'))
	    		<div class="alert alert-success">
	    			{{session('thongbao')}}
	    		</div>
	    	@endif	
	        @foreach($phong as $p)
	            <tr class="odd gradeX" align="center">
	                <td>{{$p->TenPhong}}</td>	                
	                <td>{{$p->TenBM}}</td>
	                <td><a href="admin/phong/chitiet/{{$p->id}}">Chi tiết</a></td>
	                <td class="center"><i class="fa fa-trash-o  fa-fw"></i> <a href="admin/phong/xoa/{{$p->id}}"> Xóa</a></td>
	                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/phong/sua/{{$p->id}}">Sửa</a></td>
	            </tr>
	        @endforeach
	    </tbody>
	</table>
</div>

@endsection