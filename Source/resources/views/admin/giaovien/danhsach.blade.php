@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h1 class="page-header">Giáo viên
        <small>Danh sách</small>
    </h1>

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	    <thead>
	        <tr align="center">
	            <th>Mã giáo viên</th>
	            <th>Họ tên</th>
	            <th>Chức vụ</th>
	            <th>Bộ môn</th>
	            <th>Kích hoạt</th>
	            <th>Chi tiết</th>
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
	        @foreach($giaovien as $gv)
	            <tr class="odd gradeX" align="center">
	                <td>{{$gv->MaGV}}</td>
	                <td>{{$gv->HoGV}} {{$gv->TenGV}}</td>
	                <td>
	                	@foreach($chucvu as $cv)
	                		@if($cv->id == $gv->idChucVu)
	                			{{$cv->TenCV}}
	                		@endif
	                	@endforeach
	                </td>
	                <td>
	                	@foreach($bomon as $bm)
	                		@if($bm->id == $gv->idBoMon)
	                			{{$bm->TenBM}}
	                		@endif
	                	@endforeach
	                </td>
	                <td>{{$gv->KichHoat}}</td>
	                <td><a href="admin/giaovien/chitiet/{{$gv->id}}">Chi tiết</a></td>
	                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/giaovien/xoa/{{$gv->id}}"> Xóa</a></td>
	                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/giaovien/sua/{{$gv->id}}">Sửa</a></td>
	            </tr>
	        @endforeach
	    </tbody>
	</table>
</div>

@endsection