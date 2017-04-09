@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h1 class="page-header">Yêu cầu phần mềm
   	</h1>
   	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	    <thead>
	        <tr align="center">
	            <th>STT</th>
	            <th>Tên phần mềm</th>
	            <th>Phiên bản</th>
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
	    	<?php 
	    		$i=0;
	    	?>
	        @foreach($phanmem as $pm)
	        	<?php 
	        		$i++;
	        	?>
	            <tr class="odd gradeX" align="center">
	                <td>{{$i}}</td>
	                <td>{{$pm->TenPM}}</td>
	                <td>{{$pm->PhienBan}}</td>
	                <td class="center">
	                	<i class="fa fa-trash-o  fa-fw"></i>
	                	<a href="admin/phanmem/xoa/{{$pm->id}}" onclick="return confirm('Bạn có muốn xóa phần mềm {{$pm->TenMH}} không?');"> Xóa</a>
	                </td>
	                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/phanmem/sua/{{$pm->id}}">Sửa</a></td>
	            </tr>
	        @endforeach
	    </tbody>
	</table>


</div>

@endsection