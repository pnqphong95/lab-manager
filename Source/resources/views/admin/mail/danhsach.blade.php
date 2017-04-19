@extends('admin.layout.index')
@section('title')
Mail - Danh sách
@endsection
@section('content')
<!-- Page Content -->

<div class="col-md-12" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/mail/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
	<a style="width: 20%" class="btn btn-success" href="admin/mail/them"><span class="glyphicon glyphicon-plus"></span>  THÊM</a>
</div>
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
	            <th>Gửi email</th>
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
	                <td><a href="admin/mail/mail/{{$gv->id}}">Gửi email</a></td>
	            </tr>
	        @endforeach
	    </tbody>
	</table>
</div>
@endsection