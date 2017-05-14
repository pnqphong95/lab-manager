@section('title')
Thống kê theo phòng
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

            var sosanhPhong = new google.visualization.DataTable();
            sosanhPhong.addColumn('string', 'Tên phòng');
            sosanhPhong.addColumn('number', 'Số lần');
            sosanhPhong.addRows([               
                @foreach ($sosanhPhong as $d)
                    @foreach($allPhong as $p)
                         @if($d->idPhong == $p->id)
                            ['{{$p->TenPhong}}',{{$d->SoLan}}],
                         @endif
                    @endforeach
                @endforeach 
            ]);
                var piechart_options = {title:'SO SÁNH TỈ LỆ SỬ DỤNG GIỮA CÁC PHÒNG (từ tuần {{$tuanBD}} đến tuần {{$tuanKT}})',
                           width:500,
                           height:300,
                            legend: 1
                        };
            var piechart = new google.visualization.PieChart(document.getElementById('SSPhong1'));
            piechart.draw(sosanhPhong, piechart_options);
    // Truy xuat du lieu theo cot

                var barchart_options = {title:'THỐNG KÊ SỐ LẦN SỬ DỤNG GIỮA CÁC PHÒNG (từ tuần {{$tuanBD}} đến tuần {{$tuanKT}})',
                           width:500,
                           height:300,
                           legend: 1
                       };
            var barchart = new google.visualization.BarChart(document.getElementById('SSPhong2'));
            barchart.draw(sosanhPhong, barchart_options);
        }
    </script>

@endsection
@section('main')
<!-- Page Content -->
<div class="white-well">    
<div class="row">
    <div class="col-md-12">
        <h3 class="text-center" style="color: blue">THỐNG KÊ - HỌC KỲ {{$last->HocKy}}/{{$last->NienKhoa}}
        <br>(Theo phòng)
        </h3>
    </div>
    <div class="text-center">
        <div class="col-md-4 col-md-offset-2">
            <select id="link" class="form-control">
                <option selected value="user/thongke/sosanhphong">Thống kê theo phòng</option>
                <option value="user/thongke/sosanhbomon">Thống kê theo bộ môn</option>
                <option value="user/thongke/sosanhhocky">Thống kê theo học kỳ</option>
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
    		    <div class="modal-body text-center">
    		        <form action="user/thongke/sosanhphong" method="post">
    			    	<input type="hidden" name="_token" value="{{csrf_token()}}" />
    			    	<div class="form-group form-inline">
    			    		<label>Tuần</label>
    						<label>Từ</label>
    						
    						<select class="form-control" name="tuanBD">
    							@foreach($allTuan as $tuan)
    								<option value="{{$tuan->id}}">{{$tuan->id}}</option>
    							@endforeach
    						</select>
    						<label>Đến</label>
    						<select class="form-control" name="tuanKT">
    							<option value="0"></option>
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
                            <div class="text-center"><label>Phòng</label></div>
                            @foreach ($allPhong as $p)
                                <?php $i=1; $i++; ?>
                                    @if($i<=7)
                                    <div class="checkbox col-md-4">
                                        <input class="form-inline idphong" type="checkbox" value="{{$p->id}}" name="idPhong[]"> {{$p->TenPhong}}
                                    </div>
                                    @endif
                                    
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

    <div class="col-lg-12 text-center">       
        <div class="col-md-6">
            <div id="SSPhong1" class="targetDiv" style="border: 1px solid #ccc"></div>
        </div>
        <div class="col-md-6">
            <div id="SSPhong2" class="targetDiv" style="border: 1px solid #ccc"></div>
        </div>
    </div>
    <div class="col-md-6 col-md-offset-3">  
        <h3 class="text-center" style="color: blue">BẢNG SỐ LIỆU THỐNG KÊ
        </h3>     
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <tr>
                <th>Tên phòng</th>
                <th>Số lần</th>
                <th>Tỉ lệ (%)</th>
            </tr>
            @foreach($sosanhPhong as $p)
            <tr>
                <td>
                    @foreach($allPhong as $ap)
                        @if($p->idPhong == $ap->id)   
                            {{$ap->TenPhong}}
                        @endif
                    @endforeach
                </td>
                <td>{{$p->SoLan}}</td>
                <td>
                    <?php $phantram = ($p->SoLan/$tong)*100;
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
@endsection

@section('script')
<script type="text/javascript">
    $("#link").change(function()
    {
        document.location.href = $(this).val();
    });
    $(document).ready(function (){
        $('#btXTK').click(function(event){
            
            if(!$('.idphong').is(':checked'))
            {
                alert ("Vui lòng chọn phòng muốn xem!");
                return false;
            }
            else return true;
        })
    });
</script>

@endsection