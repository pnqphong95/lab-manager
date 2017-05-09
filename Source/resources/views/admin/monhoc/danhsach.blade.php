@extends('admin.layout.index')
@section('title')
Môn học - Danh sách
@endsection
@section('content')
<!-- Page Content -->

<div class="col-md-12 text-center" style="color: blue"><h2>DANH SÁCH MÔN HỌC</h2></div>
<div class="col-md-12 text-center" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-success" href="admin/monhoc/them"><span class="glyphicon glyphicon-plus"></span>  THÊM</a>
</div>
<div class="col-md-12">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	    <thead>
	        <tr align="center">
	        	<th>STT</th>
	            <th>Mã môn học</th>
	            <th>Tên môn học</th>
	            <th>Số tín chỉ</th>
	            <th>Yêu cầu</th>
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
	    	<?php $i=0; ?>
	        @foreach($monhoc as $mh)
	        	<?php $i++; ?>
	            <tr class="odd gradeX" align="center">
	            	<td>{{$i}}</td>
	                <td>{{$mh->MaMH}}</td>
	                <td>{{$mh->TenMH}}</td>
	                <td>{{$mh->SoTinChi}}</td>
	                <td>
	                	<a href="admin/monhoc/monhoc_phanmem/{{$mh->id}}" class="btn btn-primary">Chi tiết</a>
	                </td>
	                <td class="center">
	                	<a href="admin/monhoc/xoa/{{$mh->id}}" onclick="return confirm('Bạn có muốn xóa môn học và các dữ liệu liên quan tới môn {{$mh->TenMH}} không?');" class="btn btn-danger"><i class="fa fa-trash-o  fa-fw"></i> Xóa</a>
	                </td>
	                <td class="center"><a href="admin/monhoc/sua/{{$mh->id}}" class="btn btn-warning"><i class="fa fa-pencil fa-fw"></i> Sửa</a></td>
	            </tr>
	        @endforeach
	    </tbody>
	</table>
</div>

@endsection