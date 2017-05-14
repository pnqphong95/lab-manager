@extends('admin.layout.index')
@section('title')
Phần mềm - Thêm
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12" style="padding-top: 10px">
<table width="100%">
	<tr>
		<td style="text-align: left;">
			<h3 class="page-header">DANH SÁCH PHẦN MỀM</h3>
		</td>
		<td>
			<div class="pull-right">
				<a class="btn btn-success" href="admin/phanmem/them"><span class="glyphicon glyphicon-plus"></span>  THÊM</a>
			</div>
		</td>
	</tr>
</table>
</div>
<hr>
<br>
<div class="col-md-12">
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
	                	<a href="admin/phanmem/xoa/{{$pm->id}}" onclick="return confirm('Bạn có muốn xóa phần mềm {{$pm->TenPM}} không?');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o  fa-fw"></i> Xóa</a>
	                </td>
	                <td class="center"><a href="admin/phanmem/sua/{{$pm->id}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil fa-fw"></i> Sửa</a></td>
	            </tr>
	        @endforeach
	    </tbody>
	</table>


</div>

@endsection