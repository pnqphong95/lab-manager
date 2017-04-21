@extends('admin.layout.index')

@section('content')

    <h1 class="page-header">Gửi mail đến
        <small>{{$giaovien->TenGV}}</small>
    </h1>

	<form action="admin/mail/blanks" method="POST">
		<select name="idGV">
			@foreach($giaovien as $gv)
				<option value="{{$gv->id}}">{{$gv->MaGV}}-{{$gv->HoGV}} {{$gv->TebGV}}</option>
			@endforeach
		</select>
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
		<div class="row">
			<div class="col-md-2">
				<label>From: </label>
			</div>
			<div class="col-md-10">
				Admin
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<label>To: </label>
			</div>
			<div class="col-md-10">
				{{$giaovien->Email}} ({{$giaovien->HoGV}}{{$giaovien->TenGV}})
				<input class="form-control" type="hidden" name="Email" value="{{$giaovien->Email}}">
				<input class="form-control" type="hidden" name="MaGV" value="{{$giaovien->MaGV}}">
				<input class="form-control" type="hidden" name="HoGV" value="{{$giaovien->HoGV}}">
				<input class="form-control" type="hidden" name="TenGV" value="{{$giaovien->TenGV}}">
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<label>Tiêu đề : </label>
			</div>
			<div class="col-md-10">
				<input class="form-control" type="text" name="subject">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<!-- <textarea class="form-control ckeditor" rows="5" name="noidung" id="demo" ></textarea> -->
				<textarea class="form-control" rows="5" name="noidung"></textarea>
			</div>
		</div>

		<center><button type="submit" class="btn btn-primary">Gửi</button></center>
	</form>

@endsection

@section('script')
    <script type="text/javascript" language="javascript" src="ckeditor/ckeditor.js" ></script>
@endsection