@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

    <div class="col-md-9">
        <h1 class="page-header">Phòng thực hành
            <small>Thêm</small>
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
        <form action="admin/phong/them" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="form-group">
                <label>Tên phòng</label>
                <input class="form-control" name="TenPhong" placeholder="Nhập tên phòng" />
            </div>
            <div class="form-group">
                <label>Bộ môn</label>
                <select name="idBoMon" class="form-control">
                    @foreach($allBoMon as $bomon)
                    <option value="{{$bomon->id}}">{{$bomon->TenBM}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Dung lượng ram</label>
                <input type="number" class="form-control" name="DLRam" placeholder="Nhập dung lượng ram" />
            </div>
            <div class="form-group">
                <label>Dung lượng ổ cứng</label>
                <input type="number" class="form-control" name="DLOCung" placeholder="Nhập dung lượng ổ cứng" />
            </div>
            <div class="form-group">
                <label>CPU</label>
                <input class="form-control" name="CPU" placeholder="Nhập thông tin CPU" />
            </div>
            <div class="form-group">
                <label>GPU</label>
                <input class="form-control" name="GPU" placeholder="Nhập thông tin GPU" />
            </div>        

            <button type="submit" class="btn btn-primary">Thêm</button>
            <button type="reset" class="btn btn-default">Làm mới</button>
        <form>
    </div>

@endsection