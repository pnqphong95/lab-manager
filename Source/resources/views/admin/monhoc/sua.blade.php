@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h1 class="page-header">Môn học
        <small>{{$monhoc->TenMH}}</small>
    </h1>

    <div class="col-lg-7" style="padding-bottom:120px">
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
	    <form action="admin/monhoc/sua/{{$monhoc->id}}" method="POST">
	    	<input type="hidden" name="_token" value="{{csrf_token()}}" />
	        <div class="form-group">
	            <label>Mã môn học</label>
	            <input class="form-control" name="MaMH" placeholder="Nhập mã môn học" value="{{$monhoc->MaMH}}" />
	        </div>
	        <div class="form-group">
	            <label>Tên môn học</label>
	            <input class="form-control" name="TenMH" placeholder="Nhập tên môn học" value="{{$monhoc->TenMH}}" />
	        </div>
	        <div class="form-group">
	            <label>Số tín chỉ</label>
	            <input class="form-control" name="SoTinChi" placeholder="Nhập số tín chỉ" value="{{$monhoc->SoTinChi}}" />
	        </div>
	        <button type="submit" class="btn btn-warning">Sửa</button>
	        <button type="reset" class="btn btn-default">Làm mới</button>
	    <form>
	</div>
</div>

@endsection