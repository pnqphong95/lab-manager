@extends('admin.layout.index')
@section('title')
Môn học- Sửa
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12 text-center" style="color: blue"><h2>SỬA MÔN HỌC</h2></div>
<div class="col-md-12 text-center" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/monhoc/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
</div>
<div class="col-md-12" style="padding-top: 10px">
    <div class="panel panel-primary">
    	<div class="panel-heading text-center">
    		SỬA MÔN HỌC - {{$monhoc->TenMH}}
    	</div>
    	<div class="panel-body">
		    <div class="col-md-6">
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
			    <form action="admin/monhoc/sua/{{$monhoc->id}}" method="POST">
			    	<input type="hidden" name="_token" value="{{csrf_token()}}" />
			        <div class="form-group">
			            <label>Mã môn học</label>
			            <input class="form-control" name="MaMH" placeholder="Nhập mã môn học" value="{{$monhoc->MaMH}}" />
			        </div>
			        <div class="form-group">
			            <label>Tên môn học</label>
			            <input class="form-control" name="TenMH" placeholder="Nhập tên môn học" value="{{$monhoc->TenMH}}" />
			        </div>
			        <div class="form-group">
			            <label>Số tín chỉ</label>
			            <input class="form-control" name="SoTinChi" placeholder="Nhập số tín chỉ" value="{{$monhoc->SoTinChi}}" />
			        </div>
			        <div class="text-center">
			            <button type="submit" class="btn btn-warning" onclick="return confirm('Bạn có muốn cập nhật {{$monhoc->TenMH}}  không?');"><span class="glyphicon glyphicon-edit"> </span> Sửa</button>
			            <a href="admin/monhoc/danhsach" class="btn btn-default">Trở về</a>  
			        </div>
			    </form>
		    </div>
		    <div class="col-md-6">
				<div>
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <tr>
                        <th>STT</th>
                        <th>Tên phần mềm</th>
                        <th>Phiên bản</th>
                        <th>Xóa</th>
                    </tr>
                    <?php $i=0; ?>
                    @foreach($phanmem as $pm)
                    <?php $i++; ?>
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$pm->TenPM}}</td>
                        <td>{{$pm->PhienBan}}</td>
                        <td><a href="admin/monhoc/sua/xoaPM/{{$monhoc->id}}/{{$pm->id}}">Xóa</a></td>
                    </tr>
                    @endforeach
                	</table>
				</div>
				<div>
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
				    <form action="admin/monhoc/suapm/{{$monhoc->id}}" method="POST" class="text-center">
				        <input type="hidden" name="_token" value="{{csrf_token()}}" />
				        
			            <input type="hidden" class="form-control" name="idMonHoc" value="{{$monhoc->id}}" />
				        
				        <div class="form-group">
				            <label>Thêm phần mềm</label>
				            <select class="form-control" name="idPhanMem">
				            	@foreach($phanmem as $pm)
				            		<option value="{{$pm->id}}">{{$pm->TenPM}}</option>
				            	@endforeach
				            </select>
				        </div>
				        <button type="submit" class="btn btn-primary">Thêm phần mềm</button>
				    <form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection