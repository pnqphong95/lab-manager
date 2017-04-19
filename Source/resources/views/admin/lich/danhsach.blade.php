@extends('admin.layout.index')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="white-well">			
			<ul class="nav nav-tabs">
			    <li class="active"><a href="admin/lich/danhsach#lich"><h4>Lịch thực hành</h4></a></li>
			    <li><a href="admin/lich/danhsach#choduyet"><h4>Yêu cầu chờ duyệt</h4></a></li>
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
				    <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="text-align: center;">
						<thead>
							<?php 
								$i=0;
							 ?>
							<tr>
								<th width="5%">STT</th>
								<th width="15%">Giáo viên</th>
								<th width="10%">Môn học</th>
								<th width="10%">Nhóm</th>
								<th width="10%">Thứ</th>
								<th width="10%">Buổi</th>
								<th width="10%">Tuần</th>
								<th width="10%">Phòng</th>     								
							</tr>
						</thead>
						<tbody>
							@foreach ($allLichCD as $lichCD)
								<?php 
									$i++;
								?>
					      	<tr>						        							<td>{{$i}}</td>     	
								<td>
									@foreach($allGiaoVien as $gv)
										@if($gv->id == $lichCD->idGiaoVien)
											{{$gv->TenGV}}
										@endif
									@endforeach	
								</td>
					        	<td>
					        		@foreach($allMonHoc as $mh)
										@if($mh->id == $lichCD->idMonHoc)
											{{$mh->TenMH}}
										@endif
									@endforeach
					        	</td>
					        	<td>{{$lichCD->Nhom}}</td>
					        	<td>{{$lichCD->idThu}}</td>
					        	<td>
					        	@foreach($allBuoi as $b)
										@if($b->id == $lichCD->idBuoi)
											{{$b->TenBuoi}}
										@endif
									@endforeach
					        	</td>
					        	<td>{{$lichCD->idTuan}}</td> 
					        	<td>
					        		<form action="" type="post">
					        			<input type="hidden" name="idLichCD" value="{{$lichCD->id}}">
					        			<button class="btn btn-info btn-xs btn-xepphong" type="button">Xếp phòng</button>
					        		</form>
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