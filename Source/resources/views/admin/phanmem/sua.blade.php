@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h1 class="page-header">Lớp học phần
        <small>{{$lophocphan->TenLop}}</small>
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
	    <form action="admin/lophocphan/sua/{{$lophocphan->id}}" method="POST">
	    	 <input type="hidden" name="_token" value="{{csrf_token()}}" />
	        <div class="form-group">
	            <label>Mã môn học</label>
	            <input type="number" class="form-control" name="idMonHoc" placeholder="Nhập mã môn học" value="{{$lophocphan->idMonHoc}}" />
	        </div>
	        <div class="form-group">
	            <label>Mã lớp</label>
	            <input class="form-control" name="MaLop" placeholder="Nhập mã lớp" value="{{$lophocphan->MaLop}}" />
	        </div>
	        <div class="form-group">
	            <label>Tên lớp</label>
	            <input class="form-control" name="TenLop" placeholder="Nhập số tín chỉ" value="{{$lophocphan->TenLop}}" />
	        </div>
	        <div class="form-group">
	            <label>Sỉ số</label>
	            <input type="number" class="form-control" name="SiSo" placeholder="Nhập số sỉ số" value="{{$lophocphan->SiSo}}" />
	        </div>
	        <button type="submit" class="btn btn-warning">Sửa</button>
	        <button type="reset" class="btn btn-default">Làm mới</button>
	    <form>
	</div>
</div>

@endsection