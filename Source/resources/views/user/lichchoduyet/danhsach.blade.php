@section('title')
Danh sách các vấn đề
@endsection
@extends('layout.index')


@section('main')
<?php $thisPage = 'vande';?>
<div class="row">
	<div class="col-lg-12">
		<div class="white-well">
			<h3>Danh sách các yêu cầu phòng đăng ký phòng chưa được xếp</h3>
			<hr>

			<table class="table table-bordered" style="text-align: center;">
				<thead>
					<tr>
						<th width="9%">Giáo viên</th>
						
						<th width="13%">Môn học</th>
						<th width="13%">Nhóm</th>
						<th width="13%">Thứ</th>
						<th width="13%">Buổi</th>
						<th width="13%">Tuần</th>
						<th width="13%">Phòng</th>     								
					</tr>
				</thead>
				<tbody>
					@foreach ($allLichCD as $lichCD)
			      	<tr>						        								        	
						<td>{{$lichCD->idGiaoVien}}</td>
			        	<td>{{$lichCD->idMonHoc}}</td>
			        	<td>{{$lichCD->Nhom}}</td>
			        	<td>{{$lichCD->idThu}}</td>
			        	<td>{{$lichCD->idBuoi}}</td>
			        	<td>{{$lichCD->idTuan}}</td> 
			        	<td>
			        		<form action="" type="post">
			        			<input type="hidden" name="idLichCD" value="{{$lichCD->id}}">
			        			<button class="btn btn-info btn-xs btn-xepphong" type="button">Xếp phòng</button>
			        		</form>
			        	</td>
		     	 	</tr>
		     	 	@endforeach
		     	 </tbody>
		    </table>

		</div> <!-- <div class="white-well"> -->
	</div> <!-- <div class="col-lg-12"> -->

</div> <!-- <div class="row"> -->
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready (function (){
		$('.btn-xepphong').click(function () {
			var select = $('<select><option>1</option></select>');
			var btnOK = $('<button>OK</button>');
			var parentEle = $(this).parent();
			$(this).remove();
			parentEle.append(select);
			parentEle.append(btnOK);
		});
	});
</script>
@endsection