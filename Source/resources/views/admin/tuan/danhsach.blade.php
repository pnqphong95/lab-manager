@extends('admin.layout.index')
@section('title')
Tuan - Danh sách
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12" style="padding-top: 10px">
    <table width="100%">
        <tr>
            <td style="text-align: left;">
                <h3>DANH SÁCH TUẦN</h3>
            </td>
            <td>
                <div class="pull-right">
                    <a class="btn btn-success" href="admin/tuan/them"><span class="glyphicon glyphicon-plus"></span>   THÊM</a>
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
            <tr>
                <th><center>STT</center></th>
                <th><center>Số tuần</center></th>
                <th><center>Tên viết tắt</center></th>
                <th><center>Xóa</center></th>
                <th><center>Sửa</center></th>
            </tr>
        </thead>
        <tbody>
	    	@if(session('thongbao'))
	    		<div class="alert alert-success">
	    			{{session('thongbao')}}
	    		</div>
	    	@endif	
	        @foreach($tuan as $t)
	            <tr class="odd gradeX">
	                <td>{{$t->id}}</td>
	                <td>{{$t->TenTuan}}</td>
                    <td>{{$t->TenVietTat}}</td>
	                <td><a href="admin/tuan/xoa/{{Crypt::encrypt($t->id)}}" onclick="return confirm('Bạn có muốn xóa tuần {{$t->TenVietTat}} không?');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o  fa-fw"></i> Xóa</a></td>
	                <td><a href="admin/tuan/sua/{{Crypt::encrypt($t->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil fa-fw"></i>  Sửa</a></td>
	            </tr>
	        @endforeach
	    </tbody>
    </table>

</div>

@endsection
