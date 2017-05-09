@extends('admin.layout.index')
@section('header')
	<script type="text/javascript" src="js/loader.js"></script>
    <script type="text/javascript">

      // Load Charts and the corechart and barchart packages.
        google.charts.load('current', {'packages':['corechart']});

      // Draw the pie chart and bar chart when Charts is loaded.
        google.charts.setOnLoadCallback(drawChart);
    // Hàm vẽ biểu đồ
        function drawChart() {
    // BIỂU ĐỒ TRÒN
    // Truy xuất dữ liệu so sanh theo bộ môn
            var bomon = new google.visualization.DataTable();
            bomon.addColumn('string', 'Tên bộ môn');
            bomon.addColumn('number', 'Số lần');
            bomon.addRows([
	            @foreach ($bomon as $d)
    				@foreach ($allBoMon as $bm)
    					@if ($d->idBoMon == $bm->id)
    						['{{$bm->TenBM}}',{{$d->SoLan}}],
    					@endif
    				@endforeach
    			@endforeach
            ]);
            var piechart_options = {title:'SO SÁNH TÌNH TRẠNG SỬ DỤNG PHÒNG GIỮA CÁC BỘ MÔN',
                           width:500,
                           height:400,
                       		legend: 1
                       	};
            var piechart = new google.visualization.PieChart(document.getElementById('SSBoMon1'));
            piechart.draw(bomon, piechart_options);
    // Truy xuất dữ liệu so sanh theo phòng
            var phong = new google.visualization.DataTable();
            phong.addColumn('string', 'Tên phòng');
            phong.addColumn('number', 'Số lần');
            phong.addRows([
	            @foreach ($phong as $d)
    				@foreach ($allPhong as $p)
    					@if ($d->idPhong == $p->id)
    						['{{$p->TenPhong}}',{{$d->SoLan}}],
    					@endif
    				@endforeach
    			@endforeach
            ]);
            var piechart_options = {title:'SO SÁNH TÌNH TRẠNG SỬ DỤNG GIỮA CÁC PHÒNG',
                           width:900,
                           height:550,
                       		legend: 1};
            var piechart = new google.visualization.PieChart(document.getElementById('SSBoMon2'));
            piechart.draw(phong, piechart_options);
    // Truy xuất dữ liệu so sanh học kỳ
            var hocky = new google.visualization.DataTable();
            hocky.addColumn('string', 'Học kỳ');
            hocky.addColumn('number', 'Số lần');
            hocky.addRows([
	            @foreach ($hocky as $d)
    				@foreach ($allHKNK as $hknk)
    					@if ($d->HocKy == $hknk->id)
    						['Học kỳ {{$hknk->HocKy}} - {{$hknk->NienKhoa}}',{{$d->SoLan}}],
    					@endif
    				@endforeach
    			@endforeach
            ]);
            var piechart_options = {title:'SO SÁNH TÌNH TRẠNG SỬ DỤNG GIỮA CÁC HỌC KỲ',
                           width:900,
                           height:550,
                       		legend: 1};
            var piechart = new google.visualization.PieChart(document.getElementById('SSBoMon3'));
            piechart.draw(hocky, piechart_options);

            var piechart_options = {title:'SO SÁNH TÌNH TRẠNG SỬ DỤNG GIỮA CÁC PHÒNG',
                           width:900,
                           height:550,
                       		legend: 1};
            var piechart = new google.visualization.PieChart(document.getElementById('SSBoMon4'));
            piechart.draw(phong, piechart_options);
        }
    </script>
@endsection

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h3 class="text-center" style="color: blue">THỐNG KÊ</h3>
</div>
<div class="col-md-12 text-center">
	<input type="button" name="answer" value="Xem biểu đồ hình tròn"  class="btn btn-warning" onclick="showTron()" />
	<a href="admin/thongke/xembieudocot" name="answer"  class="btn btn-warning" onclick="showCot()">Xem biểu đồ cột</a>
</div>

<div class="col-md-12">
	<div id="tron"  style="display:none;" class="answer_list" >

		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="col-md-3">
			    	<form action="admin/thongke/bieudotron/sosanhtheoBM" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						@foreach ($allBoMon as $bm)
							<div class="checkbox">
							    <input class="form-inline" type="checkbox" value="{{$bm->id}}" name="idBoMon[]"> {{$bm->TenBM}}
						  	</div>
						@endforeach

				  		<button type="submit" class="btn btn-default">Xem biểu đồ</button>
				  	</form>
			    </div>
			    <div class="col-md-5">
			    	<form action="admin/thongke/bieudotron/sosanhtheoPhong" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<?php $i=0; ?>
						@foreach ($allPhong as $p)
						<?php $i++; ?>
							<input class="form-inline" type="checkbox" value="{{$p->id}}" name="idPhong[]"> {{$p->TenPhong}}
							@if($i%5==0)
								<br>
							@endif
						@endforeach
						<br>
				  		<button type="submit" class="btn btn-default">Xem biểu đồ</button>
				  	</form>
			    </div>
			    <div class="col-md-4">
				    <form action="admin/thongke/bieudotron/sosanhtheoTuan" method="post">
				    	<div class="form-group form-inline">
							<label>Từ</label>
							<select class="form-control" name="tuanBD">
								<option value="0"></option>
								@foreach($allTuan as $tuan)
									<option>{{$tuan->id}}</option>
								@endforeach
							</select>
							<label>Đến</label>
							<select class="form-control" name="tuanKT">
								<option value="0"></option>
								@foreach($allTuan as $tuan)
									<option>{{$tuan->id}}</option>
								@endforeach
							</select>
						</div>
					</form>
			    </div>

				<div class="col-md-8">
				 	<form action="admin/thongke/bieudocot/xemBieuDo" method="post">
						<input type="hidden" name="_token" value="{{csrf_token()}}" />
						<div class="form-group">
							<div class="col-md-6">
								<input type="checkbox" id="checkbox1">   <label>Theo năm học</label>
							</div>
							<div class="col-md-6">
								<select class="form-control nienkhoa" name="NienKhoa" disabled>
									<option value="0">Tất cả</option>
									@foreach($allHKNK as $nam)
										<option value="{{$nam->id}}">{{$nam->NienKhoa}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<input type="checkbox" id="checkbox2">   <label>Theo học kỳ</label>
							</div>
							<div class="col-md-6">
								<select class="form-control hocky" name="HocKy" disabled>
									<option value="0">Tất cả</option>
									@foreach($allHKNK as $nam)
										<option value="{{$nam->id}}">{{$nam->HocKy}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<input type="checkbox" id="checkbox3">   <label>Tuần học</label>
							</div>
							<div class="col-md-6 form-inline">
								<label>Từ</label>
								<select class="form-control tuan" name="tuanBD" disabled>
									<option value="0"></option>
									@foreach($allTuan as $tuan)
										<option>{{$tuan->id}}</option>
									@endforeach
								</select>
								<label>Đến</label>
								<select class="form-control tuan" name="tuanKT" disabled>
									<option value="0"></option>
									@foreach($allTuan as $tuan)
										<option>{{$tuan->id}}</option>
									@endforeach
								</select>
									<span id="ipTuan"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<input type="checkbox" id="checkbox4">   <label>Theo bộ môn</label>
							</div>
							<div class="col-md-6">
								<select class="form-control bomon" name="BoMon" disabled>
									<option value="0">Tất cả</option>
									@foreach($allBoMon as $bm)
										<option value="{{$bm->id}}">{{$bm->TenBM}}</option>
									@endforeach
								</select>
									<span id="ipBoMon"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<input type="checkbox" id="checkbox5">   <label>Theo phòng</label>
							</div>
							<div class="col-md-6">
								<select class="form-control phong" name="Phong" disabled>
									<option value="0">Tất cả</option>
									@foreach($allPhong as $p)
										<option value="{{$p->id}}">{{$p->TenPhong}}</option>
									@endforeach
								</select>
									<span id="ipPhong"></span>
							</div>
						</div>
						<center><button type="submit" class="btn btn-primary">Xem thống kê</button></center>
					</form>
				</div>
			</div>	
		</div>
	    <div class="buttons">
			<a  id="showall" class="btn btn-primary">Tất cả</a>
			<a  class="showSingle btn btn-primary" target="1">Thống kê theo phòng</a>
			<a  class="showSingle btn btn-primary" target="2">Thống kê theo bộ môn</a>
			<a  class="showSingle btn btn-primary" target="3">Thống kê theo học kỳ</a>
		</div>
		
		<table class="columns">
		    <td>
		        <tr>
			        <div id="SSBoMon1" class="targetDiv" style="border: 1px solid #ccc"></div>
		        </tr>
		        <tr>
		        	<div id="SSBoMon2" class="targetDiv" style="border: 1px solid #ccc"></div>
		        </tr>

		        <tr><div id="SSBoMon3" class="targetDiv" style="border: 1px solid #ccc"></div></tr>
		    </td>
		</table>
	</div>

	<div id="SSBoMon4" class="targetDiv" style="border: 1px solid #ccc"></div>
</div>

@endsection

@section('script')
	<script type="text/javascript">
		function showTron() {
	        if (document.getElementById('tron').style.display == 'block') {
	            document.getElementById('tron').style.display = 'none';
	        } else {
	            document.getElementById('tron').style.display = 'block';
	        }
	    }

	    function showCot() {
	        if (document.getElementById('cot').style.display == 'block') {
	            document.getElementById('cot').style.display = 'none';
	        } else {cot
	            document.getElementById('cot').style.display = 'block';
	        }
	    }
	</script>
	<script type="text/javascript">
		jQuery(function(){
         jQuery('#showall').click(function(){
               jQuery('.targetDiv').show();
        });
        jQuery('.showSingle').click(function(){
              jQuery('.targetDiv').hide();
              jQuery('#SSBoMon'+$(this).attr('target')).show();
        });
	});
	</script>
@endsection

