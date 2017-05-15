@section('title')
Thống kê theo học kỳ
@endsection

@extends('layout.index')

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
                            ['Học kỳ {{$hk->HocKy}}/{{$hk->NienKhoa}} - {{$d->SoLan}} lần',{{$d->SoLan}}],
                        @endif
                    @endforeach
                @endforeach
            ]);
                var piechart_options = {title:'SO SÁNH TỈ LỆ SỬ DỤNG PHÒNG GIỮA CÁC HỌC KỲ',
                           width:500,
                           height:300,
                            legend: 1
                        };
            var piechart = new google.visualization.PieChart(document.getElementById('SSBoMon1'));
            piechart.draw(sosanhHocKy, piechart_options);
    // Truy xuat du lieu theo cot

                var barchart_options = {title:'THỐNG KÊ SỐ LẦN SỬ DỤNG PHÒNG GIỮA CÁC HỌC KỲ',
                           width:500,
                           height:300,
                           legend: 1
                       };
            var barchart = new google.visualization.BarChart(document.getElementById('SSBoMon2'));
            barchart.draw(sosanhHocKy, barchart_options);
        }
    </script>

@endsection
@section('main')

<div class="white-well">    
<div class="row">
    <div class="col-md-6">
        <h3>THỐNG KÊ - Theo học kỳ</h3>
    </div>
    <div class="col-md-6">
        <table class="pull-right">
            <tr>
                <td>
                    <select id="link" class="form-control">
                        <option value="user/thongke/sosanhphong">Thống kê theo phòng</option>
                        <option value="user/thongke/sosanhbomon">Thống kê theo bộ môn</option>
                        <option selected value="user/thongke/sosanhhocky">Thống kê theo học kỳ</option>
                    </select>
                </td>
                <td  style="padding-left:  10px">
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">TÙY CHỌN XEM THỐNG KÊ</button>
                </td>
            </tr>
        </table>
    </div>

</div>
<hr>
<div class="row">
    <div class="col-md-6">       
        <table>
            <td>
                <tr><div id="SSBoMon1" class="targetDiv" style="border: 1px solid #ccc"></div></tr>
                <tr><div id="SSBoMon2" class="targetDiv" style="border: 1px solid #ccc"></div></tr>
            </td>
        </table>
    </div>
    <div class="col-md-6">  
        <h3 class="text-center">BẢNG SỐ LIỆU THỐNG KÊ
        </h3>     
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <tr>
                <th>Tên học kỳ</th>
                <th>Số lần</th>
                <th>Tỉ lệ (%)</th>
            </tr>
            @foreach($sosanhHocKy as $hk)
            <tr>
                <td>
                    @foreach($allHocKy as $ahk)
                        @if($hk->idHocKyNienKhoa == $ahk->id)   
                            {{$ahk->HocKy}}/{{$ahk->NienKhoa}}
                        @endif
                    @endforeach
                </td>
                <td>{{$hk->SoLan}}</td>
                <td>
                    <?php $phantram = ($hk->SoLan/$tong)*100;
                        echo round($phantram,2);
                     ?>
                </td>
            </tr>
            @endforeach
            <tr>
                <td>
                    Tổng
                </td>
                <td>{{$tong}}</td>
                <td>
                    100%
                </td>
            </tr>
        </table>
    </div>
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
                <form action="user/thongke/sosanhhocky" method="post">
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
    </div>
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