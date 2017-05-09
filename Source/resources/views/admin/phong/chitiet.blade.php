@extends('admin.layout.index')
@section('title')
Phòng - Chi tiết
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12 text-center" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/phong/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
	<a style="width: 20%" class="btn btn-warning" href="admin/phong/sua/{{$phong->id}}"><span class="glyphicon glyphicon-list-alt"></span>   SỬA PHÒNG</a>
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
				CHI TIẾT PHÒNG {{$phong->TenPhong}}
			</div>
			<div class="panel-body">
				<div class="col-md-7">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
					    <tr>
					    	<th>Tên phòng</th>
					    	<td>{{$phong->TenPhong}}</td>
					    </tr>
					    <tr>
					    	<th>Tên phần mềm</th>
					    	<td>
					    		@foreach($phong_phanmem as $pm)
					    			{{$pm->TenPM}}, 
					    		@endforeach
					    	</td>
					    </tr>
					    <tr>
					    	<th>RAM</th>
					    	<td>{{$phong->DLRam}}</td>
					    </tr>
					    <tr>
					    	<th>Ổ cứng</th>
					    	<td>{{$phong->DLOCung}}</td>
					    </tr>
					    <tr>
					    	<th>CPU</th>
					    	<td>{{$phong->CPU}}</td>
					    </tr>
					    <tr>
					    	<th>GPU</th>
					    	<td>{{$phong->GPU}}</td>
					    </tr>
					</table>
				</div>
				<div class="col-md-5">
					<form action="admin/phong/chitiet/{{$phong->id}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}" />
						<input hidden name="idPhong" value="{{$phong->id}}" />
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

