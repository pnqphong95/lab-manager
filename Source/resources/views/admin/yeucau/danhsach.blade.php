@extends('admin.layout.index')
@section('title')

@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12 text-center" style="color: blue"><h2>DANH SÁCH YÊU CẦU</h2></div>
<div class="col-md-12 text-center" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-success" href="admin/yeucau/them"><span class="glyphicon glyphicon-plus"></span>  THÊM</a>
</div>

<div class="col-md-12">
	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	    <thead>
	        <tr align="center">
	            <th>STT</th>
	            <th>Tên yêu cầu</th>
	            <th>Người yêu cầu</th>
	            <th>Ngày gửi</th>
	            <th>Trạng thái</th>
	            <th>Xem chi tiết</th>
	            <th>Xóa</th>
	        </tr>
	    </thead>
	    <tbody>
	    	@if(session('thongbao'))
	    		<div class="alert alert-success">
	    			{{session('thongbao')}}
	    		</div>
	    	@endif	
	    	<?php 
	    		$i=0;
	    	?>
	        @foreach($allVanDe as $yc)
	        	<?php 
	        		$i++;
	        	?>
	            <tr class="odd gradeX" align="center">
	                <td>{{$i}}</td>
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
	            </tr>
	        @endforeach
	    </tbody>
	</table>
</div>
@endsection
