@extends('admin.layout.index')
@section('title')
Giảng viên - Danh sách
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12" style="padding-top: 10px">
<table width="100%">
	<tr>
		<td style="text-align: left;">
			<h3 class="page-header">DANH SÁCH NGƯỜI DÙNG</h3>
		</td>
		<td>
			<div class="pull-right">
				<a class="btn btn-info" href="admin/giaovien/themexcel"><span class="glyphicon glyphicon-plus"></span>  THÊM TỪ FILE</a>
				<a class="btn btn-success" href="admin/giaovien/them"><span class="glyphicon glyphicon-plus"></span>  THÊM</a>
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
	        <tr class="text-center">
	        	<th>STT</th>
	            <th>Mã người dùng</th>
	            <th>Họ tên</th>
	            <th>Bộ môn</th>
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
	        @foreach($giaovien as $gv)
	        	<?php $i++; ?>
	            <tr class="odd gradeX" align="center">
	            	<td>{{$i}}</td>
	                <td>{{$gv->MaGV}}</td>
	                <td>{{$gv->HoGV}} {{$gv->TenGV}}</td>
	                <td>
	                	{{$gv->bomon->TenBM}}
	                </td>
	                <td><!-- <a href="admin/giaovien/chitiet/{{$gv->id}}">Chi tiết</a> -->
		                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#yourModal{{$gv->id}}">
		                	Chi tiết
		                </button>
	                </td>
	                <td class="center">
                		@role('admin')
                			<a class="btn btn-danger btn-xs" href="admin/giaovien/xoa/{{$gv->id}}" onclick="return confirm('Bạn có muốn xóa Giảng viên {{$gv->TenGV}} không?');">Xóa</a>
                		@endrole
	                </td>
	                <td class="center">

	                    @role('admin')                    
		                	<a class="btn btn-warning btn-xs" href="admin/giaovien/sua/{{$gv->id}}"><i class="fa fa-pencil fa-fw"></i> Sửa</a>
	                    @endrole
	                </td>
	            </tr>


	        @endforeach
	    </tbody>
	</table>
</div>

@foreach ($giaovien as $gv)    
    <div class="modal fade" id="yourModal{{$gv->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      	<div class="modal-dialog" role="document">
	        <div class="modal-content">
	          	<div class="modal-header text-center">
	            	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            	<h3 class="modal-title" id="myModalLabel" style="color: blue">CHI TIẾT GIẢNG VIÊN</h4>
	            	<h4>{{$gv->MaGV}} - {{$gv->HoGV}} {{$gv->TenGV}}</h3>
	          	</div>
	          	<div class="modal-body">
		            <table class="table table-bordered table-striped" style="border: none;width: 100%;">
			    			<tr>
		    					<th>Mã giảng viên</th>
		    					<td id="MaGV">{{$gv->MaGV}}</td>
			    			</tr>
			    			<tr>
			    				<th>Họ và tên</th>
			    				<td>
			    					{{$gv->HoGV}}
			    					{{$gv->TenGV}}
			    				</td>
			    			</tr>
			    			<tr>
		    					<th>Ngày sinh</th>
		    					<td>{{$gv->NgaySinh}}</td>
			    			</tr>
			    			<tr>
		    					<th>Giới tính</th>
		    					<td>{{$gv->GioiTinh}}</td>
			    			</tr>
			    			<tr>
		    					<th>Số điện thoại</th>
		    					<td>{{$gv->SDT}}</td>
			    			</tr>
			    			<tr>
		    					<th>Bộ môn</th>
		    					<td>
		    						@foreach ($bomon as $bm)
		    							@if ($bm->id == $gv->idBoMon)
		    							{{$bm->TenBM}}
		    							@endif
		    						@endforeach
		    					</td>
			    			</tr>
		    		</table>
					
		      	</div>
      		</div>
      	</div>
    </div>
@endforeach
@endsection