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
            piechart.draw(data, piechart_options);
    // Truy xuat du lieu theo cot
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Tên bộ môn');
            data.addColumn('number', 'Số lần');
            data.addRows([
                @foreach ($data as $d)
                        @foreach ($allBoMon as $bm)
                            @if ($d->idBoMon == $bm->id)
                                ['{{$bm->TenBM}}',{{$d->SoLan}}],
                            @endif
                        @endforeach
                    @endforeach
                ]);
            var barchart_options = {title:'THỐNG KÊ TÌNH TRẠNG SỬ DỤNG PHÒNG GIỮA CÁC BỘ MÔN',
                           width:500,
                           height:400,
                           legend: 0};
            var barchart = new google.visualization.BarChart(document.getElementById('SSBoMon2'));
            barchart.draw(data, barchart_options);
        }
    </script>
@endsection

<div class="col-lg-8">   
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
<div class="col-lg-4">
    <label>Chọn các phòng bạn muốn so sánh</label><br><br>
    <form action="admin/thongke/bieudotron/sosanhtheoBM" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @foreach ($allBoMon as $bm)
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="{{$bm->id}}" name="idBoMon[]"> {{$bm->TenBM}}
                </label>
            </div>
        @endforeach
        <button type="submit" class="btn btn-default">Xem biểu đồ</button>
    </form>
</div>

<script>
    // load bieu do tron
    // var config = {
    //     type: 'pie',
    //     data: {
    //         datasets: 
    //         [{
    //             data: 
    //             [
    //                 @foreach ($data as $d)
    //                 {{$d->SoLan}},
    //                 @endforeach
                    
    //             ],
    //             backgroundColor: 
    //             [
    //                 @foreach ($data as $d)
    //                 getRandomColor(),
    //                 @endforeach
                    
    //             ],
    //             label: 'SoLan'
    //         }],
    //         labels: [
    //             @foreach ($data as $d)
    //                 @foreach ($allBoMon as $bm)
    //                     @if ($bm->id == $d->idBoMon)
    //             "{{$bm->TenBM}}",
    //                     @endif
    //                 @endforeach
    //             @endforeach
    //         ]
    //     },
    //     options: {
    //         responsive: true
    //     }
    // };

    // window.onload = function() {
    //     var ctx = document.getElementById("chart-area").getContext("2d");
    //     window.myPie = new Chart(ctx, config);
    // };

    // function getRandomColor() {
    // var letters = '0123456789ABCDEF'.split('');
    // var color = '#';
    // for (var i = 0; i < 6; i++ ) {
    //     color += letters[Math.floor(Math.random() * 16)];
    // }
    // return color;
    // }
    // //load bieu do cot

    // var color = Chart.helpers.color;
    // var barChartData = {
    //     labels: [
    //                 @foreach ($data as $d)
    //                     @foreach ($allBoMon as $p)
    //                         @if ($d->idBoMon == $p->id)
    //                 "{{$p->TenBM}}", 
    //                         @endif
    //                     @endforeach
    //                 @endforeach
    //             ],
    //     datasets: [{
    //         label: 'Số lần',
    //         backgroundColor: color(window.chartColors.blue).alpha(20).rgbString(),
    //         borderColor: window.chartColors.blue,
    //         borderWidth: 1,
    //         data: [
    //             @foreach ($data as $d)
    //                 {{$d->SoLan}}, 
    //             @endforeach 
    //         ]
    //     }]
    // };

    // window.onload = function() {
    //     var ctx = document.getElementById("canvas").getContext("2d");
    //     window.myBar = new Chart(ctx, {
    //         type: 'bar',
    //         data: barChartData,
    //         options: {
    //             responsive: true,
    //             legend: {
    //                 position: 'top',
    //             },
    //             title: {
    //                 display: true,
    //                 text: 'SỐ LẦN SỬ DỤNG PHÒNG CÁC BỘ MÔN',
    //                 size: 25
    //             }
    //         }
    //     });

    // };   

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

@section('script')

@endsection