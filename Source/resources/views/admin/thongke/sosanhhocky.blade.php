@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h3 class="text-center" style="color: blue">THỐNG KÊ CÁC HỌC KỲ</h3>
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
        	
    // SO SÁNH PHÒNG
    // Truy xuất dữ liệu so sanh theo bộ môn

            var sosanhHocKy = new google.visualization.DataTable();
            sosanhHocKy.addColumn('string', 'Tên bộ môn');
            sosanhHocKy.addColumn('number', 'Số lần');
            sosanhHocKy.addRows([            	
                @foreach ($sosanhHocKy as $d)
                    @foreach($allHocKy as $hk)
                        @if($d->idHocKyNienKhoa == $hk->id)
                            ['Học kỳ {{$hk->HocKy}}/{{$hk->NienKhoa}}',{{$d->SoLan}}],
                        @endif
                    @endforeach
                @endforeach
            ]);
                var piechart_options = {title:'SO SÁNH TỈ LỆ SỬ DỤNG PHÒNG GIỮA CÁC HỌC KỲ',
                           width:900,
                           height:600,
                            legend: 1
                        };
            var piechart = new google.visualization.PieChart(document.getElementById('SSBoMon1'));
            piechart.draw(sosanhHocKy, piechart_options);
    // Truy xuat du lieu theo cot

                var barchart_options = {title:'THỐNG KÊ SỐ LẦN SỬ DỤNG PHÒNG GIỮA CÁC HỌC KỲ',
                           width:900,
                           height:400,
                           legend: 0
                       };
            var barchart = new google.visualization.BarChart(document.getElementById('SSBoMon2'));
            barchart.draw(sosanhHocKy, barchart_options);
        }
    </script>

@endsection

<div class="text-center">
    <div class="col-md-4 col-md-offset-2">
        <select id="link" class="form-control">
            <option value="admin/thongke/sosanhphong">So sánh theo phòng</option>
            <option value="admin/thongke/sosanhbomon">So sánh theo bộ môn</option>
            <option selected value="admin/thongke/sosanhhocky">So sánh theo học kỳ</option>
        </select>
    </div>
    <div class="col-md-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">TÙY CHỌN XEM THỐNG KÊ</button>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">XEM THỐNG KÊ</h4>
            </div>
            <div class="modal-body">
                <form action="admin/thongke/sosanhhocky" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group form-inline">
                        <div class="text-center"><label>Bộ môn</label></div>
                        @foreach ($allHocKy as $hk)
                            <div class="checkbox col-md-6 col-md-offset-3">
                                <input class="form-inline" type="checkbox" value="{{$hk->id}}" name="idHocKy[]"> Học kỳ {{$hk->HocKy}}/{{$hk->NienKhoa}}
                            </div><br>
                        @endforeach
                    </div>
                    <div class="text-center">
                        <button name="phong" type="submit" class="btn btn-primary">Xem thống kê</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>               
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="col-lg-12 text-center">       
    <table class="columns">
        <td>
            <tr><div id="SSBoMon1" class="targetDiv" style="border: 1px solid #ccc"></div></tr>
            <tr><div id="SSBoMon2" class="targetDiv" style="border: 1px solid #ccc"></div></tr>
        </td>
    </table>
</div>

@endsection

@section('script')
<script type="text/javascript">
    $("#link").change(function()
    {
        document.location.href = $(this).val();
    });
</script>

@endsection