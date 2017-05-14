@section('title')
Thống kê theo bộ môn
@endsection

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

            var sosanhBoMon = new google.visualization.DataTable();
            sosanhBoMon.addColumn('string', 'Tên bộ môn');
            sosanhBoMon.addColumn('number', 'Số lần');
            sosanhBoMon.addRows([               
                @foreach ($sosanhBoMon as $d)
                    @foreach($allBoMon as $bm)
                        @if($d->idBoMon == $bm->id)
                            ['{{$bm->TenVietTat}}',{{$d->SoLan}}],
                        @endif
                    @endforeach
                @endforeach
            ]);
                var piechart_options = {title:'SO SÁNH TỈ LỆ SỬ DỤNG GIỮA CÁC BỘ MÔN (từ tuần {{$tuanBD}} đến tuần {{$tuanKT}})',
                           width:500,
                           height:300,
                            legend: 1
                        };
            var piechart = new google.visualization.PieChart(document.getElementById('SSBoMon1'));
            piechart.draw(sosanhBoMon, piechart_options);
        // Truy xuat du lieu theo cot

                var barchart_options = {title:'THỐNG KÊ SỐ LẦN SỬ DỤNG GIỮA CÁC PHÒNG (từ tuần {{$tuanBD}} đến tuần {{$tuanKT}})',
                           width:500,
                           height:300,
                           legend: 1
                       };
            var barchart = new google.visualization.BarChart(document.getElementById('SSBoMon2'));
            barchart.draw(sosanhBoMon, barchart_options);
        }
    </script>
@endsection

@extends('layout.index')

@section('main')
<div class="white-well">
<div class="row">
<div class="col-lg-6">
    <h3>THỐNG KÊ - HK {{$last->HocKy}}/{{$last->NienKhoa}} (Theo Bộ môn)</h3>
</div>
<div class="col-lg-6">
    <table class="pull-right">
        <tr>
            <td>
                <select id="link" class="form-control">
                    <option value="user/thongke/sosanhphong">Thống kê theo phòng</option>
                    <option selected value="user/thongke/sosanhbomon">Thống kê theo bộ môn</option>
                    <option value="user/thongke/sosanhhocky">Thống kê theo học kỳ</option>
                </select>
            </td>
            <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">TÙY CHỌN XEM THỐNG KÊ</button>
            </td>
        </tr>
    </table>
</div>
<div class="col-lg-12">
<!-- Page Content -->   
    <hr>
    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
    	<div class="modal-dialog" role="document">
    	    <div class="modal-content">
    		    <div class="modal-header">
    		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    		        <h4 class="modal-title text-center">XEM THỐNG KÊ</h4>
    		    </div>
    		    <div class="modal-body">
    		        <form action="user/thongke/sosanhbomon" method="post">
    			    	<input type="hidden" name="_token" value="{{csrf_token()}}" />
    			    	<div class="form-group form-inline text-center">
    			    		<label>Tuần</label>
    						<label>Từ</label>
    						
    						<select class="form-control" name="tuanBD">
    							@foreach($allTuan as $tuan)
    								<option value="{{$tuan->id}}">{{$tuan->id}}</option>
    							@endforeach
    						</select>
    						<label>Đến</label>
    						<select class="form-control" name="tuanKT">
    							@foreach($allTuan as $tuan)
    								<option 
                                        @if($tuan->id == 20)
                                            selected
                                        @endif
                                    value="{{$tuan->id}}">{{$tuan->id}}</option>
    							@endforeach
    						</select>
    					</div>
                        <div class="form-group form-inline">
                            <div class="text-center"><label>Bộ môn</label></div>
                            @foreach ($allBoMon as $bm)

                                
                                <div class="checkbox col-md-6 col-md-offset-3">
                                    <label><input class="form-inline idBM" type="checkbox" value="{{$bm->id}}" name="idBoMon[]"> {{$bm->TenBM}}</label>
                                </div><br>
                            @endforeach
                        </div>
    					<div class="text-center">
                            <button id="btXTK" name="phong" type="submit" class="btn btn-primary">Xem thống kê</button>               
                        </div>
    				</form>
    		    </div>
    	    </div><!-- /.modal-content -->
    	</div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<div class="col-lg-12">       
    <div class="col-md-6">
        <td>
            <tr><div id="SSBoMon1" class="targetDiv" style="border: 1px solid #ccc"></div></tr>
            <tr><div id="SSBoMon2" class="targetDiv" style="border: 1px solid #ccc"></div></tr>
        </td>
    </div>
    <div class="col-md-6">
        <h3 class="text-center">BẢNG SỐ LIỆU THỐNG KÊ
        </h3>     
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <tr>
                <th>Tên bộ môn</th>
                <th>Số lần</th>
                <th>Tỉ lệ (%)</th>
            </tr>
            @foreach($sosanhBoMon as $bm)
            <tr>
                <td>
                    @foreach($allBoMon as $abm)
                        @if($bm->idBoMon == $abm->id)   
                            {{$abm->TenVietTat}}
                        @endif
                    @endforeach
                </td>
                <td>{{$bm->SoLan}}</td>
                <td>
                    <?php $phantram = ($bm->SoLan/$tong)*100;
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
</div>
@endsection


@section('script')
<script type="text/javascript">
    $("#link").change(function()
    {
        document.location.href = $(this).val();
    });
    $(document).ready(function (){
        $('#btXTK').click(function(event){
            
            if(!$('.idBM').is(':checked'))
            {
                alert ("Vui lòng chọn bộ môn muốn xem!");
                return false;
            }
            else return true;
        })
    });
</script>

@endsection