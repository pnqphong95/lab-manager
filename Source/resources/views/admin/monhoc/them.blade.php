@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h1 class="page-header">Môn học
        <small>thêm</small>
    </h1>
</div>
	<div class="col-md-12">
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
	    <form action="admin/monhoc/them" method="POST">
	        <input type="hidden" name="_token" value="{{csrf_token()}}" />
	        <div class="form-group">
	            <label>Mã môn học</label>
	            <input class="form-control" name="MaMH" placeholder="Nhập mã môn học" />
	        </div>
	        <div class="form-group">
	            <label>Tên môn học</label>
	            <input class="form-control" name="TenMH" placeholder="Nhập tên môn học" />
	        </div>
	        <div class="form-group">
	            <label>Số tín chỉ</label>
	            <input type="number" class="form-control" name="SoTinChi" placeholder="Số tín chỉ" />
	        </div>
	        
	        <button type="submit" class="btn btn-primary">Thêm</button>
	        <button type="reset" class="btn btn-default">Reset</button>
	    <form>
	</div>

@endsection