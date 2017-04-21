@extends('admin.layout.index')
@section('title')
Bộ môn - Thêm
@endsection
@section('content')
<!-- Page Content -->

<div class="col-md-12 text-center" style="padding-top: 10px">
    <a style="width: 20%" class="btn btn-primary" href="admin/bomon/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
    <!-- <a style="width: 20%" class="btn btn-success" href="admin/bomon/them"><span class="glyphicon glyphicon-plus"></span>  THÊM</a> -->
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
    	<div class="panel-heading text-center"><strong>THÊM MỚI BỘ MÔN</strong></div>
    	<div class="panel-body">
    		<form action="admin/bomon/them" method="POST">
		        <input type="hidden" name="_token" value="{{csrf_token()}}" />
		        <div class="form-horizontal" style="padding-bottom: 10px">
		            <div class="col-md-4"><label>Tên bộ môn</label></div>
		            <div class="col-md-8" style="padding-bottom: 10px"><input class="form-control" name="TenBM" placeholder="Nhập tên bộ môn" /></div>
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