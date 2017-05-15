@extends('admin.layout.index')
@section('title')
Học kỳ niên khóa - Thêm
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12" style="padding-top: 10px">
    <table width="100%">
        <tr>
            <td style="text-align: left;">
                <h3>THÊM HỌC KỲ - NIÊN KHÓA</h3>
            </td>
            <td>
                <div class="pull-right">
                    <a class="btn btn-primary" href="admin/hocky/danhsach"><span class="glyphicon glyphicon-list"></span>   DANH SÁCH</a>
                </div>
            </td>
        </tr>
    </table>
</div>
<hr>
<br>
<div class="col-md-12" style="padding-top: 10px">
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
    <div class="panel panel-default">
    	<div class="panel-body">
    		<form action="admin/hocky/them" method="POST">
		        <input type="hidden" name="_token" value="{{csrf_token()}}" />
		        <div class="form-horizontal" style="padding-bottom: 10px">
		            <div class="col-md-4"><label>Số học kỳ</label></div>
		            <div class="col-md-8" style="padding-bottom: 10px">
                        <!-- <input type="number" class="form-control" name="HocKy" placeholder="Nhập học kỳ" /> -->
                        <select class="form-control" name="HocKy">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
		        </div>
                <div class="form-horizontal" style="padding-bottom: 10px">
                    <div class="col-md-4"><label>Niên khóa</label></div>
                    <div class="col-md-8" style="padding-bottom: 10px"><input class="form-control" name="NienKhoa" placeholder="Nhập tên niên khóa" /></div>
                </div>
                <div class="form-horizontal" style="padding-bottom: 10px">
                    <div class="col-md-4"><label>Ngày bắt đầu học kỳ</label></div>
                    <div class="col-md-8" style="padding-bottom: 10px"><input type="date" class="form-control" name="NgayBD"/></div>
                </div>
		        <div class="text-center">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"> </span> Thêm</button>
                    <!-- <button type="reset" class="btn btn-default">Reset</button> -->
                    <a href="admin/hocky/danhsach" class="btn btn-default">Trở về</a>      
                </div>
		    <form>
    	</div>
	</div>
</div>

@endsection