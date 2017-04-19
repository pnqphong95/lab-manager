@extends('admin.layout.index')
@section('title')
Môn học - Thêm môn học
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/monhoc/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
	<a style="width: 20%" class="btn btn-success" href="admin/monhoc/them"><span class="glyphicon glyphicon-plus"></span>  THÊM</a>
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
    <form action="admin/monhoc/them" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div class="form-group">
            <label>Mã môn học</label>
            <input class="form-control" name="MaMH" placeholder="Nhập mã môn học" />
        </div>
        <div class="form-group">
            <label>Tên môn học</label>
            <input class="form-control" name="TenMH" placeholder="Nhập tên môn học" />
        </div>
        <div class="form-group">
            <label>Số tín chỉ</label>
            <input type="number" class="form-control" name="SoTinChi" placeholder="Số tín chỉ" />
        </div>
        
        <button type="submit" class="btn btn-primary">Thêm</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>

@endsection