@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
   	<h3 class="text-center" style="color: blue">THỐNG KÊ</h3>
</div>

<!-- <div class="col-md-4">
	<select class="form-control" onchange="location = this.value;">
		<option selected value="0">------------</option>
	 	<option value="admin/thongke/danhsach">Toàn học kỳ</option>
	 	<option value="admin/thongke/tuan">Tình trạng sử dung qua các tuần</option>
	</select>
</div> -->
<div class="col-md-8">
	<form method="POST" action="admin/thongke/xemthongke">
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
		<div class="col-md-2"><label>Từ tuần</label></div>
		<div class="col-md-2">
			<select class="form-control" name="tuanBD">
				@foreach($allTuan as $at)
					<option @if($at->id == 1)
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
					<option @if($at->id == 20)
								{{"selected"}}
							@endif
					 value="{{$at->id}}">{{$at->id}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-2">
			<button class="btn btn-primary" type="submit">Xem thống kế</button>
		</div>
	</form>
	<br><br>
</div>

<div class="col-md-12">
	<h3><center>SỐ LẦN SỬ DỤNG PHÒNG THEO TUẦN CỦA TOÀN HỌC KỲ</center></h3>
	<div id="tuan"></div>
</div>
@endsection


@section('script')
<script type="text/javascript" src="js/raphael-min.js"></script>

<script type="text/javascript" src="js/morris.min.js"></script>
<script type="text/javascript">

	Morris.Bar({
		element: 'tuan',
		data: [
			<?php 
				$i=0;
				foreach ($allTuan as $at) {
					$b[$i] = 0;
					foreach ($tuan as $t) {
						if ($t->idTuan == $at->id) {
							$b[$i] = $t->total;
						}
					}
					echo "{ y: '".$at->id."', a: ".$b[$i]."},";
					$i++;
				}
			?>
		],
		xkey: ['y'],
		ykeys: ['a'],
		labels: ['Số buổi']
	}).on('click', function(i, row){
  console.log(i, row);
});
</script>
@endsection

		
			

			
		

	