@extends('admin.layout.index')
@section('title')
Giáo viên - Sửa
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12 text-center" style="color: blue"><h2>ĐỔI MẬT KHẨUGIẢNG VIÊN</h2></div>
<div class="col-md-12 text-center" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/giaovien/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
</div>
<div class="col-md-12" style="padding-top: 10px">
    <div class="panel panel-primary">
    	<div class="panel-heading text-center">
    		ĐỔI MẬT KHẨU GIẢNG VIÊN - {{$giaovien->MaGV}} - {{$giaovien->HoGV}} {{$giaovien->TenGV}}
    	</div>
    	<div class="panel-body">
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

		    <div class="col-md-8">
		    	<form action="admin/giaovien/sua/{{$giaovien->id}}" method="POST">
			        <input type="hidden" name="_token" value="{{csrf_token()}}" />
			        <div class="col-md-6">
				        <div class="form-group">
				            <label>Nhập mật khẩu mới</label>
				            <input class="form-control" name="password" placeholder="Nhập mật khẩu mới" />
				        </div>
				        <div class="form-group">
				            <label>Nhập lại mật khẩu mới</label>
				            <input class="form-control" name="re_password" placeholder="Nhập lại mật khẩu" />
				        </div>
			        </div>
			        <div class="text-center">
		                <button type="submit" class="btn btn-warning" onclick="return confirm('Bạn có muốn cập nhật mật khẩu không?');"><span class="glyphicon glyphicon-edit"> </span> Cập nhật</button>      
		            </div>
			    </form>
		    </div>
    	</div>
    </div>
</div>

@endsection