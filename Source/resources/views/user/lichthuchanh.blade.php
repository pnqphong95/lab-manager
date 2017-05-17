@section('title')
Lịch thực hành
@endsection
@extends('layout.index')


@section('main')
<div class="row">
	<div class="col-lg-12">
		<div class="white-well">			
			<ul class="nav nav-tabs">
			    <li class="active"><a href="user/lichthuchanh#TKB"><h4>Lịch dạy (TKB)</h4></a></li>
			    <li><a href="user/lichthuchanh#lich"><h4>Lịch dạy chi tiết</h4></a></li>
			    <li><a href="user/lichthuchanh#choduyet"><h4>Yêu cầu chờ duyệt</h4></a></li>
  			</ul>
  			@if(session('thongbao'))
		        <div class="alert alert-success">		      
	                {!!session('thongbao')!!}
		           
		        </div>
		    @endif
  			<div class="tab-content">
  				<div id="TKB" class="tab-pane fade in active">
					<h4>Tuần</h4>
					<div class="checkbox">						
						@foreach($allTuan as $tu1)
					  	<label class="radio-inline">
						  	<input type="checkbox" name="checkboxTuan" class="checkboxTuan" value="{{$tu1->id}}"> {{$tu1->TenTuan}}
						</label>				
						@endforeach
					</div>
					@foreach ($allTuan as $tu)
					<table id="idTuan{{$tu->id}}" class="table table-bordered trLich">
						<thead>	
							<tr>
								<th colspan="8">
									<span>Lịch dạy tuần {{$tu->TenTuan}}</span>
								</th>
							</tr>
							<tr>
								<th width="9%">Buổi</th>
								<th width="13%">Thứ 2</th>		
								<th width="13%">Thứ 3</th>
								<th width="13%">Thứ 4</th>
								<th width="13%">Thứ 5</th>
								<th width="13%">Thứ 6</th>
								<th width="13%">Thứ 7</th>
								<th width="13%">Chủ nhật</th>
							</tr>	
						</thead>
						<tbody>
							<tr>
								<td>
									<span>Sáng</span>
								</td>
								<td id="{{$tu->id}}2s">
								</td>		
								<td id="{{$tu->id}}3s"></td>
								<td id="{{$tu->id}}4s"></td>
								<td id="{{$tu->id}}5s"></td>
								<td id="{{$tu->id}}6s"></td>
								<td id="{{$tu->id}}7s"></td>
								<td id="{{$tu->id}}8s"></td>
							</tr>	
							<tr>
								<td>
									<span>Chiều</span>
								</td>
								<td id="{{$tu->id}}2c"></td>		
								<td id="{{$tu->id}}3c"></td>
								<td id="{{$tu->id}}4c"></td>
								<td id="{{$tu->id}}5c"></td>
								<td id="{{$tu->id}}6c"></td>
								<td id="{{$tu->id}}7c"></td>
								<td id="{{$tu->id}}8c"></td>
							</tr>						
						</tbody>				
					</table>
					@endforeach
				</div> <!-- div#TKB -->
  				<div id="lich" class="tab-pane fade in">
					<h4>Chỉ hiển thị tuần</h4>
					<div class="checkbox">
						<label class="radio-inline">
						  	<input type="radio" name="selectTuan" class="selectTuan" id="all" value="all" checked> Tất cả
						</label>
						@foreach($allTuan as $tu1)
					  	<label class="radio-inline">
						  	<input type="radio" name="selectTuan" class="selectTuan" value="{{$tu1->id}}"> {{$tu1->TenTuan}}
						</label>				
						@endforeach
					</div>
					<table class="table table-bordered">
						<thead>	
							<tr>
								<th>Tuần</th>		
								<th>Thứ</th>
								<th>Buổi</th>
								<th>Phòng</th>								
								<th>Tên học phần</th>
								<th>Nhóm</th>
								<th width="10%">Hành động</th>
							</tr>	
						</thead>
						<tbody>
						@foreach($lich1 as $l)
							<tr class="tuan{{$l->idTuan}} trLich">
								<td>
									@foreach($allTuan as $tu)
										@if($tu->id == $l->idTuan)
											{{$tu->TenTuan}}
										@endif
									@endforeach
								</td>
								<td>
									@foreach($allThu as $thu)
										@if($thu->id == $l->idThu)
											{{$thu->TenThu}}
										@endif
									@endforeach
								</td>
								<td>
									@foreach($allBuoi as $b)
										@if($b->id == $l->idBuoi)
											{{$b->TenBuoi}}
										@endif
									@endforeach
								</td>
								<td>
									@foreach($allPhong as $p)
										@if($p->id == $l->idPhong)
											{{$p->TenPhong}}
										@endif
									@endforeach
								</td>
								<td>
									@foreach($allMonHoc as $mh)
										@if($mh->id == $l->idMonHoc)
											{{$mh->TenMH}}
										@endif
									@endforeach
								</td>
								<td>{{$l->Nhom}}</td>								
								<td>
									<a class="btn btn-xs btn-danger xnxoa" href="/user/xoalichCN/{{$l->id}}">Xóa</a>
								</td>
							</tr>
						@endforeach
						</tbody>				
					</table>
				</div> <!-- div#lich -->

				<div id="choduyet" class="tab-pane fade in">
					<table style="margin-top: 5px;" class="table table-bordered" style="text-align: center;">
						<thead>
							<tr>								
								<th width="">Môn học</th>
								<th width="">Nhóm</th>
								<th width="">Thứ</th>
								<th width="">Buổi</th>
								<th width="">Tuần</th>  	
								<th width="23%">Trạng thái</th>							
							</tr>
						</thead>
						<tbody>
							@foreach ($allLichCD as $lichCD)
					      	<tr>						        								        	
					        	<td>
					        		@foreach($allMonHoc as $mh)
										@if($mh->id == $lichCD->idMonHoc)
											{{$mh->TenMH}}
										@endif
									@endforeach
					        	</td>
					        	<td>{{$lichCD->Nhom}}</td>
					        	<td>
					        		@foreach($allThu as $thu)
										@if($thu->id == $lichCD->idThu)
											{{$thu->TenThu}}
										@endif
									@endforeach
					        	</td>
					        	<td>
									@foreach($allBuoi as $b)
										@if($b->id == $lichCD->idBuoi)
											{{$b->TenBuoi}}
										@endif
									@endforeach
								</td>
					        	<td>
									@foreach($allTuan as $tu)
										@if($tu->id == $lichCD->idTuan)
											{{$tu->TenTuan}}
										@endif
									@endforeach
								</td>
								<td>
									@if ($lichCD->TrangThai == 0)
									<span>Chưa xử lý</span>
									@elseif ($lichCD->TrangThai == 1)
									<span>Đã xếp phòng</span>
									@else
									<span>Đã bị từ chối</span>
									@endif
									@foreach ($arrDangXuLy as $xl)
									@if ($lichCD->id == $xl->idChoDuyet)
									@foreach ($allBM as $abm1)
									@if ($abm1->id == $xl->idBoMon)
									<span id="idLCD{{$lichCD->id}}">({{$abm1->TenVietTat}})</span>
									@endif
									@endforeach
									@endif
									@endforeach
								</td>
				     	 	</tr>
				     	 	@endforeach
				     	 </tbody>
				    </table>
				</div>
			</div> <!-- div.tab-content -->
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function (){

		@foreach ($lich as $l2)
			@if ($l2->idBuoi == 1)
		$('#' + {{$l2->idTuan}} + {{$l2->idThu}} + 's').append("<span>{{$l2->MaMH}}/{{$l2->Nhom}} - {{$l2->TenPhong}}</span><br>");
			@else
		$('#' + {{$l2->idTuan}} + {{$l2->idThu}} + 'c').append("<span>{{$l2->MaMH}}/{{$l2->Nhom}} - {{$l2->TenPhong}}</span><br>");
			@endif
		@endforeach

		$('.selectTuan').on("click", function () {

				var idTuan = $(this).val();
				if($(this).prop("checked") == true){
	                $(".trLich").addClass('my-hidden');
	                $('#idTuan'+ idTuan).removeClass('my-hidden');
	                $('.tuan'+ idTuan).removeClass('my-hidden');
	            }
	            else 
	        	if($(this).prop("checked") == false){
	     			$(".trLich").removeClass('my-hidden');
	            }    

	            if (idTuan == 'all') $(".trLich").removeClass('my-hidden');
   
            
		});

		$('.checkboxTuan').on("click", function () {

				var idTuan = $(this).val();
				if($(this).prop("checked") == true){
	                $('#idTuan'+ idTuan).removeClass('my-hidden');
	                //$('.tuan'+ idTuan).removeClass('my-hidden');
	            }
	        	if($(this).prop("checked") == false){
	     			//$(".trLich").removeClass('my-hidden');
	     			$('#idTuan'+ idTuan).addClass('my-hidden');
	            } 
   
            
		});

		@foreach ($allTuan as $tu)

		$('#idTuan'+{{$tu->id}}).addClass('my-hidden');
		@endforeach
		$('#idTuan1').removeClass('my-hidden');
	});

	$(document).ready(function(){
	    $(".nav-tabs a").click(function(){
	        $(this).tab('show');
	    });
	});

	$( document ).ready(function() {

    	$(".xnxoa").click(function() {
		  	return confirm('Bạn có xóa lịch của phòng vừa chọn?');
		});

		$(".xnthuhoi").click(function() {
		  	return confirm('Bạn có muốn thu hồi lại phòng vừa chọn?');
		});


	});

</script>
@endsection