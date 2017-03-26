@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h1 class="page-header">Thống kê tình trạng sử dụng phòng thực hành
    </h1>
</div>

<div class="col-md-3">
	<select class="form-control" onchange="location = this.value;">
	 	<option value="admin/thongke/danhsach">Toàn học kỳ</option>
	 	<option value="admin/thongke/thang1">Tuần 1-4</option>
	 	<option selected value="admin/thongke/thang2">Tuần 5-8</option>
	 	<option value="admin/thongke/thang3">Tuần 9-12</option>
	 	<option value="admin/thongke/thang4">Tuần 13-16</option>
	 	<option value="admin/thongke/thang5">Tuần 17-20</option>
	 	<option value="admin/thongke/tuan">Tình trạng sử dung qua các tuần</option>
	</select>
</div>

<div class="col-md-12">
	<div id="T2"></div>
	<h2><center>Tháng 2</center></h2>

	<!-- <div id="T1"></div>
	<h2><content>THỐNG KÊ TÌNH TRẠNG SỬ DỤNG PHÒNG THÁNG 1</content></h2> -->
</div>
@endsection


@section('script')
<script type="text/javascript" src="js/raphael-min.js"></script>

<script type="text/javascript" src="js/morris.min.js"></script>
<script type="text/javascript">

	Morris.Bar({
		element: 'T2',
		data: [
			<?php 
				$i=0;
				foreach ($allPhong as $p) {
					$b[$i] = 0;
					foreach ($thang2 as $t2) {
						if ($t2->idPhong == $p->id) {
							$b[$i] = $t2->total;
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

		
			

			
		

	