@extends('admin.layout.index')

@section('content')

    <h1 class="page-header">Gửi mail đến
        <small>{{$giaovien->TenGV}}</small>
    </h1>

	<form action="admin/mail/blanks" method="POST">
		<h3><center>Gửi xác nhận thay đổi email</center></h3>
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
		<div class="row">
			<!-- <div class="col-md-2">
				<label>From: </label>
			</div>
			<div class="col-md-10">
				Admin
			</div> -->
		</div>
		<div class="row">
			<div class="col-md-2">
				<!-- <label>To: </label> -->
			</div>
			<div class="col-md-10">
				<!-- {{$giaovien->Email}} ({{$giaovien->HoGV}}{{$giaovien->TenGV}}) -->
				<input class="form-control" type="hidden" name="Email" value="{{$giaovien->Email}}">
				<input class="form-control" type="hidden" name="MaGV" value="{{$giaovien->MaGV}}">
				<input class="form-control" type="hidden" name="HoGV" value="{{$giaovien->HoGV}}">
				<input class="form-control" type="hidden" name="TenGV" value="{{$giaovien->TenGV}}">
				<input class="form-control" type="hidden" name="idGV" value="{{$giaovien->id}}">
			</div>
		</div>
		<div class="row">
			<!-- <div class="col-md-2">
				<label>Tiêu đề : </label>
			</div> -->
			<div class="col-md-10">
				<input type="hidden" class="form-control" type="text" name="subject" value="Xác nhận đổi mật khẩu">
			</div>
		</div>
		<div class="row" style="padding-top: 10px; padding-bottom: 10px">
			<div class="col-md-12">
				<!-- <textarea class="form-control ckeditor" rows="5" name="noidung" id="demo" ></textarea> -->
				<input type="hidden" class="form-control" rows="5" name="noidung" value="Nhấn vào link để tiến hành thay đổi mật khẩu http://qlpth.dev/admin/giaovien/doiMK/{{$giaovien->id}}"></input>
			</div>
		</div>

		<center>
			<button type="submit" class="btn btn-primary">Gửi yêu cầu</button>
			<a href="admin/giaovien/sua/{{$giaovien->id}}" class="btn btn-default">Trở lại</a>
		</center>
	</form>

@endsection

@section('script')
    <script type="text/javascript" language="javascript" src="ckeditor/ckeditor.js" ></script>
@endsection