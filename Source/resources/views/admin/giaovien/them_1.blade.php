@extends('admin.layout.index')
@section('title')
Giáo viên - Thêm
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12 text-center" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/giaovien/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
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
		<div class="panel-heading text-center">THÊM MỚI GIÁO VIÊN</div>
		<div class="panel-body"> 
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
			            	<option selected value="-1"></option>
			            	@foreach($chucvu as $cv)
			            		<option value="{{$cv->id}}">{{$cv->TenCV}}</option>
			            	@endforeach
			            </select>
			        </div>
			        <div class="form-group">
			            <label>Bộ môn</label>
			            <select class="form-control" name="idBoMon">
			            	<option selected value="-1"></option>
			            	@foreach($bomon as $bm)
			            		<option value="{{$bm->id}}">{{$bm->TenBM}}</option>
			            	@endforeach
			            </select>
			        </div>
			        <div class="form-group">
			            <label>Mật khẩu</label>
			            <input type="text" class="form-control" name="password" placeholder="Nhập mật khẩu" />
			        </div>
			        <div class="form-group">
			            <label>Mật khẩu</label>
			            <input type="text" class="form-control" name="password_confirm" placeholder="Nhập lại mật khẩu" />
			        </div>
			        <div class="form-group">
			            <label>Kích hoạt</label>
			            <select class="form-control" name="KichHoat">
			            	<option value="-1"></option>
			            	<option value="1">Có</option>
			            	<option value="0">Không</option>
			            </select>
			        </div>
			    </div>
			    <div class="text-center">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"> </span> Thêm</button>
                    <button type="reset" class="btn btn-default">Reset</button>      
                </div>
		    <form>
		</div>
	</div>	
</div>

@endsection
