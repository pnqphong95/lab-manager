@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h1 class="page-header">Chi tiêt
        <small>{{$phong->TenPhong}}</small>
    </h1>

    <div class="col-md-12">
    	<div class="col-md-2"><label>Tên phòng:</label></div>
    	<div class="col-md-10">{{$phong->TenPhong}}</div>
    </div>

	<div class="col-md-12">
		<div class="col-md-2"><label>RAM:</label></div>
	    <div class="col-md-10">{{$cauhinh->DLRam}}</div>
	</div>

    <div class="col-md-12">
    	<div class="col-md-2"><label>Ổ cứng:</label></div>
	    <div class="col-md-10">{{$cauhinh->DLOCung}}</div>
    </div>

	<div class="col-md-12">
		<div class="col-md-2"><label>CPU:</label></div>
	    <div class="col-md-10">{{$cauhinh->CPU}}</div>
	</div>

	<div class="col-md-12">
		<div class="col-md-2"><label>GPU:</label></div>
	    <div class="col-md-10">{{$cauhinh->GPU}}</div>
	</div>

	<a href="admin/phong/suacauhinh/{{$phong->idCauHinh}}">Sửa</a>
    
</div>

@endsection