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
	@foreach($allTuan as $tu1)
  	<label class="radio-inline">
	  	<input type="radio" name="selectTuan" class="selectTuan" value="{{$tu1->id}}"> {{$tu1->TenTuan}}
	</label>				
	@endforeach
	<table class="table table-striped table-bordered table-hover" id="dataTables-example" style="text-align: center;">
		<tr>
			<th>Buổi</th>
			<th>Thứ hai</th>
			<th>Thứ ba</th>
			<th>Thứ tư</th>
			<th>Thứ năm</th>
			<th>Thứ sáu</th>
			<th>Thứ bảy</th>
			<th>Chủ nhật</th>
		</tr>
		<tr>
			<td>Sáng</td>
			<td>
			@foreach($lichSang as $ls)
				@if($ls->idThu==1)
					Môn học: {{$ls->idMonHoc}}<br>Phòng: {{$ls->idPhong}}
				@endif
			@endforeach
			</td>
			<td>
			@foreach($lichSang as $ls)
				@if($ls->idThu==2)
					Môn học: {{$ls->idMonHoc}}<br>Phòng: {{$ls->idPhong}}
				@endif
			@endforeach
			</td>
			<td>
			@foreach($lichSang as $ls)
				@if($ls->idThu==1)
					Môn học: {{$ls->idMonHoc}}<br>Phòng: {{$ls->idPhong}}
				@endif
			@endforeach
			</td>
			<td>
			@foreach($lichSang as $ls)
				@if($ls->idThu==2)
					Môn học: {{$ls->idMonHoc}}<br>Phòng: {{$ls->idPhong}}
				@endif
			@endforeach
			</td>
			<td>
			@foreach($lichSang as $ls)
				@if($ls->idThu==1)
					Môn học: {{$ls->idMonHoc}}<br>Phòng: {{$ls->idPhong}}
				@endif
			@endforeach
			</td>
			<td>
			@foreach($lichSang as $ls)
				@if($ls->idThu==2)
					Môn học: {{$ls->idMonHoc}}<br>Phòng: {{$ls->idPhong}}
				@endif
			@endforeach
			</td>
			<td>
			@foreach($lichSang as $ls)
				@if($ls->idThu==1)
					Môn học: {{$ls->idMonHoc}}<br>Phòng: {{$ls->idPhong}}
				@endif
			@endforeach
			</td>
		</tr>
		<tr>
			<td>Chiều</td>
			<td>
			@foreach($lichChieu as $ls)
				@if($ls->idThu==1)
					Môn học: {{$ls->idMonHoc}}<br>Phòng: {{$ls->idPhong}}
				@endif
			@endforeach
			</td>
			<td>
			@foreach($lichChieu as $ls)
				@if($ls->idThu==2)
					Môn học: {{$ls->idMonHoc}}<br>Phòng: {{$ls->idPhong}}
				@endif
			@endforeach
			</td>
			<td>
			@foreach($lichChieu as $ls)
				@if($ls->idThu==1)
					Môn học: {{$ls->idMonHoc}}<br>Phòng: {{$ls->idPhong}}
				@endif
			@endforeach
			</td>
			<td>
			@foreach($lichChieu as $ls)
				@if($ls->idThu==2)
					Môn học: {{$ls->idMonHoc}}<br>Phòng: {{$ls->idPhong}}
				@endif
			@endforeach
			</td>
			<td>
			@foreach($lichChieu as $ls)
				@if($ls->idThu==1)
					Môn học: {{$ls->idMonHoc}}<br>Phòng: {{$ls->idPhong}}
				@endif
			@endforeach
			</td>
			<td>
			@foreach($lichChieu as $ls)
				@if($ls->idThu==2)
					Môn học: {{$ls->idMonHoc}}<br>Phòng: {{$ls->idPhong}}
				@endif
			@endforeach
			</td>
			<td>
			@foreach($lichChieu as $ls)
				@if($ls->idThu==1)
					Môn học: {{$ls->idMonHoc}}<br>Phòng: {{$ls->idPhong}}
				@endif
			@endforeach
			</td>
		</tr>
	</table>	
</div>
@endsection