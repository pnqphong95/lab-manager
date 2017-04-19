@extends('admin.layout.index')
@section('title')
Bộ môn - Danh sách
@endsection
@section('content')
<!-- Page Content -->

<div class="col-md-12" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/bomon/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
	<a style="width: 20%" class="btn btn-success" href="admin/bomon/them"><span class="glyphicon glyphicon-plus"></span>  THÊM</a>
</div>
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
	                <td><i class="fa fa-trash-o  fa-fw"></i><a href="admin/bomon/xoa/{{Crypt::encrypt($bm->id)}}" onclick="return confirm('Bạn có muốn xóa bộ môn {{$bm->TenBM}} không?');"> Xóa</a></td>
	                <td><i class="fa fa-pencil fa-fw"></i> <a href="admin/bomon/sua/{{Crypt::encrypt($bm->id)}}">Sửa</a></td>
	            </tr>
	        @endforeach
	    </tbody>
    </table>

</div>

@endsection
