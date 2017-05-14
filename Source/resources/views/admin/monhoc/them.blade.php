@extends('admin.layout.index')
@section('title')
Môn học - Thêm môn học
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12 text-center" style="color: blue"><h2>THÊM MÔN HỌC</h2></div>
<div class="col-md-12 text-center" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/monhoc/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
</div>
<div class="col-md-12" style="padding-top: 10px">
    <div class="panel panel-primary">
        <div class="panel-heading text-center">THÊM MÔN HỌC</div>
        <div class="panel-body">
            <div class="col-md-6 col-md-offset-3">
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
                        <div>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <a href="admin/monhoc/danhsach" class="btn btn-default">Trở về</a>
                        </div>
                    <form>
            </div>
        </div>
    </div>
</div>

@endsection