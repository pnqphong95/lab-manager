@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-9">
    <h1 class="page-header">Môn học
        <small>Danh sách</small>
        <a href="admin/monhoc/them" class="btn btn-primary">Thêm</a>
    </h1>

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	    <thead>
	        <tr align="center">
	            <th>Mã môn học</th>
	            <th>Tên môn học</th>
	            <th>Số tín chỉ</th>
	            <th>Delete</th>
	            <th>Edit</th>
	        </tr>
	    </thead>
	    <tbody>
	        @foreach($monhoc as $mh)
	            <tr class="odd gradeX" align="center">
	                <td>{{$mh->MaMH}}</td>
	                <td>{{$mh->TenMH}}</td>
	                <td>{{$mh->SoTinChi}}</td>
	                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/monhoc/xoa"> Xóa</a></td>
	                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/monhoc/sua/{{$mh->id}}">Sửa</a></td>
	            </tr>
	        @endforeach
	    </tbody>
	</table>
</div>

@endsection