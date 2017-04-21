@extends('admin.layout.index')
@section('title')
Bộ môn - Sửa
@endsection
@section('content')
<!-- Page Content -->

<div class="col-md-12 text-center" style="padding-top: 10px">
    <a style="width: 20%" class="btn btn-primary" href="admin/bomon/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
    <a style="width: 20%" class="btn btn-success" href="admin/bomon/them"><span class="glyphicon glyphicon-plus"></span>  THÊM</a>
</div>
<div class="col-md-12" style="padding-top: 10px">
    <div class="panel panel-primary">
        <div class="panel-heading text-center">SỬA BỘ MÔN - {{$bomon->TenBM}}</div>
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
                    <button type="reset" class="btn btn-default">Reset</button>      
                </div>
            <form>
        </div>
    </div>
</div>

@endsection