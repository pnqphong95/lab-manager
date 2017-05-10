@extends('admin.layout.index')
@section('title')
Phòng - Chi tiết
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12 text-center">
	<h2 style="color: blue">DANH SÁCH PHÒNG THỰC HÀNH</h2>
</div>
<div class="col-md-12 text-center" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-success" href="admin/phong/them"><span class="glyphicon glyphicon-plus"></span>  THÊM PHÒNG</a>
</div>
<div class="col-md-12">
	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	    <thead>
	        <tr align="center">
	        	<th>STT</th>
	            <th>Tên phòng</th>	            
	            <th>Bộ môn</th>
	            <th>Thông tin</th>
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
	    	<?php $i =0; ?>
	        @foreach($phong as $p)
	        <?php $i++; ?>
	            <tr class="odd gradeX" align="center">
	            	<td>{{$i}}</td>
	                <td>{{$p->TenPhong}}</td>
	                <td>
	                @foreach($bomon as $bm)                    
	                    @if($bm->id == $p->idBoMon)
	                        {{$bm->TenBM}}
	                    @endif	                     
	                @endforeach
                	</td>
	                <td>
	                	<!-- <a href="admin/phong/chitiet/{{$p->id}}" class="btn btn-info btn-xs"><i class="fa fa-list fa-fw"></i> Chi tiết</a> -->
	                	<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#yourModal{{$p->id}}">
		                	Chi tiết
		                </button>
	                </td>
	                <td class="center">
                		<!-- @if($p->idBoMon == Auth::user()->idBoMon)
                			<a href="admin/phong/xoa/{{$p->id}}" onclick="return confirm('Bạn có muốn xóa phòng {{$p->TenPhong}}');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o  fa-fw"></i> Xóa</a>
                		@endif -->
                		<a href="admin/phong/xoa/{{$p->id}}" onclick="return confirm('Bạn có muốn xóa phòng {{$p->TenPhong}}');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o  fa-fw"></i> Xóa</a>
	                </td>
	                <td class="center">
	                	<!-- @if($p->idBoMon == Auth::user()->idBoMon)
                			<a href="admin/phong/sua/{{$p->id}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil fa-fw"></i> Sửa</a>
                		@endif -->
                		<a href="admin/phong/sua/{{$p->id}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil fa-fw"></i> Sửa</a>
	                </td>
	            </tr>
	        @endforeach
	    </tbody>
	</table>
</div>

@foreach ($phong as $p)    
    <div class="modal fade" id="yourModal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      	<div class="modal-dialog" role="document">
	        <div class="modal-content">
	          	<div class="modal-header text-center">
	            	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            	<h3 class="modal-title" id="myModalLabel" style="color: blue">CHI TIẾT PHÒNG</h4>
	            	<h4>{{$p->TenPhong}}</h3>
	          	</div>
	          	<div class="modal-body">
		            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
					    <tr>
					    	<th>Tên phòng</th>
					    	<td>{{$p->TenPhong}}</td>
					    </tr>
					    
					    <tr>
					    	<th>RAM</th>
					    	<td>{{$p->DLRam}}</td>
					    </tr>
					    <tr>
					    	<th>Ổ cứng</th>
					    	<td>{{$p->DLOCung}}</td>
					    </tr>
					    <tr>
					    	<th>CPU</th>
					    	<td>{{$p->CPU}}</td>
					    </tr>
					    <tr>
					    	<th>GPU</th>
					    	<td>{{$p->GPU}}</td>
					    </tr>
					    <tr>
					    	<th>Tên phần mềm</th>
					    	<td>
					    		@foreach($phong_phanmem as $pm)
					    			@if($pm->idPhong == $p->id)
					    				{{$pm->TenPM}},
					    			@endif
					    		@endforeach

					    	</td>
					    </tr>
					</table>
	          	</div>
	          	<div class="modal-footer">
	            	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	          	</div>
	        </div>
      	</div>
    </div>
@endforeach

@endsection