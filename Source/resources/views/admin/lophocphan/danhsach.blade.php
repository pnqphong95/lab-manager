@extends('admin.layout.index')
@section('title')
Lớp học phần
@endsection
@section('content')
<!-- Page Content -->
<div class="row">
<div class="col-md-12" style="padding-top: 10px">
	<table width="100%">
		<tr>
			<td style="text-align: left;">
				<h3>DANH SÁCH LỚP HỌC PHẦN</h3>
			</td>
			<td>
				<div class="pull-right">
					<a class="btn btn-success pull-right" href="admin/lophocphan/themexcel">
						<span class="glyphicon glyphicon-plus"></span>  THÊM TỪ EXCEL
					</a>
					<a class="btn btn-info pull-right" href="admin/lophocphan/them" style="margin-right: 10px;">
						<span class="glyphicon glyphicon-plus"></span>  THÊM
					</a>
				</div>
			</td>
		</tr>
	</table>
</div>
</div>
<hr>
@if(session('thongbao'))
	<div class="alert alert-success">
		{{session('thongbao')}}
	</div>
@endif	
<div class="col-md-12">
   	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	    <thead>
	        <tr align="center">
	            <th>STT</th>
	            <th>Mã môn học</th>
	            <th>Giảng viên dạy</th>
	            <th>Nhóm</th>
	            <th>Xóa</th>
	            <th>Sửa</th>
	        </tr>
	    </thead>
	    <tbody>
	    	
	    	<?php 
	    		$i=0;
	    	?>
	        @foreach($lophocphan as $lhp)
	        	<?php 
	        		$i++;
	        	?>
	            <tr class="odd gradeX" align="center">
	                <td>{{$i}}</td>
	                <td>{{$lhp->MaHP}}</td>
	                <td>{{$lhp->MaCB}}</td>
	                <td>{{$lhp->Nhom}}</td>
	                <td class="center">
	                	<a href="admin/phanmem/xoa/{{$lhp->id}}" onclick="return confirm('Bạn có muốn xóa phần mềm {{$lhp->MaMH}} không?');" class="btn btn-danger btn-xs">
	                		<i class="fa fa-trash-o  fa-fw"></i> Xóa
	                	</a>
	                </td>
	                <td class="center">
	                	<a href="admin/phanmem/sua/{{$lhp->id}}" class="btn btn-warning btn-xs">
	                		<i class="fa fa-pencil fa-fw"></i> Sửa
                		</a>
            		</td>
	            </tr>
	        @endforeach
	    </tbody>
	</table>
</div>

@endsection

@section ('script')
<script type="text/javascript">
	$(document).ready (function (){
		var a = $('#dataTables-example_paginate').parent();
		a.removeClass('col-sm-6').addClass('col-md-9');
		$('#dataTables-example_info').addClass('hidden');
	});
</script>
@endsection