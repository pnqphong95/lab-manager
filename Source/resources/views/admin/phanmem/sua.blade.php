@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h1 class="page-header">Phần mềm
        <small>Sửa {{$phanmem->TenPM}}</small>
    </h1>
	
	<div class="col-md-9" style="padding-bottom:120px">
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
	    <form action="admin/phanmem/sua/{{$phanmem->id}}" method="POST">
	        <input type="hidden" name="_token" value="{{csrf_token()}}" />
	        <div class="form-group">
	            <label>Tên phần mềm</label>
	            <input class="form-control" name="TenPM" placeholder="Nhập tên phần mềm" value="{{$phanmem->TenPM}}" />
	        </div>
	        <div class="form-group">
	            <label>Phiên bản</label>
	            <input class="form-control" name="PhienBan" placeholder="Nhập phiên bản" value="{{$phanmem->PhienBan}}" />
	        </div>
	        
	        <button type="submit" class="btn btn-warning">Sửa</button>
	        <button type="reset" class="btn btn-default">Reset</button>
	    <form>
	</div>
</div>

@endsection