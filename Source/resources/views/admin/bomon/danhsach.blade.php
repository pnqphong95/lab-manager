@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h1 class="page-header">Bộ môn
        <small>Danh sách</small>
    </h1>

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	    <thead>
	        <tr align="center">
	            <th>Mã bộ môn</th>
	            <th>Tên bộ môn</th>
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
	        @foreach($bomon as $bm)
	            <tr class="odd gradeX" align="center">
	                <td>{{$bm->id}}</td>
	                <td>{{$bm->TenBM}}</td>
	                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/bomon/xoa/{{$bm->id}}"> Xóa</a></td>
	                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/bomon/sua/{{$bm->id}}">Sửa</a></td>
	            </tr>
	        @endforeach
	    </tbody>
	</table>
</div>

@endsection

