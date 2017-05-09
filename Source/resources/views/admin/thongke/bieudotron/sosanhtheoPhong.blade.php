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
        function drawChart() {
    // BIỂU ĐỒ TRÒN
    // Truy xuất dữ liệu so sanh theo bộ môn
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Tên bộ môn');
            data.addColumn('number', 'Số lần');
            data.addRows([
                @foreach ($data as $d)
                    @foreach ($allPhong as $p)
                        @if ($d->idPhong == $p->id)
                            ['{{$p->TenPhong}}',{{$d->SoLan}}],
                        @endif
                    @endforeach
                @endforeach
            ]);
            var piechart_options = {title:'SO SÁNH TÌNH TRẠNG SỬ DỤNG GIỮA CÁC PHÒNG',
                           width:500,
                           height:400,
                            legend: 1
                        };
            var piechart = new google.visualization.PieChart(document.getElementById('SSBoMon1'));
            piechart.draw(data, piechart_options);
    // Truy xuat du lieu theo cot
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Tên phòng');
            data.addColumn('number', 'Số lần');
            data.addRows([
                @foreach ($data as $d)
                    @foreach ($allPhong as $p)
                        @if ($d->idPhong == $p->id)
                            ['{{$p->TenPhong}}',{{$d->SoLan}}],
                        @endif
                    @endforeach
                @endforeach
                ]);
            var barchart_options = {title:'THỐNG KÊ TÌNH TRẠNG SỬ DỤNG GIỮA CÁC PHÒNG',
                           width:500,
                           height:400,
                           legend: 0};
            var barchart = new google.visualization.BarChart(document.getElementById('SSBoMon2'));
            barchart.draw(data, barchart_options);
        }
    </script>
@endsection
@include('admin.thongke.header')
<div class="col-lg-8">   
    <div class="buttons">
        <a  id="showall" class="btn btn-primary">Tất cả</a>
        <a  class="showSingle btn btn-primary" target="1">Thống kê theo phòng</a>
        <a  class="showSingle btn btn-primary" target="2">Thống kê theo bộ môn</a>
    </div>
    
    <table class="columns">
        <td>
            <tr>
                <div id="SSBoMon1" class="targetDiv" style="border: 1px solid #ccc"></div>
            </tr>
            <tr>
                <div id="SSBoMon2" class="targetDiv" style="border: 1px solid #ccc"></div>
            </tr>
        </td>
    </table>
</div>
<div class="col-lg-4">
    <label>Chọn các phòng bạn muốn so sánh</label><br><br>
    <form action="admin/thongke/bieudotron/sosanhtheoPhong" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <?php $i=0; ?>
        @foreach ($allPhong as $p)
            <input type="checkbox" value="{{$p->id}}" name="idPhong[]"> {{$p->TenPhong}}
        @endforeach
        <button type="submit" class="btn btn-default">Xem biểu đồ</button>
    </form>
</div>

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

@section('script')

@endsection