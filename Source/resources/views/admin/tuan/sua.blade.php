@extends('admin.layout.index')
@section('title')
Tuần - Sửa
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12" style="padding-top: 10px">
    <table width="100%">
        <tr>
            <td style="text-align: left;">
                <h3>SỬA TUẦN - {{$tuan->TenVietTat}}</h3>
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
<div class="col-md-12" style="padding-top: 10px">
    <div class="panel panel-default">
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
            <form action="admin/tuan/sua/{{$tuan->id}}" method="POST">
                 <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group">
                    <label>Tên tuần</label>
                    <input class="form-control" name="TenTuan" placeholder="Nhập tên tuần" value="{{$tuan->TenTuan}}" />
                </div>
                <div class="form-group">
                    <label>Tên viết tắt</label>
                    <input class="form-control" name="TenVietTat" placeholder="Nhập tên tuần" value="{{$tuan->TenVietTat}}" />
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-warning" onclick="return confirm('Bạn có muốn cập nhật {{$tuan->TenVietTat}}  không?');"><span class="glyphicon glyphicon-edit"> </span> Sửa</button>
                    <a href="admin/tuan/danhsach" class="btn btn-default">Hủy</a>      
                </div>
            <form>
        </div>
    </div>
</div>

@endsection