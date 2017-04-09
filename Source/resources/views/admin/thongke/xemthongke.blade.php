@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h1 class="page-header">Thống kê tình trạng sử dụng phòng thực hành
    </h1>
</div>
<div class="col-md-4">
	<select class="form-control" onchange="location = this.value;">
	 	<option selected value="admin/thongke/danhsach">Toàn học kỳ</option>
	 	<option value="admin/thongke/tuan">Tình trạng sử dung qua các tuần</option>
	</select>
</div>
<div class="col-md-8">
		@foreach($xemThongKe as $x)
			{{$a=$x->idTuan}}
			@break
		@endforeach

	<form method="POST" action="admin/thongke/xemthongke">
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
		<div class="col-md-2"><label>Từ tuần</label></div>
		<div class="col-md-2">
			<select class="form-control" name="tuanBD">
				@foreach($allTuan as $at)
					<option
					@if($at->id == $a)
                        {{"selected"}}
                    @endif
					value="{{$at->id}}">{{$at->id}}</option>
				@endforeach
			</select>
		</div>	
		<div class="col-md-2"><label>Đến tuần</label></div>
		<div class="col-md-2">
			<select class="form-control" name="tuanKT">
				@foreach($allTuan as $at)
					<option
					@if($at->id == 0)
                        {{"selected"}}
                    @endif
					value="{{$at->id}}">{{$at->id}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-2">
			<button class="btn btn-primary" type="submit">Xem</button>
		</div>
	</form>
	<br><br>
</div>

<div class="col-md-12">
	<div id="HK"></div>
	<h2><center>THỐNG KÊ TÌNH TRẠNG SỬ DỤNG PHÒNG TUẦN</center></h2>

</div>
@endsection

@section('script')
<script type="text/javascript" src="js/raphael-min.js"></script>

<script type="text/javascript" src="js/morris.min.js"></script>
<script type="text/javascript">
	Morris.Bar({
		element: 'HK',
		data: [
			<?php 
				$i=0;
				foreach ($allPhong as $p) {
					$b[$i] = 0;
					foreach ($xemThongKe as $thk) {
						if ($thk->idPhong == $p->id) {
							$b[$i] = $thk->total;
						}
					}
					echo "{ y: '".$p->TenPhong."', a: ".$b[$i]."},";
					$i++;
				}
			?>
		],
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Sáng']
	});	

</script>
@endsection

		
			

			
		

	
