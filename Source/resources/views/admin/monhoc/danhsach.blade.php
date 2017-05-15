@extends('admin.layout.index')
@section('title')
Môn học - Danh sách
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12" style="padding-top: 10px">
<table width="100%">
	<tr>
		<td style="text-align: left;">
			<h3>DANH SÁCH MÔN HỌC</h3>
		</td>
		<td>
			<div class="pull-right">
				<a class="btn btn-info" href="admin/monhoc/themexcel"><span class="glyphicon glyphicon-plus"></span>  THÊM TỪ FILE</a>
				<a class="btn btn-success" href="admin/monhoc/them"><span class="glyphicon glyphicon-plus"></span>  THÊM</a>
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
	                	<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#yourModal{{$mh->id}}">
		                	Chi tiết
	                </button>
	                </td>
	                
	                <td class="center">
	                	<a href="admin/monhoc/xoa/{{$mh->id}}" onclick="return confirm('Bạn có muốn xóa môn học và các dữ liệu liên quan tới môn {{$mh->TenMH}} không?');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o  fa-fw"></i> Xóa</a>
	                </td>
	                <td class="center">
	                	<a href="admin/monhoc/sua/{{$mh->id}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil fa-fw"></i> Sửa</a>
	                </td>
	            </tr>
	        @endforeach
	    </tbody>
	</table>
	@foreach($monhoc as $mh)
		<div class="modal fade " id="yourModal{{$mh->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      	<div class="modal-dialog modal-xs" role="document">
	        <div class="modal-content">
	          	<div class="modal-header text-center">
	            	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            	<h3 class="modal-title" id="myModalLabel" style="color: blue">CÁC YÊU CẦU PHẦN MỀM</h3>
	            	<h4>{{$mh->MaMH}} - {{$mh->TenMH}}</h4>
	          	</div>
	          	<div class="modal-body">
	          		<ul class="list-group">
		            @foreach ($ycpm as $pm)
						@if ($pm->idMonHoc == $mh->id)
							@foreach ($pms as $pma)
								@if ($pma->id == $pm->idPhanMem)

			  		<li class="list-group-item">
							{{$pma->TenPM}}
						</li>
								@endif
							@endforeach
						@endif
					@endforeach
					</ul>
		      	</div>
      		</div>
      	</div>
    </div>
	@endforeach
</div>

@endsection