@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h1 class="page-header">Lớp học phần
        <small>Danh sách</small>
        <a href="admin/lophocphan/them" class="btn btn-primary">Thêm</a>
    </h1>

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	    <thead>
	        <tr align="center">
	            <th>Mã môn học</th>
	            <th>Mã lớp</th>
	            <th>Tên lớp</th>
	            <th>Sỉ số</th>
	            <th>Delete</th>
	            <th>Edit</th>
	        </tr>
	    </thead>
	    <tbody>
	    	@if(session('thongbao'))
	    		<div class="alert alert-success">
	    			{{session('thongbao')}}
	    		</div>
	    	@endif	
	        @foreach($lophocphan as $lhp)
	            <tr class="odd gradeX" align="center">
	                <td>{{$lhp->idMonHoc}}</td>
	                <td>{{$lhp->MaLop}}</td>
	                <td>{{$lhp->TenLop}}</td>
	                <td>{{$lhp->SiSo}}</td>
	                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/lophocphan/xoa/{{$lhp->id}}"> Xóa</a></td>
	                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/lophocphan/sua/{{$lhp->id}}">Sửa</a></td>
	            </tr>
	        @endforeach
	    </tbody>
	</table>
</div>

@endsection