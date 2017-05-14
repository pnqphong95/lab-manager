@extends('admin.layout.index')
@section('title')
Bộ môn - Danh sách
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12 text-center" style="color: blue"><h2>DANH SÁCH HỌC</h2></div>
<div class="col-md-12 text-center" style="padding-top: 10px">
	<!-- <a style="width: 20%" class="btn btn-primary" href="admin/bomon/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a> -->
	<a style="width: 20%" class="btn btn-success btn-responsive" href="admin/hocky/them"><span class="glyphicon glyphicon-plus"></span>  THÊM MỚI</a>
</div>
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
