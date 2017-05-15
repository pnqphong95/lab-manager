@section('title')
Danh sách các vấn đề
@endsection
@extends('layout.index')

@section('main')
<div class="row">
	<div class="col-md-12" style="padding-top: 10px">
		<div class="white-well">
			@if(session('thongbao'))
		        <div class="alert alert-success">		      
	                {!!session('thongbao')!!}
		           
		        </div>
		    @endif
		    @if(session('loi'))
		        <div class="alert alert-warning">		      
	                {!!session('loi')!!}
		        </div>
		    @endif
			<table width="100%">
				<tr>
					<td style="text-align: left;">
						<h3 class="page-header">DANH SÁCH VẤN ĐỀ</h3>
					</td>
				</tr>
			</table>

			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th>Mã vấn đề</th>
						<th>Tên Phòng</th>
						<th>Tên vấn đề</th>
						<th>Người gửi</th>
						<th>Người xử lý</th>
						<th>Trạng thái</th>
						@role('manager')
						<th>Hành động</th>
						@endrole
						<th>Chi tiết</th>     								
					</tr>
				</thead>
				<tbody>
					@foreach ($allVanDe as $vd)
			      	<tr>
			      		<td>{{$vd->id}}</td>
			      		<td>
			      		@foreach($allPhong as $p)
			      			@if($p->id == $vd->idPhong)
			      				{{$p->TenPhong}}
			      			@endif
			      		@endforeach	
			      		</td>
			      		<td>{{$vd->tomTatVD}}</td>
			      		<td>
			      		@foreach($allGiaoVien as $gv)
			      			@if($gv->id == $vd->nguoiBaoCao)
			      				{{$gv->TenGV}}
			      			@endif
			      		@endforeach
			      		</td>
			      		<td>
			      		@foreach($allGiaoVien as $gv1)
			      			@if($gv1->id == $vd->nguoiNhan)
			      				{{$gv1->TenGV}}
			      			@endif
			      		@endforeach
			      		</td>
			      		<td>
			      			@if($vd->trangThai == 0)
			      				Chưa xử lý
			      			@else
			      				Đã xử lý
			      			@endif
			      		</td>
			      		@role('manager')
			      		<td>	
			      		@if($vd->trangThai == 0)		        		
		        			<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#xuly{{$vd->id}}">Xử lý</button>
	        			@endif
		        			<!-- <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#chuyen{{$vd->id}}"
		        			@if($vd->trangThai == 1)
	        				disabled
	        				@endif
		        			>Chuyển yêu cầu</button> -->
	        			</td>
	        			@endrole
			      		<td>
			      			<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal{{$vd->id}}">Xem</button>
			      		</td>			      		
			      	</tr>
		     	 	@endforeach
		     	 </tbody>
		    </table>
		</div>
	</div> 
</div>

@foreach ($allVanDe as $vd)
<div class="modal fade" id="myModal{{$vd->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
	    <div class="modal-content">
	        <div class="modal-header">
	         	<button type="button" class="close" data-dismiss="modal">&times;</button>
	          	<h4 class="modal-title">Lịch sử xử lý vấn đề</h4>
	        </div>
	        <div class="modal-body">
         		<table class="table table-bordered">
					<thead>	
						<tr>
							<th>STT</th>		
							<th>Bộ môn nhận</th>
							<th>Thời gian nhận</th>
							<th>Ghi chú</th>
							<th>Trạng thái</th>
						</tr>	
					</thead>
					<tbody id="lschuyen">
					<?php $i=0; ?>
					@foreach($ls_vande as $ls)
					@if($ls->idVanDe == $vd->id)
						<?php $i++; ?>
						<tr>
							<td>{{$i}}</td>
							<td>
								@foreach($allBoMon as $bm)
									@if($bm->id == $ls->nguoiNhan)
										{{$bm->TenBM}}
									@endif
								@endforeach
							</td>
							<td>{{$ls->ngayNhan}}</td>
							<td>{{$ls->ghiChu}}</td>
							<td>
								{{$ls->trangThai}}
							</td>
						</tr>
					@endif
					@endforeach
					</tbody>				
				</table>
	        </div>
	        <div class="modal-footer">
	          	<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
	        </div>
	    </div>
    </div>
</div>

<div class="modal fade" id="xuly{{$vd->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
	    <div class="panel panel-primary">
	        <div class="panel-heading">
	         	<button type="button" class="close" data-dismiss="modal">&times;</button>
	          	<h4 class="modal-title text-center">Xử lý vấn đề</h4>
	        </div>
	        <div class="modal-body text-center">
         		<form action="user/vande/xuly" method="post">
         			<input type="hidden" name="_token" value="{{ csrf_token() }}">
         			<input type="hidden" name="idVanDe" value="{{$vd->id}}">
         			<div class="form-group form-horizontal">
	         			<label class="text-center">Ghi chú</label>
	         			<input type="text" class="form-control" name="ghiChu">
	         		</div>
	         		<center><button type="submit" class="btn btn-primary">Xử lý</button></center>
         		</form>
	        </div>
	    </div>
    </div>
</div>

<div class="modal fade" id="chuyen{{$vd->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
	    <div class="panel panel-primary">
	        <div class="panel-heading">
	         	<button type="button" class="close" data-dismiss="modal">&times;</button>
	          	<h4 class="modal-title text-center">Chuyển yêu cầu xử lý vấn đề</h4>
	        </div>
	        <div class="modal-body text-center">
         		<form action="user/vande/chuyen" method="post">
         			<input type="hidden" name="_token" value="{{ csrf_token() }}">
         			<input type="hidden" name="idVanDe" value="{{$vd->id}}">
         			<div class="form-group form-horizontal">
	         			<label class="text-center">Chuyển đến</label>
	         			<select name="nguoiNhan" class="form-control">
	         				@if(Auth::user()->id == 1)
		         				@foreach($allBoMon as $bm)
		         					<option value="{{$bm->id}}">{{$bm->TenBM}}</option>
		         				@endforeach
	         				@else
	         					<option value="1">Admin</option>
	         				@endif
	         			</select>
	         		</div>
         			<div class="form-group form-horizontal">
	         			<label class="text-center">Ghi chú</label>
	         			<input type="text" class="form-control" name="ghiChu">
	         		</div>
	         		<center><button type="submit" class="btn btn-primary">Chuyển tiếp</button></center>
         		</form>
	        </div>
	    </div>
    </div>
</div>
@endforeach
@endsection