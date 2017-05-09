@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

    <div class="container-fluid">
        <div class="row">    
			<div class="panel panel-primary" style="height: auto;">
				<div class="panel-heading text-center">TRANG CHỦ</div>
				<div class="panel-body">
					<div class="row">
					  	<div class="col-md-3">
					    	<a href="admin/phong/danhsach" class="thumbnail">
					      		<img src="img/phong.png">
					      		<center>PHÒNG THỰC HÀNH</center>
					    	</a>
					  	</div>
					  	<div class="col-md-3">
					    	<a href="admin/phanmem/danhsach" class="thumbnail">
					      		<img src="img/phanmem.png">
					      		<center>PHẦN MỀM</center>
					    	</a>
					  	</div>
					  	<div class="col-md-3">
					    	<a href="admin/monhoc/danhsach" class="thumbnail">
					      		<img src="img/monhoc.png">
					      		<center>MÔN HỌC</center>
					    	</a>
					  	</div>
					  	<div class="col-md-3">
					    	<a href="admin/giaovien/danhsach" class="thumbnail">
					      		<img src="img/user.png">
					      		<center>NGƯỜI DÙNG</center>
					    	</a>
					  	</div>
					</div>
					<div class="row">
						<div class="col-md-3">
					    	<a href="admin/lichsu_choduyet/danhsach" class="thumbnail">
					      		<img src="img/choduyet.png">
					      		<center>DUYỆT LỊCH</center>
					    	</a>
					  	</div>
					  	<div class="col-md-3">
					    	<a href="admin/vande/danhsach" class="thumbnail">
					      		<img src="img/issue.png">
					      		<center>VẤN ĐỀ</center>
					    	</a>
					  	</div>
					  	<div class="col-md-3">
					    	<a href="admin/thongke/danhsach" class="thumbnail">
					      		<img src="img/thongke.png">
					      		<center>THỐNG KÊ</center>
					    	</a>
					  	</div>
					  	<div class="col-md-3">
					    	<a href="admin/hocky/danhsach" class="thumbnail">
					      		<img src="img/hocky.png">
					      		<center>HỌC KỲ NIÊN KHÓA</center>
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