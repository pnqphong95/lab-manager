@extends('admin.layout.index')
@section('title')
Môn học - Chi tiết
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12 text-center" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/monhoc/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
	<a style="width: 20%" class="btn btn-warning" href="admin/monhoc/sua/{{$monhoc->id}}"><span class="glyphicon glyphicon-list-alt"></span>   SỬA MÔN HỌC</a>
</div>

<div class="col-md-12" style="padding-top: 10px">
	@if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif
	<div class="panel">
		<div class="panel-primary">
			<div class="panel-heading text-center">
				CHI TIẾT MÔN HỌC {{$monhoc->TenMH}}
			</div>
			<div class="panel-body">
				<div class="col-md-7">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
					    <tr>
					    	<th>Mã môn học</th>
					    	<td>{{$monhoc->MaMH}}</td>
					    </tr>
					    <tr>
					    	<th>Tên môn học</th>
					    	<td>{{$monhoc->TenMH}}</td>
					    </tr>
					    <tr>
					    	<th>Tên phần mềm</th>
					    	<td>
					    		@foreach($phanmem as $pm)
					    			{{$pm->TenPM}}, 
					    		@endforeach
					    	</td>
					    </tr>
					    <tr>
					    	<th>Số tín chỉ</th>
					    	<td>{{$monhoc->SoTinChi}}</td>
					    </tr>
					</table>
				</div>
				<div class="col-md-5">
					<form action="admin/monhoc/themPM/{{$monhoc->id}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}" />
						<input hidden name="idMonHoc" value="{{$monhoc->id}}" />
			            <div class="form-group">
		                    <label>Tên phần mềm</label>
		                    <select name="idPhanMem" class="form-control">
	                        	@foreach($phanmem as $p_pm)
	                        		<option value="{{$p_pm->id}}">{{$p_pm->TenPM}}</option>
	                        	@endforeach
		                    </select>
		                </div>
			            <div class="col-md-12">
			                <button type="submit" class="btn btn-primary">Thêm phần mềm</button>
			            </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

