<!DOCTYPE html>
<html>
<head>
	<title>Hiển thị lịch</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/calendar.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			@include('admin.layout.cover')
		</div>
		<div class="row">
			<div class="col-md-12">
				@include('admin.layout.header')
			</div>
		</div>
		<div class="row">

			@yield('content')
			<div class="col-md-3">
				<button class="btn btn-primary" style="width: 100%; margin-bottom: 10px">ĐĂNG NHẬP</button>
				<div class="panel panel-primary">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">HÌNH ẢNH</h3>
				  	</div>
				  	<div class="panel-body">
					  	<img src="img/hoa.jpg" class="img-responsive">
				  	</div>
				</div>

				<div class="panel panel-primary">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">TIN TỨC- THÔNG BÁO</h3>
				  	</div>
				  	<div class="panel-body">
				    	<li><a href="#">Tin 1</a></li>
				    	<li><a href="#">Tin 1</a></li>
				    	<li><a href="#">Tin 1</a></li>
				    	<li><a href="#">Tin 1</a></li>
				    	<li><a href="#">Tin 1</a></li>
				    	<li><a href="#">Tin 1</a></li>
				    	<li><a href="#">Tin 1</a></li>
				  	</div>
				</div>

				<div class="panel panel-primary">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">LỊCH</h3>
				  	</div>
				  	<div class="panel-body">
				    	<div style="width: 100%;">
				    		<script type="text/javascript">
								var cal = createCal();
								document.write(cal);
							</script>
				    	</div>
				  	<br>
				  	</div>
				  	
				</div>
			</div>

			<div class="col-md-9">
				<div class="panel panel-primary" style="height: auto;">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">CÁC NHÓM HỌC PHẦN ĐÃ ĐĂNG KÝ THỰC HÀNH</h3>
				  	</div>
				  	<div class="panel-body">
				  		<div class="panel panel-info">
				  			<div class="panel-heading">
				  				<h4 class="panel-title">BẬC TIẾN SĨ</h4>
				  			</div>
				  			<div class="panel-body">
				  				<li><a href="#">Nhóm tiến sĩ 1</a></li>
						    	<li><a href="#">Nhóm tiến sĩ 1</a></li>
						    	<li><a href="#">Nhóm tiến sĩ 1</a></li>
						    	<li><a href="#">Nhóm tiến sĩ 1</a></li>
						    	<li><a href="#">Nhóm tiến sĩ 1</a></li>
						    	<li><a href="#">Nhóm tiến sĩ 1</a></li>
						    	<li><a href="#">Nhóm tiến sĩ 1</a></li>
				  			</div>
				  		</div>
				  		<div class="panel panel-info">
				  			<div class="panel-heading">
				  				<h4 class="panel-title">BẬC THẠC SĨ</h4>
				  			</div>
				  			<div class="panel-body">
				  				<li><a href="#">Nhóm thạc sĩ 1</a></li>
						    	<li><a href="#">Nhóm thạc sĩ 1</a></li>
						    	<li><a href="#">Nhóm thạc sĩ 1</a></li>
						    	<li><a href="#">Nhóm thạc sĩ 1</a></li>
						    	<li><a href="#">Nhóm thạc sĩ 1</a></li>
						    	<li><a href="#">Nhóm thạc sĩ 1</a></li>
						    	<li><a href="#">Nhóm thạc sĩ 1</a></li>
				  			</div>
				  		</div>
				  		<div class="panel panel-info">
				  			<div class="panel-heading">
				  				<h4 class="panel-title">BẬC ĐẠI HỌC</h4>
				  			</div>
				  			<div class="panel-body">
				  				<li><a href="#">Nhóm đại học 1</a></li>
						    	<li><a href="#">Nhóm đại học 1</a></li>
						    	<li><a href="#">Nhóm đại học 1</a></li>
						    	<li><a href="#">Nhóm đại học 1</a></li>
						    	<li><a href="#">Nhóm đại học 1</a></li>
						    	<li><a href="#">Nhóm đại học 1</a></li>
						    	<li><a href="#">Nhóm đại học 1</a></li>
				  			</div>
				  		</div>
				  	</div>
				</div>
			</div>
		</div>

		<div class="col-md-12" style="background-color: rgb(51, 122, 183); border-color: #337ab7; color: white; height: 30px; font-size: 16px; padding: 5px;">
			<center><strong>HỆ THỐNG QUẢN LÝ LỊCH THỰC HÀNH KHOA CÔNG NGHỆ THÔNG TIN & TRUYỀN THÔNG</strong></center>
		</div>
	</div>

	@yield('script')
</body>
</html>