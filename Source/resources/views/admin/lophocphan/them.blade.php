@extends('admin.layout.index')
@section('title')
Lớp học phần - Thêm
@endsection
@section('content')
<!-- Page Content -->
<div class="row">
<div class="col-md-12" style="padding-top: 10px">
	<table width="100%">
		<tr>
			<td style="text-align: left;">
				<h3>THÊM LỚP HỌC PHẦN</h3>
			</td>
			<td>
				<div class="pull-right">
					<a class="btn btn-primary pull-right" href="admin/lophocphan/danhsach" style="margin-right: 10px;">
						<span class="glyphicon glyphicon-list"></span>  DANH SÁCH
					</a>
				</div>
			</td>
		</tr>
	</table>
</div>
</div>
<hr>

<div class="row">
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
	    <form action="admin/phanmem/them" method="POST">
	        <input type="hidden" name="_token" value="{{csrf_token()}}" />
	        <div class="form-group">
	            <label>Tên phần mềm</label>
	            <input class="form-control" name="TenPM" placeholder="Nhập tên phần mềm" />
	        </div>
	        <div class="form-group">
	            <label>Phiên bản</label>
	            <input class="form-control" name="PhienBan" placeholder="Nhập phiên bản" />
	        </div>
	        
	        <div class="text-center">
	        	<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus "></span> Thêm</button>
	        	<a href="admin/lophocphan/danhsach" class="btn btn-default">Hủy</a>
	        </div>
	    <form>
	</div>
</div>
</div>
@endsection