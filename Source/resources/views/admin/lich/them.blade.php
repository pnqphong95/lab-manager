@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

    <div class="col-md-9">
        <h1 class="page-header">Đăng ký lịch
            <small>Đăng ký</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
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
        <form action="admin/lich/them" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="form-group">
                <label>Tên giáo viên</label>
                <input class="form-control" name="idGiaoVien" placeholder="Nhập tên giáo viên" />
            </div>
            <div class="form-group">
                <label>Tên giáo viên</label>
                <input class="form-control" name="idGiaoVien" placeholder="Nhập tên giáo viên" />
            </div>
            <div class="form-group">
                <label>Tên giáo viên</label>
                <input class="form-control" name="idGiaoVien" placeholder="Nhập tên giáo viên" />
            </div>
            <div class="form-group">
                <label>Tên giáo viên</label>
                <input class="form-control" name="idGiaoVien" placeholder="Nhập tên giáo viên" />
            </div>
            <div class="form-group">
                <label>Tên giáo viên</label>
                <input class="form-control" name="idGiaoVien" placeholder="Nhập tên giáo viên" />
            </div>
            
            
            <button type="submit" class="btn btn-default">Category Add</button>
            <button type="reset" class="btn btn-default">Reset</button>
        <form>
    </div>

@endsection