@extends('admin.layout.index')
@section('title')
Môn học - Phần mềm
@endsection
@section('content')
<!-- Page Content -->

<div class="col-md-12" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/monhoc/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
	<a style="width: 20%" class="btn btn-success" href="admin/monhoc/them"><span class="glyphicon glyphicon-plus"></span>  THÊM</a>
</div>
<div class="col-md-12">
    <div class="white-well">			
		<ul class="nav nav-tabs">
		    <li class="active"><a href="admin/monhoc/monhoc_phanmem#yeucauphanmem"><h4>Yêu cầu phần mềm</h4></a></li>
		    <li><a href="admin/monhoc/themphanmem/{{$monhoc->id}}"><h4>Thêm phần mềm</h4></a></li>
		</ul>

		<div class="tab-content">
			<div id="yeucauphanmem" class="tab-pane fade in active">
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				    <thead>
				        <tr align="center">
				            <th>STT</th>
				            <th>Tên phần mềm</th>
				            <th>Phiên bản</th>
				            <th>Delete</th>
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
				        @foreach($monhoc_phanmem as $mhpm)
				        	<?php 
				        		$i++;
				        	?>
				            <tr class="odd gradeX" align="center">
				                <td>{{$i}}</td>
				                <td>
				                	@foreach($phanmem as $pm)
				                		@if($pm->id == $mhpm->idPhanMem)
				                			{{$pm->TenPM}}
				                		@endif
				                	@endforeach
				                </td>
				                <td>
				                	@foreach($phanmem as $pm)
				                		@if($pm->id == $mhpm->idPhanMem)
				                			{{$pm->PhienBan}}
				                		@endif
				                	@endforeach
				                </td>
				                <td><i class="fa fa-trash-o  fa-fw"></i><a href="admin/monhoc/monhoc_phanmem/xoa/{{$mhpm->id}}" onclick="return confirm('Bạn có muốn xóa phền mềm {{$mhpm->idPhanMem}}');"> Xóa</a></td>
				            </tr>
				        @endforeach
				    </tbody>
				</table>
			</div> 
		</div> <!-- div.tab-content -->
	</div>
</div>

@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
	    $(".nav-tabs a").click(function(){
	        $(this).tab('show');
	    });
	});
</script>
@endsection