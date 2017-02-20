<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/hd-menu.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/content.css') }}">

	<script type="text/javascript" src="js/calendar.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div style="background-color: #0066ff;" class="header">
				<img style="max-width: 100%;" src="img/img-hd.png">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 menu">
				<ul>
					<li><a href="#">Trang chủ</a></li>
					<li><a href="#">Các lớp học</a></li>
					<li><a href="#">Tin tức - thông báo</a></li>
					<li><a href="#">Ghi danh</a></li>
				</ul>
			</div>

			<div class="col-md-12 content">
				<div class="row">
					<div style="background-color: white; border-left: 1px solid; border-right: 1px solid; border-color: #1a8cff; height: 450px" class="col-md-3">
						<div class="row">
							<div class="box box-default">
							    <div class="box-heading">
							    	{{if($user = Auth::user())
									{
									    
									    $user->TenGV;
									}}}
								</div>
							    <div class="box-body">
							    	<div>
							    		Tên đăng nhập:
							    		<input type="text" name=""><br>
							    		Mật khẩu:
							    		<input type="text" name=""><br>
							    		<a href="{{route('getLogin')}}">Đăng nhập</a>
							    	</div>
							    </div>
	  						</div>

	  						<div class="box box-default">
							    <div class="box-heading">LỊCH</div>
							    <div class="box-body">
							    	<div style="width: 100%;">
							    		<script type="text/javascript">
											var cal = createCal();
											document.write(cal);
										</script>
							    	</div>
							    </div>
	  						</div>
						</div>
					</div>
					<div style="background-color: white; border-right: 1px solid; border-color: #1a8cff; height: 450px" class="col-md-9">
						<div class="box box-default">
						    <div class="box-heading">TIN TỨC - THÔNG BÁO</div>
						    <div class="box-body">
						    	<div>
						    		<table class="table table-bordered">
						    			<tr>
						    				<th></th>
						    				<th>Thứ hai</th>
						    				<th>Thứ ba</th>
						    				<th>Thứ tư</th>
						    				<th>Thứ năm</th>
						    				<th>Thứ sáu</th>
						    				<th>Thứ bảy</th>
						    				<th>Chủ nhật</th>
						    			</tr>
						    			
						    			<tr>
						    				<td>1</td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></th>						    		
						    			</tr>

						    			<tr>
						    				<td>1</td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></th>						    		
						    			</tr>

						    			<tr>
						    				<td>1</td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></th>						    		
						    			</tr>

						    			<tr>
						    				<td>1</td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></th>						    		
						    			</tr>

						    			<tr>
						    				<td>1</td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></th>						    		
						    			</tr>

						    			<tr>
						    				<td>1</td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></th>						    		
						    			</tr>

						    			<tr>
						    				<td>1</td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></th>						    		
						    			</tr>

						    			<tr>
						    				<td>1</td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></th>						    		
						    			</tr>

						    			<tr>
						    				<td>1</td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></td>
						    				<td></th>						    		
						    			</tr>

						    		</table>
						    	</div>
						    </div>
  						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12 footer">
			Hệ thống quản lý phòng thực hành khoa Công Nghệ Thông Tin & Truyền thông
			</div>
			<div style="margin-top: 10px;" class="col-md-12">
			<p>
			<center>
			Khoa Công Nghệ Thông Tin & Truyền thông <br>
			Trường đại học Cần Thơ - Khu 2	<br>
			Đường 3 tháng 2, Quận Ninh Kiều, TP. Cần Thơ.<br>
			</center>
			</p>
			</div>
		</div>
	</div>
</body>
</html>