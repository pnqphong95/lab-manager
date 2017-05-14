@extends('admin.layout.index')
@section('title')
Phần mềm - Sửa
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12" style="padding-top: 10px">
<table width="100%">
	<tr>
		<td style="text-align: left;">
			<h3 class="page-header">SỬA THÔNG TIN PHẦN MỀM - {{$phanmem->TenPM}}</h3>
		</td>
		<td>
			<div class="pull-right">
				<a class="btn btn-primary" href="admin/phanmem/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
			</div>
		</td>
	</tr>
</table>
</div>
<hr>
<br>

<div class="col-md-12" style="padding-top: 10px">
    <div class="panel panel-default ">
    	<div class="panel-body">
		    @if(count($errors)>0)
		        <div class="alert alert-danger">
		            @foreach($errors->all() as $err)
		                {{$err}}<br>
		            @endforeach
		        </div>
		    @endif

		    @if(session('thongbao'))
		        <div class="alert alert-success">
		            {{session('thongbao')}}
		        </div>
		    @endif
		    <form  action="admin/phanmem/sua/{{$phanmem->id}}" method="POST">
		        <input type="hidden" name="_token" value="{{csrf_token()}}" />
		        <div class="form-group">
		            <label>Tên phần mềm</label>
		            <input class="form-control" name="TenPM" placeholder="Nhập tên phần mềm" value="{{$phanmem->TenPM}}" />
		        </div>
		        <div class="form-group">
		            <label>Phiên bản</label>
		            <input class="form-control" name="PhienBan" placeholder="Nhập phiên bản" value="{{$phanmem->PhienBan}}" />
		        </div>
		        
			    <div class="text-center">
	                <button type="submit" class="btn btn-warning" onclick="return confirm('Bạn có muốn cập nhật {{$phanmem->TenPM}}  không?');"><span class="glyphicon glyphicon-edit"> </span> Sửa</button>
	                <a href="admin/phanmem/danhsach" class="btn btn-default">Trở lại</a>      
	            </div>
		    </form>
		</div>
	</div>
</div>

@endsection