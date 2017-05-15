@extends('admin.layout.index')
@section('title')
Bộ môn - Sửa
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12" style="padding-top: 10px">
    <table width="100%">
        <tr>
            <td style="text-align: left;">
                <h3>SỬA BỘ MÔN - {{$bomon->TenBM}}</h3>
            </td>
            <td>
                <div class="pull-right">
                    <a class="btn btn-primary" href="admin/bomon/danhsach"><span class="glyphicon glyphicon-list"></span>   DANH SÁCH</a>
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
            <form action="admin/bomon/sua/{{$bomon->id}}" method="POST">
                 <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group">
                    <label>Tên bộ môn</label>
                    <input class="form-control" name="TenBM" placeholder="Nhập tên bộ môn" value="{{$bomon->TenBM}}" />
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-warning" onclick="return confirm('Bạn có muốn cập nhật {{$bomon->TenBM}}  không?');"><span class="glyphicon glyphicon-edit"> </span> Sửa</button>
                    <a href="admin/bomon/danhsach" class="btn btn-default">Hủy</a>      
                </div>
            <form>
        </div>
    </div>
</div>

@endsection