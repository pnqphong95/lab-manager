@extends('admin.layout.index')
@section('title')
Giáo viên - Thêm
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/giaovien/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
	<a style="width: 20%" class="btn btn-success" href="admin/giaovien/them"><span class="glyphicon glyphicon-plus"></span>  THÊM</a>
</div>
<div class="col-md-12">
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
	    <form action="admin/giaovien/them" method="POST">
	        <input type="hidden" name="_token" value="{{csrf_token()}}" />
	        <div class="col-md-6">
	        	<div class="form-group">
		            <label>Mã giáo viên</label>
		            <input class="form-control" name="MaGV" placeholder="Nhập mã giáo viên" />
		        </div>
		        <div class="form-group">
		            <label>Họ</label>
		            <input class="form-control" name="HoGV" placeholder="Nhập học giáo viên" />
		        </div>
		        <div class="form-group">
		            <label>Tên</label>
		            <input class="form-control" name="TenGV" placeholder="Nhập tên giáo viên" />
		        </div>
		        <div class="form-group">
		            <label>Ngày sinh</label>
		            <input type="date" class="form-control" name="NgaySinh"/>
		        </div>
		        <div class="form-group">
		            <label>Giới tính</label>
		            <select class="form-control" name="GioiTinh">
		            	<option value="1">Nam</option>
		            	<option value="0">Nữ</option>
		            </select>
		        </div>
	        </div>
		    <div class="col-md-6">
		    	<div class="form-group">
		            <label>Số điện thoại</label>
		            <input type="text" class="form-control" name="SDT" placeholder="Nhập Số điện thoại" />
		        </div>
		        <div class="form-group">
		            <label>Email</label>
		            <input type="text" class="form-control" name="Email" placeholder="Nhập email" />
		        </div>
		        <div class="form-group">
		            <label>Chức vụ</label>
		            <select class="form-control" name="idChucVu">
		            	<option value="1">Administrator</option>
		            	<option selected value="2">Người dùng bình thường</option>
		            	<option value="3">Người dùng quản lí</option>
		            </select>
		        </div>
		        <div class="form-group">
		            <label>Bộ môn</label>
		            <select class="form-control" name="idBoMon">
		            	<option value="1">Công nghệ thông tin</option>
		            	<option value="2">Hệ thống thông tin</option>
		            	<option value="3">Khoa học máy tính</option>
		            	<option value="4">Kỹ thuật phần mềm</option>
		            	<option value="5">Truyền thông và mạng máy tính</option>
		            	<option value="6">Tin học ứng dụng</option>
		            </select>
		        </div>
		        <div class="form-group">
		            <label>Mật khẩu</label>
		            <input type="text" class="form-control" name="password" placeholder="Nhập mật khẩu" />
		        </div>
		        <div class="form-group">
		            <label>Kích hoạt</label>
		            <select class="form-control" name="KichHoat">
		            	<option value="1">Có</option>
		            	<option value="0">Không</option>
		            </select>
		        </div>
		    </div>

	        <button type="submit" class="btn btn-primary">Thêm</button>
	        <button type="reset" class="btn btn-default">Reset</button>
	    <form>
	</div>
</div>

@endsection