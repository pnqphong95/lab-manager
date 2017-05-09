@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h3 class="text-center" style="color: blue">THỐNG KÊ</h3>
</div>
@include('admin.thongke.header')
<div style="width: 90%;padding-left: -50px">
    <canvas id="canvas"></canvas>
</div>    
@endsection

@section('script')
<script>       
    var color = Chart.helpers.color;
    var barChartData = {
        labels: [
        			@foreach ($data as $d)
        				@foreach ($allBoMon as $p)
        					@if ($d->idBoMon == $p->id)
        			"{{$p->TenBM}}", 
        					@endif
        				@endforeach
        			@endforeach
        		],
        datasets: [{
            label: 'Số lần',
            backgroundColor: color(window.chartColors.blue).alpha(20).rgbString(),
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
                    text: 'SỐ LẦN SỬ DỤNG PHÒNG CÁC BỘ MÔN',
                    size: 25
                }
            }
        });

    };   
</script>
@endsection