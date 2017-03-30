@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h1 class="page-header">Phòng thực hành
        <small>Danh sách</small>
    </h1>
</div>
<div class="col-md-12">
	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	    <thead>
	        <tr align="center">
	            <th>Tên phòng</th>	            
	            <th>Bộ môn</th>
	            <!-- <th>Cấu hình</th> -->
	            <th>RAM - Ổ cứng - CPU - GPU</th>
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
	                <!-- <td><a href="admin/phong/chitiet/{{$p->id}}">Chi tiết</a></td> -->
	                <td>{{$p->DLRam}} - {{$p->DLOCung}} - {{$p->CPU}} - {{$p->GPU}}</td>
	                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/phong/xoa/{{$p->id}}" onclick="return confirm('Bạn có muốn xóa phòng {{$p->TenPhong}}');"> Xóa</a></td>
	                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/phong/sua/{{$p->id}}">Sửa</a></td>
	            </tr>
	        @endforeach
	    </tbody>
	</table>
</div>

@endsection