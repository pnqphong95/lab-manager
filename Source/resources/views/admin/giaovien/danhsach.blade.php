@extends('admin.layout.index')
@section('title')
Giảng viên - Danh sách
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12 text-center" style="color: blue"><h2>DANH SÁCH NGƯỜI DÙNG</h2></div>
<div class="col-md-12 text-center" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-success" href="admin/giaovien/them"><span class="glyphicon glyphicon-plus"></span>  THÊM</a>
</div>
<div class="col-md-12">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	    <thead>
	        <tr class="text-center">
	        	<th>STT</th>
	            <th>Mã người dùng</th>
	            <th>Họ tên</th>
	            <th>Chức vụ</th>
	            <th>Bộ môn</th>
	            <th>Chi tiết</th>
	            <th>Xóa</th>
	            <th>Sửa</th>
	        </tr>
	    </thead>
	    <tbody>
	    	@if(session('thongbao'))
	    		<div class="alert alert-success">
	    			{{session('thongbao')}}
	    		</div>
	    	@endif	
	    	<?php $i=0; ?>
	        @foreach($giaovien as $gv)
	        	<?php $i++; ?>
	            <tr class="odd gradeX" align="center">
	            	<td>{{$i}}</td>
	                <td>{{$gv->MaGV}}</td>
	                <td>{{$gv->HoGV}} {{$gv->TenGV}}</td>
	                <td>
	                	{{$gv->chucvu->TenCV}}
	                </td>
	                <td>
	                	{{$gv->bomon->TenBM}}
	                </td>
	                <td><!-- <a href="admin/giaovien/chitiet/{{$gv->id}}">Chi tiết</a> -->
		                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#yourModal{{$gv->id}}">
		                	Chi tiết
		                </button>
	                </td>
	                <td class="center">
	                	<!-- @if($gv->idBoMon == Auth::user()->idBoMon)
                			<a class="btn btn-danger btn-sm" href="admin/phong/xoa/{{$gv->id}}" onclick="return confirm('Bạn có muốn xóa Giảng viên {{$gv->TenGV}} không?');">Xóa</a>
                		@endif -->
                		@role('admin')
                			<a class="btn btn-danger btn-sm" href="admin/phong/xoa/{{$gv->id}}" onclick="return confirm('Bạn có muốn xóa Giảng viên {{$gv->TenGV}} không?');">Xóa</a>
                		@endrole
	                </td>
	                <td class="center">
	                	<!-- @if($gv->idBoMon == Auth::user()->idBoMon)
	                	<a class="btn btn-warning btn-sm" href="admin/giaovien/sua/{{$gv->id}}"><i class="fa fa-pencil fa-fw"></i> Sửa</a>
	                	@endif
	                	 -->
	                	<!-- @role('manager')                    
		                    @if($gv->idBoMon == Auth::user()->idBoMon)
		                	<a class="btn btn-warning btn-sm" href="admin/giaovien/sua/{{$gv->id}}"><i class="fa fa-pencil fa-fw"></i> Sửa</a>
		                	@endif
	                    @endrole -->

	                    @role('admin')                    
		                	<a class="btn btn-warning btn-sm" href="admin/giaovien/sua/{{$gv->id}}"><i class="fa fa-pencil fa-fw"></i> Sửa</a>
	                    @endrole
	                </td>
	            </tr>
	        @endforeach
	    </tbody>
	</table>
</div>

@foreach ($giaovien as $gv)    
    <div class="modal fade" id="yourModal{{$gv->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      	<div class="modal-dialog" role="document">
	        <div class="modal-content">
	          	<div class="modal-header text-center">
	            	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            	<h3 class="modal-title" id="myModalLabel" style="color: blue">CHI TIẾT GIẢNG VIÊN</h4>
	            	<h4>{{$gv->MaGV}} - {{$gv->HoGV}} {{$gv->TenGV}}</h3>
	          	</div>
	          	<div class="modal-body">
		            <table class="table table-bordered table-striped" style="border: none;width: 100%;">
			    			<tr>
		    					<th>Mã giảng viên</th>
		    					<td id="MaGV">{{$gv->MaGV}}</td>
			    			</tr>
			    			<tr>
			    				<th>Họ và tên</th>
			    				<td>
			    					{{$gv->HoGV}}
			    					{{$gv->TenGV}}
			    				</td>
			    			</tr>
			    			<tr>
		    					<th>Ngày sinh</th>
		    					<td>{{$gv->NgaySinh}}</td>
			    			</tr>
			    			<tr>
		    					<th>Giới tính</th>
		    					<td>{{$gv->GioiTinh}}</td>
			    			</tr>
			    			<tr>
		    					<th>Số điện thoại</th>
		    					<td>{{$gv->SDT}}</td>
			    			</tr>
			    			<tr>
		    					<th>Bộ môn</th>
		    					<td>
		    						@foreach ($bomon as $bm)
		    							@if ($bm->id == $gv->idBoMon)
		    							{{$bm->TenBM}}
		    							@endif
		    						@endforeach
		    					</td>
			    			</tr>
		    		</table>
		    <!-- <div class="panel panel-primary">
			  	<div class="panel-heading text-center">
			  		<label>Quyền người dùng</label>
		  		</div>
		  		<ul class="list-group">
			  		<li class="list-group-item">
	                    Người dùng bình thường
	                    <div class="material-switch pull-right">
	                    	@if ($normal == true)
	                        <input checked id="normal" name="normal-user" type="checkbox"/>
	                        @else
	                        <input id="normal" name="normal-user" type="checkbox"/>
	                        @endif
	                        <label for="normal" class="label-success"></label>
	                    </div>
	                </li>
	                <li class="list-group-item">
	                    Người dùng quản lý
	                    <div class="material-switch pull-right">
	                    	@if ($manager == true)
	                        <input checked id="manager" name="manager" type="checkbox"/>
	                        @else
	                        <input id="manager" name="manager" type="checkbox"/>
	                        @endif
	                        <label for="manager" class="label-success"></label>
	                    </div>
	                </li>
	                <li class="list-group-item">
	                    Administrator
	                    <div class="material-switch pull-right">
                   		 	@if ($admin == true)
	                        <input checked id="admin" name="admin" type="checkbox"/>
	                        @else
	                        <input id="admin" name="admin" type="checkbox"/>
	                        @endif
	                        <label for="admin" class="label-success"></label>
	                    </div>
	                </li>
	            </ul>
			</div> -->
			<div class="panel panel-primary">
			  	<div class="panel-heading text-center">
			  		<label>Quyền người dùng</label>
		  		</div>
		  		<ul class="list-group">
		  		@foreach($role_user as $ru)
		  			@if($ru->user_id == $gv->id and $ru->role_id == 1)
			  		<li class="list-group-item">
			  			<label>Admin</label><div class="material-switch pull-right">
			  			<input checked id="admin" name="admin-user" type="checkbox"/>
			  			</div>
	                </li>
	                @endif
			  		@if($ru->user_id == $gv->id and $ru->role_id == 2)
			  		<li class="list-group-item">
			  			<label>Quản lý</label><div class="material-switch pull-right"><input checked id="manager" name="manager-user" type="checkbox"/></div>
	                </li>
	            	@endif
	            	@if($ru->user_id == $gv->id and $ru->role_id == 3)
			  		<li class="list-group-item">
			  			<label>Giảng viên</label><div class="material-switch pull-right"><input checked id="normal" name="normal-user" type="checkbox"/></div>
	                </li>
	            	@endif
		  		@endforeach
			</div>
	          	</div>
	          	<div class="modal-footer">
	            	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	          	</div>
	        </div>
      	</div>
    </div>
@endforeach
@endsection