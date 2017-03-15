@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h1 class="page-header">Yêu cầu phần mềm
		<small>Môn học:	{{$phong->TenPhong}}</small>
   	</h1>
   	<a href="admin/monhoc/themphanmem" class="btn btn-primary">Thêm</a>

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	    <thead>
	        <tr align="center">
	            <th>STT</th>
	            <th>Tên phần mềm</th>
	            <th>Phiên bản</th>
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
	    	<?php 
	    		$i=0;
	    	?>
	        @foreach($monhoc_phanmem as $pm)
	        	<?php 
	        		$i++;
	        	?>
	            <tr class="odd gradeX" align="center">
		                <td>{{$i}}</td>
		                <td>{{$pm->TenPM}}</td>
		                <td>{{$pm->PhienBan}}</td>
		                <td><a href="admin/monhoc/monhoc_phanmem/{{$pm->id}}">Chi tiết</a></td>
		                <td></td>
		                <td></td>
		            </tr>
	        @endforeach
	    </tbody>
	</table>
</div>

@endsection