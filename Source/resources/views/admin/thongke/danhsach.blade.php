@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
   	<h3 class="text-center" style="color: blue">THỐNG KÊ</h3>
</div>

<div class="col-md-8">
	<form method="POST" action="admin/thongke/xemthongke">
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
		<div class="col-md-2"><label>Từ tuần</label></div>
		<div class="col-md-2">
			<select class="form-control" name="tuanBD">
					<option selected value=0>--</option>
				@foreach($allTuan as $at)
					<option value="{{$at->id}}">{{$at->id}}</option>
				@endforeach
			</select>
		</div>	
		<div class="col-md-2"><label>Đến tuần</label></div>
		<div class="col-md-2">
			<select class="form-control" name="tuanKT">
				<option selected value=0>--</option>
				@foreach($allTuan as $at)
					<option value="{{$at->id}}">{{$at->id}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-2">
			<button class="btn btn-primary" type="submit">Xem thống kê</button>
		</div>
	</form>
	<br><br>
</div>

<div class="col-md-12">
	<h2><center>SỐ LẦN SỬ DỤNG THEO PHÒNG CỦA TOÀN HỌC KỲ</center></h2>
	<div id="HK"></div>
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
					foreach ($toanHK as $thk) {
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

		
			

			
		

	