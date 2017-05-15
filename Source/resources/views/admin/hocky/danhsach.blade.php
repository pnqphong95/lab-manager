@extends('admin.layout.index')
@section('title')
Học kỳ niên khóa - Danh sách
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12" style="padding-top: 10px">
    <table width="100%">
        <tr>
            <td style="text-align: left;">
                <h3>DANH SÁCH HỌC KỲ - NIÊN KHÓA</h3>
            </td>
            <td>
                <div class="pull-right">
                    <a class="btn btn-success" href="admin/hocky/them"><span class="glyphicon glyphicon-plus"></span>   THÊM</a>
                </div>
            </td>
        </tr>
    </table>
</div>
<hr>
<br>
<div class="col-md-12">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
		<thead>
            <tr class="text-center">
                <th><center>STT</center></th>
                <th><center>Học kỳ</center></th>
                <th><center>Niên khóa</center></th>
                <th><center>Ngày bắt đầu</center></th>
                <th><center>Sửa</center></th>
                <th><center>Xóa</center></th>
            </tr>
        </thead>
        <tbody>
	    	@if(session('thongbao'))
	    		<div class="alert alert-success">
	    			{{session('thongbao')}}
	    		</div>
	    	@endif	
	        @foreach($hocky as $hk)
	            <tr class="text-center">
	                <td>{{$hk->id}}</td>
	                <td>{{$hk->HocKy}}</td>
	                <td>{{$hk->NienKhoa}}</td>
	                <td>{{$hk->NgayBD}}
	                </td>
	                <td>
	                	<a class="btn btn-warning btn-xs" href="admin/hocky/sua/{{Crypt::encrypt($hk->id)}}"><i class="fa fa-pencil fa-fw"></i> Sửa</a>
	                </td>
	                <td>
	                	<a class="btn btn-danger btn-xs" href="admin/hocky/xoa/{{Crypt::encrypt($hk->id)}}" onclick="return confirm('Bạn có muốn xóa bộ môn {{$hk->HocKy}}/{{$hk->NienKhoa}} này không?');"><i class="fa fa-trash-o  fa-fw"></i> Xóa</a>
	                </td>
	            </tr>
	        @endforeach
	    </tbody>
    </table>

</div>

@endsection
