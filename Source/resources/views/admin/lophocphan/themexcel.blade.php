@extends('admin.layout.index')
@section('title')
Nhập từ file
@endsection
@section('content')
<div class="col-md-12" style="padding-top: 10px">
<table width="100%">
	<tr>
		<td style="text-align: left;">
			<h3 class="page-header">Thêm danh sách lớp học phần từ tập tin excel</h3>
		</td>
		<td>
			<div class="pull-right">

			</div>
		</td>
	</tr>
</table>
</div>
<hr>
<br>
@if(session('thongbao'))
	<div class="alert alert-success">
		{{session('thongbao')}}
	</div>
@endif	
<div class="col-md-12">
   	<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ route('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="file" name="import_file" />
		<br>
		<button class="btn btn-primary">Xác nhận</button>
		<a class="btn btn-default " href="admin/lophocphan/danhsach">Quay lại</a>
	</form>
</div>

@endsection

@section ('script')

@endsection