@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h3 class="text-center" style="color: blue">THỐNG KÊ</h3>
</div>
@include('admin.thongke.header')
<div class="col-lg-4">
    <label>Chọn các học kỳ bạn muốn so sánh</label><br><br>
    <form action="admin/thongke/bieudotron/sosanhtheoHK" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @foreach ($allPhong as $p)
        <div class="checkbox">
            <label>
                <input type="checkbox" value="{{$p->id}}" name="idPhong[]"> {{$p->TenPhong}}
            </label>
        </div>
    @endforeach
    
        <button type="submit" class="btn btn-default">Xem biểu đồ</button>
    </form>
</div>
<div class="col-lg-8">
    <div id="canvas-holder" style="width:60%">
        <canvas id="chart-area" />
    </div>
</div>
    <script>
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };

    var config = {
        type: 'pie',
        data: {
            datasets: 
            [{
                data: 
                [
                    @foreach ($data as $d)
                    {{$d->SoLan}},
                    @endforeach
                    
                ],
                backgroundColor: 
                [
                    @foreach ($data as $d)
                    getRandomColor(),
                    @endforeach
                    
                ],
                label: 'SoLan'
            }],
            labels: [
                @foreach ($data as $d)
                    @foreach ($allPhong as $p)
                        @if ($p->id == $d->idPhong)
                "{{$p->TenPhong}}",
                        @endif
                    @endforeach
                @endforeach
            ]
        },
        options: {
            responsive: true
        }
    };

    window.onload = function() {
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx, config);
    };

    function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
    }
    </script>

@endsection

@section('script')

@endsection