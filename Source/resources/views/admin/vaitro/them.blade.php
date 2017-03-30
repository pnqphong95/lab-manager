@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h1 class="page-header">Vai trò
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
	    <form action="admin/vaitro/them" method="POST">
	        <input type="hidden" name="_token" value="{{csrf_token()}}" />

	        	<div class="form-group">
		            <label>Tên vai trò (viết liền không dấu)</label>
		            <input class="form-control" name="name" placeholder="Nhập mã tên vai trò" />
		        </div>
		        <div class="form-group">
		            <label>Tên dùng để hiển thị</label>
		            <input class="form-control" name="display_name" placeholder="Nhập tên dùng để hiển thị" />
		        </div>
		        <div class="form-group">
		            <label>Mô tả cho vai trò</label>
		            <input class="form-control" name="description" placeholder="Nhập mô tả" />
		        </div>		        


	        <button type="submit" class="btn btn-primary">Thêm</button>
	        <button type="reset" class="btn btn-default">Reset</button>
	    <form>
	</div>
</div>

@endsection