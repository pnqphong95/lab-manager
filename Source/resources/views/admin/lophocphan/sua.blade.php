@extends('admin.layout.index')
@section('title')
Lớp học phần - sửa
@endsection
@section('content')
<!-- Page Content -->

<div class="col-md-12" style="padding-top: 10px">
	<table width="100%">
		<tr>
			<td style="text-align: left;">
				<h3>SỬA LỚP HỌC PHẦN</h3>
			</td>
			<td>
				<div class="pull-right">
					<a class="btn btn-primary pull-right" href="admin/lophocphan/danhsach">
						<span class="glyphicon glyphicon-list"></span>  DANH SÁCH
					</a>
				</div>
			</td>
		</tr>
	</table>
</div>
<hr>
<div class="col-md-12" style="padding-top: 10px">
    <div class="panel panel-primary">
    	<div class="panel-heading text-center">
    		SỬA PHẦN MỀM - {{$phanmem->TenPM}}
    	</div>
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
		    <form action="admin/phanmem/sua/{{$phanmem->id}}" method="POST">
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
	                <button type="reset" class="btn btn-default">Reset</button>      
	            </div>
		    </form>
		</div>
	</div>
</div>

@endsection