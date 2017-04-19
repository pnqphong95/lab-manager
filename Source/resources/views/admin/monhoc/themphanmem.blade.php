@extends('admin.layout.index')
@section('title')
Môn học - Thêm phần mềm
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/monhoc/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
	<a style="width: 20%" class="btn btn-success" href="admin/monhoc/them"><span class="glyphicon glyphicon-plus"></span>  THÊM</a>
</div>
<div class="col-md-12">
    <h1 class="page-header">Thêm phần mềm môn học
        <small>{{$monhoc->TenMH}}</small>
        <div class="pull-right">
	    	<a href="admin/monhoc/danhsach" class="btn btn-primary">Danh sách môn học</a>
			<a href="admin/monhoc/them" class="btn btn-primary">Thêm môn học</a>
	    </div>
    </h1>
</div>
	<div class="col-md-12">
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
	    <form action="admin/monhoc/themphanmem/{{$monhoc->id}}" method="POST">
	        <input type="hidden" name="_token" value="{{csrf_token()}}" />
	        
            <input type="hidden" class="form-control" name="idMonHoc" value="{{$monhoc->id}}" />
	        
	        <div class="form-group">
	            <label>Tên môn học</label>
	            <input class="form-control" name="tenMonHoc" value="{{$monhoc->TenMH}}" />
	        </div>
	        <div class="form-group">
	            <label>Phần mềm</label>
	            <select class="form-control" name="idPhanMem">
	            	@foreach($phanmem as $pm)
	            		<option value="{{$pm->id}}">{{$pm->TenPM}}</option>
	            	@endforeach
	            </select>
	        </div>
	        
	        <button type="submit" class="btn btn-primary">Thêm phần mềm</button>
	        <button type="reset" class="btn btn-default">Reset</button>
	    <form>
	</div>

@endsection