@extends('admin.layout.index')
@section('title')
Môn học- Sửa
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12 text-center" style="color: blue"><h2>SỬA MÔN HỌC</h2></div>
<div class="col-md-12 text-center" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/monhoc/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
	<a style="width: 20%" class="btn btn-success" href="admin/monhoc/them"><span class="glyphicon glyphicon-plus"></span>  THÊM</a>
</div>
<div class="col-md-12" style="padding-top: 10px">
    <div class="panel panel-primary">
    	<div class="panel-heading text-center">
    		SỬA MÔN HỌC - {{$monhoc->TenMH}}
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
		    <form action="admin/monhoc/sua/{{$monhoc->id}}" method="POST">
		    	<input type="hidden" name="_token" value="{{csrf_token()}}" />
		        <div class="form-group">
		            <label>Mã môn học</label>
		            <input class="form-control" name="MaMH" placeholder="Nhập mã môn học" value="{{$monhoc->MaMH}}" />
		        </div>
		        <div class="form-group">
		            <label>Tên môn học</label>
		            <input class="form-control" name="TenMH" placeholder="Nhập tên môn học" value="{{$monhoc->TenMH}}" />
		        </div>
		        <div class="form-group">
		            <label>Số tín chỉ</label>
		            <input class="form-control" name="SoTinChi" placeholder="Nhập số tín chỉ" value="{{$monhoc->SoTinChi}}" />
		        </div>
		        <div class="text-center">
		            <button type="submit" class="btn btn-warning" onclick="return confirm('Bạn có muốn cập nhật {{$monhoc->TenMH}}  không?');"><span class="glyphicon glyphicon-edit"> </span> Sửa</button>
		            <button type="reset" class="btn btn-default">Reset</button>      
		        </div>
		    </form>
		</div>
	</div>
</div>

@endsection