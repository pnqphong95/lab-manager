@section('title')
Danh sách các vấn đề
@endsection
@extends('layout.index')


@section('main')
<?php $thisPage = 'vande';?>
<div class="row">
	<div class="col-lg-12">
		<div class="white-well">
			<h3>Danh sách các yêu cầu chưa được xếp phòng</h3>
			<hr>

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
			
			<table class="table table-bordered" style="text-align: center;">
				<thead>
					<tr>
						<th style="border-color: #4296CA" bgcolor="#4296CA" colspan="9">Các yêu cầu trong bộ môn</th>
					</tr>
					<tr>
						<th>Giáo viên</th>
						
						<th>Môn học</th>
						<th>Nhóm</th>
						<th>Thứ</th>
						<th>Buổi</th>
						<th>Tuần</th>
						<th>Bộ môn trợ giúp </th>
						<th>Lịch sử</th>
						<th>Hành động</th>     								
					</tr>
				</thead>
				<tbody>
					@foreach ($allLichCD as $lichCD)
			      	<tr>						        								        	
						<td>
							@foreach ($allGiaoVien as $gv)
								@if ($gv->id == $lichCD->idGiaoVien)
									{{$gv->TenGV}} ({{$gv->MaGV}})
								@endif
							@endforeach
						</td>
			        	<td>
			        		@foreach ($allMonHoc as $mh)
			        			@if ($mh->id == $lichCD->idMonHoc)
			        				{{$mh->TenMH}}
			        			@endif
		        			@endforeach
	        			</td>
			        	<td>{{$lichCD->Nhom}}</td>
			        	<td>
			        		@foreach ($allThu as $th)
			        			@if ($th->id == $lichCD->idThu)
			        				{{$th->TenThu}}
			        			@endif
		        			@endforeach
			        	</td>
			        	<td>
			        		@foreach ($allBuoi as $bu)
			        			@if ($bu->id == $lichCD->idBuoi)
			        				{{$bu->TenBuoi}}
			        			@endif
		        			@endforeach
			        	</td>
			        	<td>
			        		@foreach ($allTuan as $tu)
			        			@if ($tu->id == $lichCD->idTuan)
			        				{{$tu->TenTuan}}
			        			@endif
		        			@endforeach
			        	</td>
			        	<td>
			        		@foreach ($allBoMon as $bm)
			        			@if ($bm->id == $lichCD->idBMDuyet)
			        				{{$bm->TenBM}}
			        			@endif
		        			@endforeach
			        	</td>
			        	<td>
		        			<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal{{$lichCD->id}}">Xem lịch sử</button>
			        	</td>
			        	<td>			        		
		        			<a href="user/xepphong/{{Crypt::encrypt($lichCD->id)}}" class="btn btn-primary btn-xs btn-xepphong">Xếp phòng</a>	
		        			<a href="user/xepphongtuchoi/{{Crypt::encrypt($lichCD->id)}}" class="btn btn-danger btn-xs">Từ chối</a>
	        			</td>
	     	 		</tr>
		     	 	@endforeach
		     	 </tbody>
		    </table>

		    <table class="table table-bordered" style="text-align: center;">
				<thead>
					<tr>
						<th style="border-color: #4296CA" bgcolor="#4296CA" colspan="7">Các yêu cầu từ bộ môn khác</th>
					</tr>
					<tr>
						<th width="13%">Bộ môn yêu cầu</th>
						
						<th width="13%">Môn học</th>
						<th width="9%">Nhóm</th>
						<th width="13%">Thứ</th>
						<th width="13%">Buổi</th>
						<th width="13%">Tuần</th>
						<th width="13%">Hành động</th>     								
					</tr>
				</thead>
				<tbody>
					@foreach ($allLCDYeuCau as $lichCD)
			      	<tr>						        								        	
						<td>
							@foreach ($allGiaoVien as $gv)
								@if ($gv->id == $lichCD->idGiaoVien)
									{{$gv->TenGV}} ({{$gv->MaGV}})
								@endif
							@endforeach
						</td>
			        	<td>
			        		@foreach ($allMonHoc as $mh)
			        			@if ($mh->id == $lichCD->idMonHoc)
			        				{{$mh->TenMH}}
			        			@endif
		        			@endforeach
	        			</td>
			        	<td>{{$lichCD->Nhom}}</td>
			        	<td>
			        		@foreach ($allThu as $th)
			        			@if ($th->id == $lichCD->idThu)
			        				{{$th->TenThu}}
			        			@endif
		        			@endforeach
			        	</td>
			        	<td>
			        		@foreach ($allBuoi as $bu)
			        			@if ($bu->id == $lichCD->idBuoi)
			        				{{$bu->TenBuoi}}
			        			@endif
		        			@endforeach
			        	</td>
			        	<td>
			        		@foreach ($allTuan as $tu)
			        			@if ($tu->id == $lichCD->idTuan)
			        				{{$tu->TenTuan}}
			        			@endif
		        			@endforeach
			        	</td> 
			        	<td>			        		
		        			<a href="user/xepphong/{{Crypt::encrypt($lichCD->id)}}" class="btn btn-info btn-xs btn-xepphong">Xếp phòng</a>	
		        			<a href="user/travebm/{{Crypt::encrypt($lichCD->id)}}" class="btn btn-warning btn-xs btn-tuchoi">Trả về BM</a>
	        			</td>
	     	 		</tr>
		     	 	@endforeach
		     	 </tbody>
		    </table>

		</div> <!-- <div class="white-well"> -->
	</div> <!-- <div class="col-lg-12"> -->

</div> <!-- <div class="row"> -->
@foreach ($allLichCD as $lichCD)
	  <!-- Modal -->
	  	<div class="modal fade" id="myModal{{$lichCD->id}}" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
			    <div class="modal-content">
			        <div class="modal-header">
			         	<button type="button" class="close" data-dismiss="modal">&times;</button>
			          	<h4 class="modal-title">Lịch sử yêu cầu</h4>
			        </div>
			        <div class="modal-body">
			         	
		         		<table class="table table-bordered">
							<thead>	
								<tr>
									<th>STT</th>		
									<th>Bộ môn nhận</th>
									<th>Thời gian nhận</th>
									<th>Trạng thái</th>
								</tr>	
							</thead>
							<tbody id="lschuyen">
							<?php $i=0; ?>
							@foreach($ls_choduyet as $ls)
							@if($ls->idChoDuyet == $lichCD->id)
								<?php $i++; ?>
								<tr>
									<td>{{$i}}</td>
									<td>
										@foreach($allBoMon as $bm)
											@if($bm->id == $ls->idBMNhan)
												{{$bm->TenBM}}
											@endif
										@endforeach
									</td>
									<td>{{$ls->ngayNhan}}</td>
									<td>
										Đã chuyển
									</td>
								</tr>
							@endif
							@endforeach
							</tbody>				
						</table>
			         	
			        </div>
			        <div class="modal-footer">
			          	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
			    </div>
		      
		    </div>
	  	</div>
	  	<div id="myModal" class="modal fade" role="dialog">
	  	<div class="modal-dialog">
	    <!-- Modal content-->
	    	<div class="modal-content">
	    		<form action="user/xepphong/xintrogiup/gui" method="post">
	    			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal">&times;</button>
		        		<h4 class="modal-title">Xin trợ giúp phòng</h4>
		      		</div>
		      		<div class="modal-body">
		      			<label>Chọn bộ môn bạn muốn xin trợ giúp</label>
		      			<input class="form-control" type="text" name="idLichCD" value="{{ $lichCD->id }}">
		        		<select class="form-control" name="idBoMon" class="form-control">
		        			@foreach ($allBoMon as $bm)
		        			<option value="{{$bm->id}}">{{$bm->TenBM}}</option>	
		        			@endforeach
		        		</select>
		      		</div>
		      		<div class="modal-footer">
		      			<button class="btn btn-warning" type="submit">Gửi trợ giúp</button>
		        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      		</div>
	      		</form>
	    	</div>

	  	</div>
	</div>
	@endforeach

@endsection

@section('script')
<script type="text/javascript">
	$( document ).ready(function() {

    	$(".btn-tuchoi").click(function() {
		  	return confirm('Bạn có chắc muốn từ chối yêu cầu?');
		});

		$( "#lschuyen tr:last-child td:last-child").html("Đang xử lý");
	});

</script>
@endsection