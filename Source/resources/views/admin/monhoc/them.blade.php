@extends('admin.layout.index')
@section('title')
Môn học - Thêm
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12" style="padding-top: 10px">
    <table width="100%">
        <tr>
            <td style="text-align: left;">
                <h3>THÊM MÔN HỌC</h3>
            </td>
            <td>
                <div class="pull-right">
                    <a class="btn btn-info" href="admin/monhoc/themexcel"><span class="glyphicon glyphicon-plus"></span>   THÊM TỪ FILE</a>
                </div>
                <div class="pull-right" style="padding-right: 10px">
                    <a class="btn btn-primary" href="admin/monhoc/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
                </div>
            </td>
        </tr>
    </table>
</div>
<hr>
<br>
<div class="row">
    <div class="col-md-8">
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
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <a href="admin/monhoc/danhsach" class="btn btn-default">Trở về</a>
                </div>
            <form>
    </div>
</div>

@endsection