@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h3 class="text-center" style="color: blue">THỐNG KÊ</h3>
</div>
@include('admin.thongke.header')
<div id="container" style="width: 100%;">
    <canvas id="canvas"></canvas>
</div>    
    <script>       
        var color = Chart.helpers.color;
        var barChartData = {
            labels: [
            			@foreach ($data as $d)
            				@foreach ($allHKNK as $hk)
            					@if ($d->idHocKyNienKhoa == $hk->id)
            			             "Học kỳ {{$hk->HocKy}} - Niên khóa {{$hk->NienKhoa}}", 
            					@endif
            				@endforeach
            			@endforeach
            		],
            datasets: [{
                label: 'Số lần',
                backgroundColor: color(window.chartColors.blue).alpha(1).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: [
                	@foreach ($data as $d)
            			{{$d->SoLan}}, 
        			@endforeach 
                ]
            }]
        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'SỐ LẦN SỬ DỤNG CÁC PHÒNG TRONG HỌC KỲ'
                    }
                }
            });

        };   
    </script>

@endsection

@section('script')

@endsection