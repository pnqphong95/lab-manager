@extends('admin.layout.index')
@section('title')
Bộ môn - Danh sách
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12" style="padding-top: 10px">
    <table width="100%">
        <tr>
            <td style="text-align: left;">
                <h3>DANH SÁCH BỘ MÔN</h3>
            </td>
            <td>
                <div class="pull-right">
                    <a class="btn btn-success" href="admin/bomon/them"><span class="glyphicon glyphicon-plus"></span>   THÊM</a>
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
                <th><center>Tên bộ môn</center></th>
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
	        @foreach($bomon as $bm)
	            <tr class="odd gradeX">
	                <td>{{$bm->id}}</td>
	                <td>{{$bm->TenBM}}</td>
	                <td><a href="admin/bomon/xoa/{{Crypt::encrypt($bm->id)}}" onclick="return confirm('Bạn có muốn xóa bộ môn {{$bm->TenBM}} không?');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o  fa-fw"></i> Xóa</a></td>
	                <td><a href="admin/bomon/sua/{{Crypt::encrypt($bm->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil fa-fw"></i>  Sửa</a></td>
	            </tr>
	        @endforeach
	    </tbody>
    </table>

</div>

@endsection
