@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h1 class="page-header">Lớp học phần
        <small>thêm</small>
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
	    <form action="admin/lophocphan/them" method="POST">
	        <input type="hidden" name="_token" value="{{csrf_token()}}" />
	        <div class="form-group">
	            <label>Mã môn học</label>
	            <input class="form-control" name="idMonHoc" placeholder="Nhập mã môn học" />
	        </div>
	        <div class="form-group">
	            <label>Mã lớp</label>
	            <input class="form-control" name="MaLop" placeholder="Nhập mã lớp" />
	        </div>
	        <div class="form-group">
	            <label>Tên lớp</label>
	            <input class="form-control" name="TenLop" placeholder="Nhập tên lớp" />
	        </div>
	        <div class="form-group">
	            <label>Sỉ Số</label>
	            <input class="form-control" name="SiSo" placeholder="Sỉ Số" />
	        </div>
	        
	        <button type="submit" class="btn btn-primary">Thêm</button>
	        <button type="reset" class="btn btn-default">Reset</button>
	    <form>
	</div>
</div>

@endsection