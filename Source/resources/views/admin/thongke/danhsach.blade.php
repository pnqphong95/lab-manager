@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h1 class="page-header">Thống kê tình trạng sử dụng phòng thực hành
    </h1>

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	    <thead>
	        <tr align="center">
	            <th>Tuần</th>
	            <th>Phòng</th>
	            <th>Số buổi</th>
	            <th>Vấn đề</th>
	            <th>Delete</th>
	            <th>Edit</th>
	        </tr>
	    </thead>
	    <tbody>
	    	@if(session('thongbao'))
	    		<div class="alert alert-success">
	    			{{session('thongbao')}}
	    		</div>
	    	@endif	
	        @foreach($lich as $l)
	            <tr class="odd gradeX" align="center">
	                <td>{{$l->idTuan}}</td>
	                <td>{{$l->idPhong}}</td>
	                <td>
	                	
	                </td>
	                <td></td>
	                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/thongke/xoa/{{$l->id}}"> Xóa</a></td>
	                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/thongke/sua/{{$l->id}}">Sửa</a></td>
	            </tr>
	        @endforeach
	    </tbody>
	</table>
</div>

<div class="row">

	<script src="https://raw.githubusercontent.com/nnnick/Chart.js/master/dist/Chart.bundle.js"></script>
	<script>
	    var year = ['2013','2014','2015', '2016'];
	    var data_click = <?php echo $click; ?>;
	    var data_viewer = <?php echo $viewer; ?>;

	    var barChartData = {
	        labels: year,
	        datasets: [{
	            label: 'Click',
	            backgroundColor: "rgba(220,220,220,0.5)",
	            data: data_click
	        }, {
	            label: 'View',
	            backgroundColor: "rgba(151,187,205,0.5)",
	            data: data_viewer
	        }]
	    };

	    window.onload = function() {
	        var ctx = document.getElementById("canvas").getContext("2d");
	        window.myBar = new Chart(ctx, {
	            type: 'bar',
	            data: barChartData,
	            options: {
	                elements: {
	                    rectangle: {
	                        borderWidth: 2,
	                        borderColor: 'rgb(0, 255, 0)',
	                        borderSkipped: 'bottom'
	                    }
	                },
	                responsive: true,
	                title: {
	                    display: true,
	                    text: 'Yearly Website Visitor'
	                }
	            }
	        });

	    };
	</script>

	<div class="container">
	    <div class="row">
	        <div class="col-md-10 col-md-offset-1">
	            <div class="panel panel-default">
	                <div class="panel-heading">Dashboard</div>
	                <div class="panel-body">
	                    <canvas id="canvas" height="280" width="600"></canvas>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>

@endsection