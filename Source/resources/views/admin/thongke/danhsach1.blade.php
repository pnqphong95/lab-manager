@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h1 class="page-header">Thống kê tình trạng sử dụng phòng thực hành
    </h1>
</div>
<div class="col-md-3">
	<select class="form-control" onchange="location = this.value;">
	 	<option selected value="admin/thongke/danhsach">Toàn học kỳ</option>
	 	<option value="admin/thongke/thang1">Tuần 1-4</option>
	 	<option value="admin/thongke/thang2">Tuần 5-8</option>
	 	<option value="admin/thongke/thang3">Tuần 9-12</option>
	 	<option value="admin/thongke/thang4">Tuần 13-16</option>
	 	<option value="admin/thongke/thang5">Tuần 17-20</option>
	 	<option value="admin/thongke/tuan">Tình trạng sử dung qua các tuần</option>
	</select>
</div>
<div class="col-md-2">
	<select id="selectTuan" name="idTuan" class="form-control">
        @foreach($allTuan as $at)
            <option value="{{$at->id}}">{{$at->id}}</option>
        @endforeach
    </select>
</div>

<div class="col-md-12">
	<div id="HK"></div>
	<h2><center>THỐNG KÊ TÌNH TRẠNG SỬ DỤNG PHÒNG CẢ HỌC KÌ</center></h2>
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

	$(document).ready(function(){
		$('#selectTuan').on('change', function(){
			$.ajax({
			  	url: 'getThongKeTuan/{idTuan}',
			  	type: 'GET',
			  	success: function(data) {
				//called when successful
					$('#ajaxphp-results').html(data);
					console.log(data);
			  	},
			  	error: function(e) {
				//called when there is an error
				//console.log(e.message);
			  	}
});
		});
	});
</script>
@endsection

		
			

			
		

	