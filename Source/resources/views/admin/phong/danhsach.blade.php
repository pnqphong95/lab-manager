@extends('admin.layout.index')
@section('title')
Phòng - Chi tiết
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/phong/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
	<a style="width: 20%" class="btn btn-success" href="admin/phong/them"><span class="glyphicon glyphicon-plus"></span>  THÊM</a>
</div>
<div class="col-md-12">
	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	    <thead>
	        <tr align="center">
	            <th>Tên phòng</th>	            
	            <th>Bộ môn</th>
	            <!-- <th>Cấu hình</th> -->
	            <th>Thông tin</th>
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
	        @foreach($phong as $p)
	            <tr class="odd gradeX" align="center">
	                <td>{{$p->TenPhong}}</td>
	                <td>
	                @foreach($bomon as $bm)                    
	                    @if($bm->id == $p->idBoMon)
	                        {{$bm->TenBM}}
	                    @endif	                     
	                @endforeach
                	</td>
	                <td><a href="admin/phong/chitiet/{{$p->id}}">Chi tiết</a></td>
	                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/phong/xoa/{{$p->id}}" onclick="return confirm('Bạn có muốn xóa phòng {{$p->TenPhong}}');"> Xóa</a></td>
	                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/phong/sua/{{$p->id}}">Sửa</a></td>
	            </tr>
	        @endforeach
	    </tbody>
	</table>
</div>

@endsection