@extends('admin.layout.index')
@section('title')
Bộ môn - Sửa
@endsection
@section('content')
<!-- Page Content -->

<div class="col-md-12 text-center" style="padding-top: 10px">
    <a style="width: 20%" class="btn btn-primary" href="admin/hocky/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
</div>
<div class="col-md-12" style="padding-top: 10px">
    <div class="panel panel-primary">
        <div class="panel-heading text-center">SỬA HỌC KỲ - {{$hocky->HocKy}}/{{$hocky->NienKhoa}}</div>
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
            <form action="admin/hocky/sua/{{$hocky->id}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-horizontal" style="padding-bottom: 10px">
                    <div class="col-md-4"><label>Số học kỳ</label></div>
                    <div class="col-md-8" style="padding-bottom: 10px">
                        <!-- <input type="number" class="form-control" name="HocKy" placeholder="Nhập học kỳ" /> -->
                        <select class="form-control" name="HocKy">
                            <option 
                                @if($hocky->HocKy == 1)
                                    selected
                                @endif
                             value="1">1</option>
                            <option
                                @if($hocky->HocKy == 2)
                                    selected
                                @endif
                             value="2">2</option>
                            <option
                                @if($hocky->HocKy == 3)
                                    selected
                                @endif
                             value="3">3</option>
                        </select>
                    </div>
                </div>
                <div class="form-horizontal" style="padding-bottom: 10px">
                    <div class="col-md-4"><label>Niên khóa</label></div>
                    <div class="col-md-8" style="padding-bottom: 10px"><input class="form-control" name="NienKhoa" placeholder="Nhập tên niên khóa" value="{{$hocky->NienKhoa}}" /></div>
                </div>
                <div class="form-horizontal" style="padding-bottom: 10px">
                    <div class="col-md-4"><label>Ngày bắt đầu học kỳ</label></div>
                    <div class="col-md-8" style="padding-bottom: 10px"><input type="date" class="form-control" name="NgayBD" value="{{$hocky->NgayBD}}"/></div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"> </span> Sửa</button>
                    <!-- <button type="reset" class="btn btn-default">Reset</button> -->
                    <a href="admin/hocky/danhsach" class="btn btn-default">Trở về</a>      
                </div>
            <form>
        </div>
    </div>
</div>

@endsection