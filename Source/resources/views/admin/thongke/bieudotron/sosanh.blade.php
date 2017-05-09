@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h3 class="text-center" style="color: blue">THỐNG KÊ</h3>
</div>
@section('header')
    <script type="text/javascript" src="js/loader.js"></script>
    <script type="text/javascript">

      // Load Charts and the corechart and barchart packages.
        google.charts.load('current', {'packages':['corechart']});

      // Draw the pie chart and bar chart when Charts is loaded.
        google.charts.setOnLoadCallback(drawChart);
    // Hàm vẽ biểu đồ
    <?php $a=1; $b= 20; $c=1; $d=17 ?>
        function drawChart() {
        	
    // SO SÁNH PHÒNG
    // Truy xuất dữ liệu so sanh theo bộ môn
 		<?php $nut=0; ?>
            var sosanhPhong = new google.visualization.DataTable();
            sosanhPhong.addColumn('string', 'Tên phòng');
            sosanhPhong.addColumn('number', 'Số lần');
            sosanhPhong.addRows([            	
                @foreach ($sosanhPhong as $d)
                    ['Phòng {{$d->idPhong}}',{{$d->SoLan}}],
                @endforeach
            ]);
            var piechart_options = {title:'SO SÁNH TỈ LỆ SỬ DỤNG GIỮA CÁC PHÒNG (từ tuần {{$a}} đến tuần {{$b}})',
                           width:900,
                           height:600,
                            legend: 1
                        };
            var piechart = new google.visualization.PieChart(document.getElementById('SSBoMon1'));
            piechart.draw(sosanhPhong, piechart_options);
    // Truy xuat du lieu theo cot

            var barchart_options = {title:'THỐNG KÊ SỐ LẦN SỬ DỤNG GIỮA CÁC PHÒNG (từ tuần {{$a}} đến tuần {{$b}})',
                           width:900,
                           height:400,
                           legend: 0
                       };
            var barchart = new google.visualization.BarChart(document.getElementById('SSBoMon2'));
            barchart.draw(sosanhPhong, barchart_options);

    // SO SÁNH TUẦN
    // Truy xuất dữ liệu so sanh theo bộ môn
 		<?php $nut=0; ?>
            var sosanhTuan = new google.visualization.DataTable();
            sosanhTuan.addColumn('string', 'Tên tuần');
            sosanhTuan.addColumn('number', 'Số lần');
            sosanhTuan.addRows([            	
                @foreach ($sosanhTuan as $d)
                    ['Tuần {{$d->idTuan}}',{{$d->SoLan}}],
                @endforeach
            ]);
            var piechart_options = {title:'SO SÁNH TỈ LỆ SỬ DỤNG PHÒNG QUA CÁC TUẦN (Từ tuần {{$a}} đến tuần {{$b}})',
                           width:900,
                           height:400,
                            legend: 1
                        };
            var piechart = new google.visualization.PieChart(document.getElementById('SSBoMon3'));
            piechart.draw(sosanhTuan, piechart_options);
    // Truy xuat du lieu theo cot

            var barchart_options = {title:'THỐNG KÊ SỐ LẦN SỬ DỤNG PHÒNG QUA CÁC TUẦN (Từ tuần {{$a}} đến tuần {{$b}})',
                           width:900,
                           height:400,
                           legend: 0};
            var barchart = new google.visualization.BarChart(document.getElementById('SSBoMon4'));
            barchart.draw(sosanhTuan, barchart_options);
    // SO SÁNH BỘ MÔN
    // Truy xuất dữ liệu so sanh theo bộ môn
 		<?php $nut=0; ?>
            var sosanhBoMon = new google.visualization.DataTable();
            sosanhBoMon.addColumn('string', 'Tên tuần');
            sosanhBoMon.addColumn('number', 'Số lần');
            sosanhBoMon.addRows([            	
                @foreach ($sosanhBoMon as $d)
                    @foreach($allPhong as $p)
                    	@if($d->idPhong == $p->id)
                    		['Phòng {{$p->TenPhong}}',{{$d->SoLan}}],
                    	@endif
                    @endforeach
                @endforeach
            ]);
            var piechart_options = {title:'SO SÁNH TỈ LỆ SỬ DỤNG PHÒNG CỦA BỘ MÔN QUA CÁC TUẦN (Từ tuần {{$a}} đến tuần {{$b}})',
                           width:900,
                           height:400,
                            legend: 1
                        };
            var piechart = new google.visualization.PieChart(document.getElementById('SSBoMon5'));
            piechart.draw(sosanhBoMon, piechart_options);
    // Truy xuat du lieu theo cot

            var barchart_options = {title:'THỐNG KÊ SỐ LẦN SỬ DỤNG PHÒNG CỦA BỘ MÔN QUA CÁC TUẦN (Từ tuần {{$a}} đến tuần {{$b}})',
                           width:900,
                           height:400,
                           legend: 0};
            var barchart = new google.visualization.BarChart(document.getElementById('SSBoMon6'));
            barchart.draw(sosanhBoMon, barchart_options);
        }
    </script>

@endsection

<center><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  TÙY CHỌN XEM THỐNG KÊ
</button></center>

<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-center">XEM THỐNG KÊ</h4>
		    </div>
		    <div class="modal-body text-center">
		        <form action="admin/thongke/bieudotron/sosanh" method="post">
			    	<input type="hidden" name="_token" value="{{csrf_token()}}" />
			    	<div class="form-group form-inline">
			    		<label>Tuần</label>
						<label>Từ</label>
						
						<select class="form-control" name="tuanBD">
							<option value="0"></option>
							@foreach($allTuan as $tuan)
								<option value="{{$tuan->id}}">{{$tuan->id}}</option>
							@endforeach
						</select>
						<label>Đến</label>
						<select class="form-control" name="tuanKT">
							<option value="0"></option>
							@foreach($allTuan as $tuan)
								<option value="{{$tuan->id}}">{{$tuan->id}}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group form-inline">
			    		<label>Phòng</label>
						<label>Từ</label>
						<select class="form-control" name="phongBD">
							<option value="0"></option>
							@foreach($allPhong as $p)
								<option value="{{$p->id}}">{{$p->TenPhong}}</option>
							@endforeach
						</select>
						<label>Đến</label>
						<select class="form-control" name="phongKT">
							<option value="0"></option>
							@foreach($allPhong as $p)
								<option value="{{$p->id}}">{{$p->TenPhong}}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group form-inline">
			    		<label>Bộ môn</label>
						<select class="form-control" name="BoMon">
							<option value="0"></option>
							@foreach($allBoMon as $bm)
								<option value="{{$bm->id}}">{{$bm->TenBM}}</option>
							@endforeach
						</select>
					</div>
					<button name="phong" type="submit" class="btn btn-primary">Xem thống kê</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</form>
		    </div>
	    </div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="col-lg-12 text-center">   
    <div class="buttons">
        <ul>
        	<i><a  id="showall" class="btn btn-primary">Tất cả</a></i>
	    	<i><a  class="showSingle btn btn-primary" target="1">So sánh phòng</a></i>
	    	<i><a  class="showSingle btn btn-primary" target="3">So sánh tuần</a></i>
	    	<i><a  class="showSingle btn btn-primary" target="5">So sánh bộ môn</a></i>
	    	<i><a  class="showSingle btn btn-primary" target="2">Thống kê phòng</a></i>
        	<i><a  class="showSingle btn btn-primary" target="4">Thống kê tuần</a></i>
        	<i><a  class="showSingle btn btn-primary" target="6">Thống kê bộ môn</a></i>
        </ul>
    </div>
    
    <table class="columns">
        <td>
            <tr><div id="SSBoMon1" class="targetDiv" style="border: 1px solid #ccc"></div></tr>
            <tr><div id="SSBoMon2" class="targetDiv" style="border: 1px solid #ccc"></div></tr>
            <tr><div id="SSBoMon3" class="targetDiv" style="border: 1px solid #ccc"></div></tr>
            <tr><div id="SSBoMon4" class="targetDiv" style="border: 1px solid #ccc"></div></tr>
            <tr><div id="SSBoMon5" class="targetDiv" style="border: 1px solid #ccc"></div></tr>
            <tr><div id="SSBoMon6" class="targetDiv" style="border: 1px solid #ccc"></div></tr>
        </td>
    </table>
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