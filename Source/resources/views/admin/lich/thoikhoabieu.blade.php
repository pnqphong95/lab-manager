@extends('admin.layout.index')
@section('title')
Task- Danh sách
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12 text-center" style="color: blue"><h2>THỜI KHÓA BIỂU</h2></div>
<div class="col-md-12 text-center" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/lich/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
	<a style="width: 20%" class="btn btn-success" href="admin/lich/dangkyphong"><span class="glyphicon glyphicon-plus"></span>  ĐĂNG KÝ PHÒNG</a>
	<a style="width: 20%" class="btn btn-success" href="admin/lich/chinhsualich"><span class="glyphicon glyphicon-plus"></span>  CHỈNH SỬA LỊCH</a>

</div>
<div class="col-md-12">
	<table class="table table-striped table-bordered table-hover" id="dataTables-example" style="text-align: center;">
		<thead>
			<tr>
				<th>STT</th>
				<th>Thứ</th>
				<th>Mã môn</th>
			</tr>
		</thead>
		<tbody>
			<!-- <?php $i=0; ?>
			@foreach($tkb as $tkb)
				<?php $i++; ?>
				<tr>
					<td>{{$i}}</td>
					<td>{{$tkb->idThu}}</td>
					<td>{{$tkb->idMonHoc}}</td>
				</tr>
			@endforeach -->
			<?php 
				for($i=1; $i<=7; $i++){
			?>
			<tr>
				<td></td>
				<td>{{$tkb->idThu}}</td>
				<td>{{$tkb->idMonHoc}}</td>
			</tr>
			<?php
				}
			 ?>
	 	 </tbody>
	</table>	
</div>
@endsection