@extends('admin.layout.index')
@section('title')
Task- Danh sách
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12 text-center" style="color: blue"><h2>YÊU CẦU CHỜ DUYỆT</h2></div>
<div class="col-md-12 text-center" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/tast/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
	<a style="width: 20%" class="btn btn-success" href="admin/tast/them"><span class="glyphicon glyphicon-plus"></span>  THÊM</a>
</div>
<div class="col-md-12">
	<table class="table table-striped table-bordered table-hover" id="dataTables-example" style="text-align: center;">
		<thead>
			<?php 
				$i=0;
			 ?>
			<tr>
				<th width="5%">STT</th>
				<th width="15%">Giáo viên</th>
				<th>người thực hiện</th>
				<th width="10%">Môn học</th>
				<th width="10%">Nhóm</th>
				<th width="10%">Thứ</th>
				<th width="10%">Buổi</th>
				<th width="10%">Tuần</th>
				<th width="10%">Tác vụ</th>     								
			</tr>
		</thead>
		<tbody>
			@foreach ($allLichCD as $lichCD)
				<?php 
					$i++;
				?>
	      	<tr><
	      		<td>{{$i}}</td>     	
				<td>
					@foreach($allGiaoVien as $gv)
						@if($gv->id == $lichCD->idGiaoVien)
							{{$gv->TenGV}}
						@endif
					@endforeach	
				</td>
				<td></td>
	        	<td>
	        		@foreach($allMonHoc as $mh)
						@if($mh->id == $lichCD->idMonHoc)
							{{$mh->TenMH}}
						@endif
					@endforeach
	        	</td>
	        	<td>{{$lichCD->Nhom}}</td>
	        	<td>{{$lichCD->idThu}}</td>
	        	<td>
	        	@foreach($allBuoi as $b)
						@if($b->id == $lichCD->idBuoi)
							{{$b->TenBuoi}}
						@endif
					@endforeach
	        	</td>
	        	<td>{{$lichCD->idTuan}}</td> 
	        	<td>
	        		<a href="admin/task/chon">Chuyển tiếp</a>
	        	</td>
	 	 	</tr>
	 	 	@endforeach
	 	 </tbody>
	</table>	
</div>
@endsection