@extends('admin.layout.index')

@section('content')
<?php $thisPage = 'vande';?>
<div class="row">
	<div class="col-lg-12">
		<div class="white-well">
			<h3>Điều chỉnh lịch thực hành</h3>
			<hr>

			<h4>Tuần</h4>
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
								<th>Hành động</th>
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
								<td>
									<a class="btn btn-info btn-xs" href="#">Đổi phòng</a>
									<a class="btn btn-danger btn-xs" href="#">Xóa</a>
								</td>
							</tr>
						@endforeach
						</tbody>				
					</table>

		</div> <!-- <div class="white-well"> -->
	</div> <!-- <div class="col-lg-12"> -->

</div> <!-- <div class="row"> -->
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