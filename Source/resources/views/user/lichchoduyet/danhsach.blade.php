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
						<th style="border-color: #4296CA" bgcolor="#4296CA" colspan="8">Các yêu cầu trong bộ môn</th>
					</tr>
					<tr>
						<th>Giáo viên</th>
						
						<th>Môn học</th>
						<th>Nhóm</th>
						<th>Thứ</th>
						<th>Buổi</th>
						<th>Tuần</th>
						<th>Bộ môn trợ giúp </th>
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
		        			<a href="user/xepphong/{{Crypt::encrypt($lichCD->id)}}" class="btn btn-info btn-xs btn-xepphong">Xếp phòng</a>	
		        			<a href="user/xepphongtuchoi/{{Crypt::encrypt($lichCD->id)}}" class="btn btn-danger btn-xs btn-tuchoi">Từ chối</a>
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
@endsection

@section('script')
<script type="text/javascript">
	$( document ).ready(function() {

    	$(".btn-tuchoi").click(function() {
		  	return confirm('Bạn có chắc muốn từ chối yêu cầu?');
		});
	});

</script>
@endsection