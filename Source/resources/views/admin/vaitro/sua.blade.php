@extends('admin.layout.index')
@section('title')
Vai trò - Sửa
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12 text-center" style="color: blue"><h2>SỬA VAI TRÒ</h2></div>
<div class="col-md-12 text-center" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/vaitro/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
	<a style="width: 20%" class="btn btn-success" href="admin/vaitro/them"><span class="glyphicon glyphicon-plus"></span>  THÊM</a>
</div>
<div class="col-md-12" style="padding-top: 10px">
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
	<div class="panel panel-primary">
		<div class="panel-heading text-center">
			SỬA VAI TRÒ
		</div>
		<div class="panel-body">
			<form action="admin/vaitro/sua/{{$vaitro->id}}" method="POST">
		        <input type="hidden" name="_token" value="{{csrf_token()}}" />

	        	<div class="form-group">
		            <label>Tên vai trò (viết liền không dấu)</label>
		            <input class="form-control" name="name" placeholder="Nhập mã tên vai trò"  value="{{$vaitro->name}}" />
		        </div>
		        <div class="form-group">
		            <label>Tên dùng để hiển thị</label>
		            <input class="form-control" name="display_name" placeholder="Nhập tên dùng để hiển thị" value="{{$vaitro->display_name}}" />
		        </div>
		        <div class="form-group">
		            <label>Mô tả cho vai trò</label>
		            <input class="form-control" name="description" placeholder="Nhập mô tả" value="{{$vaitro->description}}" />
		        </div>		        
		        <div class="text-center">
                    <button type="submit" class="btn btn-warning"onclick="return confirm('Bạn có muốn cập nhật {{$vaitro->name}}  không?');"><span class="glyphicon glyphicon-edit"> </span> Sửa</button>
                    <button type="reset" class="btn btn-default">Reset</button>      
                </div>
		    <form>
		</div>
	</div>
</div>

@endsection