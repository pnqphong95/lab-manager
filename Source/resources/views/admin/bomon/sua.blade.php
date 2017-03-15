@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h1 class="page-header">Bộ môn
        <small>{{$bomon->TenBM}}</small>
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
	    <form action="admin/bomon/sua/{{$bomon->id}}" method="POST">
	    	 <input type="hidden" name="_token" value="{{csrf_token()}}" />
	        <div class="form-group">
	            <label>Tên bộ môn</label>
	            <input class="form-control" name="TenBM" placeholder="Nhập tên bộ môn" value="{{$bomon->TenBM}}" />
	        </div>

	        <button type="submit" class="btn btn-warning">Sửa</button>
	        <button type="reset" class="btn btn-default">Làm mới</button>
	    <form>
	</div>
</div>

@endsection