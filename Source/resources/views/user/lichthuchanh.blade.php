@section('title')
Lịch thực hành
@endsection
@extends('layout.index')


@section('main')
<div class="row">
	<div class="col-lg-12">
		<div class="white-well">			
			<ul class="nav nav-tabs">
			    <li class="active"><a href="user/lichthuchanh#lich"><h4>Lịch dạy thực hành</h4></a></li>
			    <li><a href="user/lichthuchanh#choduyet"><h4>Yêu cầu chờ duyệt</h4></a></li>
  			</ul>

  			<div class="tab-content">
  				<div id="lich" class="tab-pane fade in active">
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
								<th>Mã HP</th>
								<th>Nhóm</th>
								<th>Tên học phần</th>
								<th>Buổi</th>
								<th>Phòng</th>
							</tr>	
						</thead>
						<tbody>
						@foreach($lich as $l)
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
									@foreach($allMonHoc as $mh)
										@if($mh->id == $l->idMonHoc)
											{{$mh->MaMH}}
										@endif
									@endforeach
								</td>
								<td>{{$l->Nhom}}</td>
								<td>
									@foreach($allMonHoc as $mh)
										@if($mh->id == $l->idMonHoc)
											{{$mh->TenMH}}
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
							</tr>
						@endforeach
						</tbody>				
					</table>
				</div> <!-- div#lich -->

				<div id="choduyet" class="tab-pane fade in">
					<table style="margin-top: 5px;" class="table table-bordered" style="text-align: center;">
						<thead>
							<tr>								
								<th width="13%">Môn học</th>
								<th width="13%">Nhóm</th>
								<th width="13%">Thứ</th>
								<th width="13%">Buổi</th>
								<th width="13%">Tuần</th>  								
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
		$('.selectTuan').on("click", function () {
			if( $(this).val() == 'all')
			{
				$(".trLich").removeClass('my-hidden');
			}
			else
			{
				var idTuan = $(this).val();
				if($(this).prop("checked") == true){
	                $(".trLich").addClass('my-hidden');
	                $('.tuan'+ idTuan).removeClass('my-hidden')
	            }
	            else 
	        	if($(this).prop("checked") == false){
	     			$(".trLich").removeClass('my-hidden');
	            }            	
			}        
            
		});
	});

	$(document).ready(function(){
	    $(".nav-tabs a").click(function(){
	        $(this).tab('show');
	    });
	});

</script>
@endsection