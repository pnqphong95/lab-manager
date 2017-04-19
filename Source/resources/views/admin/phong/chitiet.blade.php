@extends('admin.layout.index')
@section('title')
Phòng - Chi tiết
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/phong/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
	<a style="width: 20%" class="btn btn-success" href="admin/phong/them"><span class="glyphicon glyphicon-plus"></span>  THÊM</a>
</div>
<div class="row">
	<div class="col-md-12">
		<h1 class="page-header">Chi tiết
	        <small>{{$phong->TenPhong}}</small>
	    </h1>
	</div>
    <div class="col-md-6">
	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	    <tr>
	    	<th>Tên phòng</th>
	    	<td>{{$phong->TenPhong}}</td>
	    </tr>
	    <tr>
	    	<th>Tên phần mềm</th>
	    	<td>
	    		@foreach($phong_phanmem as $pm)
	    			{{$pm->TenPM}}, 
	    		@endforeach
	    	</td>
	    </tr>
	    <tr>
	    	<th>RAM</th>
	    	<td>{{$phong->DLRam}}</td>
	    </tr>
	    <tr>
	    	<th>Ổ cứng</th>
	    	<td>{{$phong->DLOCung}}</td>
	    </tr>
	    <tr>
	    	<th>CPU</th>
	    	<td>{{$phong->CPU}}</td>
	    </tr>
	    <tr>
	    	<th>GPU</th>
	    	<td>{{$phong->GPU}}</td>
	    </tr>
	</table>
	<a class="btn btn-primary" href="admin/phong/danhsach">Quay lại</a>
</div>
<div class="col-md-6">
	<div class="panel">
		<div class="panel-info">
			<div class="panel-heading">
				<h4><center>Thêm phần mềm</center></h4>
			</div>
			<div class="panel-body">
				<form action="admin/phong/chitiet/{{$phong->id}}" method="POST">
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
					<input hidden name="idPhong" value="{{$phong->id}}" />
		            <div class="col-md-6">
		                <div class="form-group">
		                    <label>Tên phòng</label>
		                    <input class="form-control" name="TenPhong" placeholder="Nhập tên phòng" value="{{$phong->TenPhong}}" />
		                </div>
		                <div class="form-group">
		                    <label>Tên phần mềm</label>
		                    <select name="idPhanMem" class="form-control">
	                        	@foreach($phanmem as $p_pm)
	                        		<option value="{{$p_pm->id}}">{{$p_pm->TenPM}}</option>
	                        	@endforeach
		                    </select>
		                </div>
		            </div>
		            <div class="col-md-12">
		                <button type="submit" class="btn btn-primary">Thêm</button>
		                <button type="reset" class="btn btn-default">Làm mới</button>
		            </div>
				</form>
			</div>
		</div>
	</div>

</div>
</div>
@endsection

