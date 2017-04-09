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
	<select id="selectTuan" name="idTuan" class="form-control" onchange="location = this.value;">
        @foreach($allTuan as $at)
            <option id="optionIdTuan{{$at->id}}" value="admin/thongke/thongketuan/{{$at->id}}">{{$at->id}}</option>      
        @endforeach
    </select>
</div>

<div class="col-md-12">
    	@foreach($allTuan as $at)
            <a href="admin/thongke/thongketuan/{{$at->id}}" class="btn btn-default">{{$at->id}}</a> 
        @endforeach
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

	@foreach ($toanHK as $thk2)
	$('#optionIdTuan'+{{$thk2->idTuan}}).attr("selected","selected");

	{{$thk2->idTuan}}
	@break
	@endforeach	

</script>
@endsection

		
			

			
		

	