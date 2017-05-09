@extends('admin.layout.index')
@section('title')
Vấn đề - Thêm
@endsection
@section('content')
<!-- Page Content -->

<div class="col-md-12" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/vande/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
</div>
<div class="col-md-12" style="padding-top: 10px">
	<div class="panel panel-primary">
		<div class="panel-heading text-center">
			THÊM VẤN ĐỀ
		</div>
		<div class="panel-body">
			<h3>Tạo vấn đề</h3>
			<hr>
			@if(count($errors)>0)
		        <div class="alert alert-danger">
		            @foreach($errors->all() as $err)
		                {{$err}}<br>
		            @endforeach
		        </div>
		    @endif
			
			@if(session('thongbao'))
		        <div class="alert alert-success">
		            {{session('thongbao')}}
		        </div>
		    @endif
			<form action="admin/vande/them" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<!-- <input class="form-control" type="hidden" name="id" />  -->
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label>Phòng</label>
							<select class="form-control" name="idPhong">
								@foreach($allPhong as $p)
								<option value="{{$p->id}}">{{$p->TenPhong}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="form-group">
							<label>Người nhận vấn đề</label>
							<select class="form-control" name="nguoiXuLy">
								@foreach($allGiaoVien as $gv)
								<option value="{{$gv->id}}">{{$gv->MaGV}} - {{$gv->HoGV}} {{$gv->TenGV}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label>Tóm tắt vấn đề</label>
							<input class="form-control" type="text" name="tomTatVD" />
						</div>
					</div>			
					<div class="col-lg-12">
						<div class="form-group">
							<label>Chi tiết vấn đề</label>
							<textarea class="form-control" rows="3" name="chiTietVD"></textarea>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary" onclick="return confirm('Vấn đề này sẽ được thông báo đến người được yêu cầu qua email. Bạn có muốn tiếp tục?');">Gửi vấn đề</button>
			</form>
		</div>
	</div>
</div>
@endsection

@section('script')

@endsection