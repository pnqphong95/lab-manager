@extends('admin.layout.index')
@section('title')
Tuần - thêm
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12" style="padding-top: 10px">
    <table width="100%">
        <tr>
            <td style="text-align: left;">
                <h3>THÊM TUẦN</h3>
            </td>
            <td>
                <div class="pull-right">
                    <a class="btn btn-primary" href="admin/tuan/danhsach"><span class="glyphicon glyphicon-list"></span>   DANH SÁCH</a>
                </div>
            </td>
        </tr>
    </table>
</div>
<hr>
<br>
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
        <form action="admin/tuan/them" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="form-group">
                <label>Tên tuần</label>
                <input class="form-control" name="TenTuan" placeholder="Nhập tên tuần" />
            </div>
            <div class="form-group">
                <label>Tên viết tắt</label>
                <input class="form-control" name="TenVietTat" placeholder="Nhập tên tuần" />
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="admin/tuan/danhsach" class="btn btn-default">Hủy</a>
        <form>
        </div>
        </div>
    </div>
</div>

@endsection