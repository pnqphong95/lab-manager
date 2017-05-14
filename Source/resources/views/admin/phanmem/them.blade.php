@extends('admin.layout.index')
@section('title')
Phần mềm - Thêm
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12" style="padding-top: 10px">
<table width="100%">
	<tr>
		<td style="text-align: left;">
			<h3 class="page-header">THÊM PHẦN MỀM</h3>
		</td>
		<td>
			<div class="pull-right">
				<a class="btn btn-primary" href="admin/phanmem/danhsach"><span class="glyphicon glyphicon-list"></span>  DANH SÁCH</a>
			</div>
		</td>
	</tr>
</table>
</div>
<hr>
<br>

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
	    <div class="panel panel-default ">
	    <div class="panel-body">
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
	        
	        <button type="submit" class="btn btn-primary">Thêm</button>
	        <button type="reset" class="btn btn-default">Reset</button>
	    <form>
	    </div>
	    </div>
	</div>
</div>

@endsection