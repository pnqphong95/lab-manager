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
			
			<table class="table table-bordered" style="text-align: center;">
				<thead>
					<tr>
						<th width="9%">Giáo viên</th>
						
						<th width="13%">Môn học</th>
						<th width="13%">Nhóm</th>
						<th width="13%">Thứ</th>
						<th width="13%">Buổi</th>
						<th width="13%">Tuần</th>
						<th width="13%">Phòng</th>     								
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
		        			<a href="user/xepphong/{{Crypt::encrypt($lichCD->id)}}" class="btn btn-info btn-xs btn-xepphong">Xếp phòng</a>	
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
	
</script>
@endsection