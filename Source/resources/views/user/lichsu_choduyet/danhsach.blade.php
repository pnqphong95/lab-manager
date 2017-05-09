@extends('admin.layout.index')
@section('title')
Vấn đề - Danh sách
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12 text-center" style="color: blue"><h2>DANH SÁCH YÊU CẦU CHỜ DUYỆT</h2></div>

<div class="col-md-12" style="padding-top: 10px">
	<div class="white-well">
			@if(session('thongbao'))
		        <div class="alert alert-success">		      
	                {!!session('thongbao')!!}
		           
		        </div>
		    @endif

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

			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>	
					<tr class="text-center">
						<th>Tuần</th>		
						<th>Thứ</th>
						<th>Buổi</th>
						<th>Mã HP</th>
						<th>Nhóm</th>
						<th>Tên học phần</th>
						<th>Chi tiết</th>
						<th>Trạng thái</th>
					</tr>	
				</thead>
				<tbody>
				@foreach($allLichCD as $l)
					<tr class="tuan{{$l->idTuan}} trLich text-center">
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
							<a href="user/lichsu_choduyet/chitiet/{{$l->id}}" class="btn btn-primary btn-xepphong">Chi tiết</a>
							<!-- <a href="user/lichsu_choduyet/{{$l->id}}" class="btn btn-info btn-xs btn-xepphong">Xếp phòng</a>	
		        			<a href="user/lichsu_choduyet/{{$l->id}}" class="btn btn-danger btn-xs">Từ chối</a> -->
						</td>
						<td>Chưa duyệt</td>
					</tr>
				@endforeach
				</tbody>				
			</table>

		</div> <!-- <div class="white-well"> -->
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