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
            var barchart_options = {title:'THỐNG KÊ TÌNH TRẠNG SỬ DỤNG PHÒNG GIỮA CÁC BỘ MÔN',
                           width:900,
                           height:550,
                           legend: 0};
            var barchart = new google.visualization.BarChart(document.getElementById('SSBoMon1'));
            barchart.draw(bomon, barchart_options);
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
            var barchart_options = {title:'THỐNG KÊ TÌNH TRẠNG SỬ DỤNG GIỮA CÁC PHÒNG',
                           width:900,
                           height:550,
                           legend: 0};
            var barchart = new google.visualization.BarChart(document.getElementById('SSBoMon2'));
            barchart.draw(phong, barchart_options);
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
            var barchart_options = {title:'THỐNG KÊ TÌNH TRẠNG SỬ DỤNG PHÒNG GIỮA CÁC HỌC KỲ',
                           width:900,
                           height:550,
                           legend: 0};
            var barchart = new google.visualization.BarChart(document.getElementById('SSBoMon3'));
            barchart.draw(hocky, barchart_options);
        }
    </script>
@endsection

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h3 class="text-center" style="color: blue">THỐNG KÊ</h3>
</div>
<div class="col-md-12">
  <a href="admin/thongke/xembieudo" class="btn btn-warning">Xem biểu đồ tròn</a>

	<input type="button" name="answer" value="Xem biểu đồ cột"  class="btn btn-warning" onclick="showCot()" />
</div>
<div class="col-md-12">
  <div id="cot"  style="display:none;" class="answer_list" >
	    <div class="buttons">
    			<a  id="showall" class="btn btn-primary">Tất cả</a>
    			<a  class="showSingle btn btn-primary" target="1">Thống kê theo phòng</a>
    			<a  class="showSingle btn btn-primary" target="2">Thống kê theo bộ môn</a>
    			<a  class="showSingle btn btn-primary" target="3">Thống kê theo học kỳ</a>
    	</div>
		<table class="columns">
		    <td>
		        <tr><div id="SSBoMon1" class="targetDiv" style="border: 1px solid #ccc"></div></tr>
		        <br><br>

		        <tr><div id="SSBoMon2" class="targetDiv" style="border: 1px solid #ccc"></div></tr>
		        <br><br>

		        <tr><div id="SSBoMon3" class="targetDiv" style="border: 1px solid #ccc"></div></tr>
		    </td>
		</table>
	</div>
</div>


	
@endsection

@section('script')
	<script type="text/javascript">
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

