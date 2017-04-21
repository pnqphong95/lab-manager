@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

    <div class="container-fluid">
        <div class="row">    
			<div class="panel panel-primary" style="height: auto;">
				<div class="panel-heading text-center">TRANG CHỦ</div>
				<div class="panel-body">
					<div class="row">
						<!-- <div class="col-xs-6 col-md-3"> -->
					  	<div class="col-xs-3" style="width: 20%">
					    	<a href="admin/lich/danhsach" class="thumbnail">
					      		<img src="img/lich.png">
					      		<center>LỊCH THỰC HÀNH</center>
					    	</a>
					  	</div>
					  	<div class="col-xs-3" style="width: 20%">
					    	<a href="admin/phong/danhsach" class="thumbnail">
					      		<img src="img/phong.png">
					      		<center>PHÒNG THỰC HÀNH</center>
					    	</a>
					  	</div>
					  	<div class="col-xs-3" style="width: 20%">
					    	<a href="admin/phanmem/danhsach" class="thumbnail">
					      		<img src="img/phong.png">
					      		<center>PHẦN MỀM</center>
					    	</a>
					  	</div>
					  	<div class="col-xs-3" style="width: 20%">
					    	<a href="#" class="thumbnail">
					      		<img src="img/phanmem.png">
					      		<center>MÔN HỌC</center>
					    	</a>
					  	</div>
					  	<div class="col-xs-3" style="width: 20%">
					    	<a href="#" class="thumbnail">
					      		<img src="img/nhatky.png">
					      		<center>BỘ MÔN</center>
					    	</a>
					  	</div>
					</div>
					<div class="row">
					  	<div class="col-xs-3" style="width: 20%">
					    	<a href="#" class="thumbnail">
					      		<img src="img/user.png">
					      		<center>QUẢN LÝ GIÁO VIÊN</center>
					    	</a>
					  	</div>
					  	<div class="col-xs-3" style="width: 20%">
					    	<a href="#" class="thumbnail">
					      		<img src="img/issue.png">
					      		<center>VẤN ĐỀ</center>
					    	</a>
					  	</div>
					  	<div class="col-xs-3" style="width: 20%">
					    	<a href="#" class="thumbnail">
					      		<img src="img/user.png">
					      		<center>VAI TRÒ</center>
					    	</a>
					  	</div>
					  	<div class="col-xs-3" style="width: 20%">
					    	<a href="#" class="thumbnail">
					      		<img src="img/thongke.png">
					      		<center>THỐNG KÊ</center>
					    	</a>
					  	</div>
					</div>
				</div>
			</div>
		</div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

<!-- /#page-wrapper -->

@endsection