@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h1 class="page-header">Chi tiết
        <small>{{$phong->TenPhong}}</small>
    </h1>

    <div class="col-md-12">
    	<div class="col-md-2"><label>Tên phòng:</label></div>
    	<div class="col-md-10">{{$phong->TenPhong}}</div>
    </div>

	<div class="col-md-12">
		<div class="col-md-2"><label>RAM:</label></div>
	    <div class="col-md-10">{{$phong->DLRam}}</div>
	</div>

    <div class="col-md-12">
    	<div class="col-md-2"><label>Ổ cứng:</label></div>
	    <div class="col-md-10">{{$phong->DLOCung}}</div>
    </div>

	<div class="col-md-12">
		<div class="col-md-2"><label>CPU:</label></div>
	    <div class="col-md-10">{{$phong->CPU}}</div>
	</div>

	<div class="col-md-12">
		<div class="col-md-2"><label>GPU:</label></div>
	    <div class="col-md-10">{{$phong->GPU}}</div>
	</div>

	<a class="btn btn-primary" href="admin/phong/danhsach">Quay lại</a>

</div>

@endsection