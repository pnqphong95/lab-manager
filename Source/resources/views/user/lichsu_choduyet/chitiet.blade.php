@extends('admin.layout.index')
@section('title')
Vấn đề - Danh sách
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12 text-center" style="color: blue"><h2>DANH SÁCH YÊU CẦU CHỜ DUYỆT</h2></div>
<div class="col-md-12 text-center" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="user/lichsu_choduyet/danhsach"><span class="glyphicon glyphicon-plus"></span>  DANH SÁCH</a>
</div>

<div class="col-md-12" style="padding-top: 10px">
	<div class="panel panel-primary">
		<div class="panel-heading text-center">THÔNG TIN YÊU CẦU CHỜ DUYỆT</div>
		<div class="panel-body">
			<div class="col-lg-6">
				<div class="panel panel-info">
					<div class="panel-heading">
						<label>Mã yêu cầu: {{$lichCD->id}}</label>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4">
								<label>Tình trạng</label>
							</div>
							<div class="col-md-8">
								@if($lichCD->TrangThai == 0)
									Chưa được xếp phòng
								@elseif ($lichCD->TrangThai == 1)
									Đã xếp phòng
								@else
									Bị hủy yêu cầu
								@endif
							</div>
						</div>
						<!-- <div class="row">
							<div class="col-md-4">
								<label>Môn học - Nhóm</label>
							</div>
							<div class="col-md-8">
								@foreach($allMonHoc as $mh)
									@if($mh->id == $lichCD->idMonHoc)
										{{$mh->TenMH}}
									@endif
								@endforeach
							</div>
						</div> -->
						<div class="row">
							<div class="col-md-4">
								<label>Giảng viên</label>
							</div>
							<div class="col-md-8">
								@foreach($allGiaoVien as $gv)
									@if($gv->id == $lichCD->idGiaoVien)
										Tên: {{$gv->HoGV}} {{$gv->TenGV}}<br>
										Mã: {{$gv->MaGV}}<br>
										Email: {{$gv->Email}}<br>
										SDT: {{$gv->SDT}}
									@endif
								@endforeach
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label>Bộ môn xử lý</label>
							</div>
							<div class="col-md-8">
								@foreach($allBoMon as $bm)
									@foreach($allGiaoVien as $gv)
										@if($gv->id == $lichCD->idGiaoVien && $gv->idBoMon == $bm->id)
											{{$bm->TenBM}}
										@endif
									@endforeach
								@endforeach
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label>Thời gian gửi</label>
							</div>
							<div class="col-md-8">
								{{$lichCD->ngayGui}}
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">THÔNG TIN YÊU CẦU CHỜ DUYỆT</div>
					<div class="panel-body">
						<table class="table table-bordered">
							<thead>	
								<tr>
									<th>Môn học</th>
									<th>Nhóm</th>
									<th>Tuần</th>
									<th>Thứ</th>
									<th>Buổi</th>
								</tr>	
							</thead>
							<tbody>
								<tr>
									<td>
										@foreach($allMonHoc as $mh)
											@if($mh->id == $lichCD->idMonHoc)
												{{$mh->TenMH}}
											@endif
										@endforeach
									</td>
									<td>{{$lichCD->Nhom}}</td>
									<th>{{$lichCD->idTuan}}</th>
									<td>{{$lichCD->idThu}}</td>
									<td>
										@if($lichCD->idBuoi == 1)
											Sáng
										@endif
									</td>
								</tr>
							</tbody>				
						</table>
					</div>	
				</div>
			</div>
			<div class="col-lg-6">
				<label>Các phòng còn trống trong bộ môn</label>
				<form id="form1" action="user/xepphong/{{Crypt::encrypt($lichCD->id)}}" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					@foreach ($nullPhong as $ph)
					<div class="radio">
							<label>
								<input type="radio" name="idPhong" value="{{$ph}}">
								@foreach ($allPhong as $ph1)
									@if ($ph1->id == $ph)
										{{$ph1->TenPhong}}
									@endif
								@endforeach
						</label>
					</div>
					@endforeach	

					@if (count ($nullPhong) == 0)
						<div class="alert alert-warning">
								Bộ môn không còn phòng trống!
						</div>
						<button disabled="disabled" type="submit" class="btn btn-info">Duyệt</button>
						<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal2">Xin trợ giúp phòng</button>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
						 	Từ chối
						</button>
					@else
						<button type="submit" class="btn btn-info">Duyệt</button>
						<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal2">Xin trợ giúp phòng</button>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
						 	Từ chối
						</button>
					@endif						
				</form>
			</div>
		</div>
	</div>
</div>
<!-- <div class="col-md-12" style="padding-top: 10px">
	<div class="panel panel-primary">
		<div class="panel-heading text-center">
			THÔNG TIN CHI TIẾT VÁN ĐỀ
		</div>
		<div class="panel-body">
			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading">
						<label>Mã yêu cầu: </label>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4">
								<label>Tình trạng</label>
							</div>
							<div class="col-md-8">
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label>Môn học - Nhóm</label>
							</div>
							<div class="col-md-8">
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label>Giảng viên</label>
							</div>
							<div class="col-md-8">
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>Thời gian yêu cầu</label>
							</div>
							<div class="col-md-6">
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>Lịch đăng ký</label>
							</div>
							<div class="col-md-6">
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading">
						<label>Thông tin bộ phận nhận xử lý yêu cầu chờ duyệt hiện tại</label>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4">
								<label>Bộ môn:</label>
							</div>
							<div class="col-md-8">
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label>Người nhận</label>
							</div>
							<div class="col-md-8">
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label>Thời gian nhận</label>
							</div>
							<div class="col-md-8">
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>Phòng trống</label>
							</div>
							<div class="col-md-6">
								
							</div>
						</div>
						
					</div>
				</div>
			</div>

		</div>
	</div>
</div> -->
<div class="col-md-12" style="padding-top: 10px">
	<div class="panel panel-primary">
		<div class="panel-heading text-center">
			LỊCH SỬ XỬ LÝ YÊU CẦU CHỜ DUYỆT
		</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<thead>	
					<tr>
						<th>STT</th>		
						<th>Ghi chú</th>
						<th>Bộ môn nhận</th>
						<th>Thời gian nhận</th>
						<th>Trạng thái</th>
					</tr>	
				</thead>
				<tbody>
				<?php $i=0; ?>
				@foreach($ls_choduyet as $ls)
					<?php $i++; ?>
					<tr>
						<td>{{$i}}</td>
						<td>{{$ls->ghiChu}}</td>
						<td>
							@foreach($allBoMon as $bm)
								@if($bm->id == $ls->idBMNhan)
									{{$bm->TenBM}}
								@endif
							@endforeach
						</td>
						<td>{{$ls->ngayNhan}}</td>
						<td>
							@if($lichCD->TrangThai == 0)
								Chưa được xếp phòng
							@elseif ($lichCD->TrangThai == 1)
								Đã xếp phòng
							@else
								Bị hủy yêu cầu
							@endif
						</td>
					</tr>
				@endforeach
				</tbody>				
			</table>
		</div>
	</div>
</div>
<!-- modal xử lý -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
 	Xếp phòng
</button>
<div id="myModal2" class="modal fade" role="dialog">
  	<div class="modal-dialog">

    <!-- Modal content-->
    	<div class="modal-content">
    		<form action="user/lichsu_choduyet/chitiet/{{$lichCD->id}}" method="post">
    			<input type="hidden" name="_token" value="{{ csrf_token() }}">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	        		<h4 class="modal-title">Xin trợ giúp phòng</h4>
	      		</div>
	      		<div class="modal-body">
	      			<div class="form-group">
		      			<label>Ghi chú</label>
		      			<input type="text" name="ghiChu">
		      		</div>
		      		<div class="form-group">
		      			<label>Chọn bộ môn bạn muốn xin trợ giúp</label>
		      			<input type="text" name="idChoDuyet" value="{{ $lichCD->id }}">
		        		<select class="form-control" name="idBoMon">
		        			@foreach ($allBoMon as $bm)
		        			<option value="{{$bm->id}}">{{$bm->TenBM}}</option>	
		        			@endforeach
		        		</select>
		      		</div>
	      		</div>
	      		<div class="modal-footer">
	      			<button class="btn btn-warning" type="submit">Gửi trợ giúp</button>
	        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      		</div>
      		</form>
    	</div>

  	</div>
</div>
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">THỰC HIỆN XỬ LÝ YÊU CẦU CHỜ DUYỆT</h4>
		    </div>
		    <div class="modal-body">
			    <form action="user/lichsu_choduyet/xepphong/{{$lichCD->id}}" method="post">
			    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
			    	<div class="form-group form-inline">
			        	<label>Mã yêu cầu</label>
			        	<p name="idChoDuyet">{{$lichCD->id}}</p>
			        	<input type="hidden" class="form-control" name="idChoDuyet" value="{{$lichCD->id}}"></input>
			        </div>
			        <div class="form-group form-inline">
			        	<label>Ghi chú</label>
			        	<input class="form-control" name="ghiChu"></input>
			        </div>
			        <div class="form-group form-inline">
			        	<label>Đã xử lý</label>
			        	<input type="checkbox" name="check" id="check"></input>
			        </div>
			        <div class="form-group form-inline">
			        	<label>Bộ môn nhận xử lý</label>
			        	<select class="form-control kt1" name="idBMNhan">
			        		<option value="0"></option>
			        	</select>
			        </div>
			        <button type="submit" class="btn btn-primary">Thực hiện</button>
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			    </form>
		    </div>
	    </div>
	</div>
</div>

<!-- modal xin trợ giúp -->




@endsection

@section('script')
<script>
    $(document).ready(function(){
        $("#check").change(function(){
            if($(this).is(":checked")) 
            {
                $(".kt").removeAttr('disabled');
                $(".kt1").attr('disabled','');
            }
            else
            {
                $(".kt").attr('disabled','');
                $(".kt1").removeAttr('disabled');
            }
        });
    });
</script>
@endsection