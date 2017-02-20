<!DOCTYPE html>
<html>
<head>
	<title>Trang nhất</title>
	<link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12"><img src="img/img-hd.png" width="100%"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="navigation" style="font-weight: bold;width:100%">
				  	<ul class="pagination">
					    <li><a href="#">TRANG CHỦ</a></li>
					    <li><a href="#">CÁC LỚP HỌC PHẦN</a></li>
					    <li><a href="#">ĐĂNG KÝ LỊCH THỰC HÀNH</a></li>
					    <li><a href="#">DANH SÁCH THỰC HÀNH</a></li>
					    <li><a href="#">XEM THÊM</a></li>
					    <li><a href="#">ĐIỀU CHỈNH LỊCH</a></li>
					    <li><a href="#">XEM THÊM</a></li>
				  	</ul>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<button class="btn btn-primary" style="font-weight: bolder;width: 100%">ĐĂNG NHẬP</button>

				<div class="panel panel-primary">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">ĐĂNG NHẬP</h3>
				  	</div>
				  	<div class="panel-body">
				    	<label>Tài khoản</label>
				    	<input class="form-control" type="text" name="TaiKhoan">
				    	<label>Mật khẩu</label>
				    	<input class="form-control" type="text" name="TaiKhoan">
				  	</div>
				  	<center><button class="btn btn-primary">Đăng nhập</button></center>
				  	<br>
				</div>

				<div class="panel panel-primary">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">ĐĂNG NHẬP</h3>
				  	</div>
				  	<div class="panel-body">
				    	<div id="calendar"></div>
				  	</div>				  	
				</div>				
			</div>

			<div class="col-md-9">
				<div class="panel panel-primary">
				  	<div class="panel-heading">
				    	<h3 class="panel-title"><center>THÔNG TIN LỊCH THỰC HÀNH</center></h3>
				  	</div>
				  	<div class="panel-body">
				    	<div class="well well-sm">				    	
				    		<div>
					    		<div class="btn-group" data-toggle="buttons">
					    			<label class="btn btn-default">
										Tuần
									</label>
					    			<label class="btn btn-default active">
										<input type="radio" name="radioName" value="1" checked/>1
									</label>
									<label class="btn btn-default">
										<input type="radio" name="radioName" value="2" />2
									</label>
									<label class="btn btn-default">
										<input type="radio" name="radioName" value="3" />3
									</label>
									<label class="btn btn-default ">
										<input type="radio" name="radioName" value="4" />4
									</label>
									<label class="btn btn-default">
										<input type="radio" name="radioName" value="5" />5
									</label>
									<label class="btn btn-default">
										<input type="radio" name="radioName" value="6" />6
									</label>
									<label class="btn btn-default ">
										<input type="radio" name="radioName" value="7" />7
									</label>
									<label class="btn btn-default">
										<input type="radio" name="radioName" value="8" />8
									</label>
									<label class="btn btn-default">
										<input type="radio" name="radioName" value="9" />9
									</label>
									<label class="btn btn-default ">
										<input type="radio" name="radioName" value="10" />10
									</label>
									<label class="btn btn-default ">
										<input type="radio" name="radioName" value="11" />11
									</label>
									<label class="btn btn-default">
										<input type="radio" name="radioName" value="12" />12
									</label>
									<label class="btn btn-default">
										<input type="radio" name="radioName" value="13" />13
									</label>
									<label class="btn btn-default ">
										<input type="radio" name="radioName" value="14" />14
									</label>
									<label class="btn btn-default">
										<input type="radio" name="radioName" value="15" />15
									</label>
									<label class="btn btn-default">
										<input type="radio" name="radioName" value="16" />16
									</label>
									<label class="btn btn-default ">
										<input type="radio" name="radioName" value="17" />17
									</label>
									<label class="btn btn-default">
										<input type="radio" name="radioName" value="18" />18
									</label>
								</div>
					
							
								<div style="margin-top: 10px;" class="btn-group" data-toggle="buttons">
									<label class="btn btn-default">
										Buổi
									</label>
					    			<label class="btn btn-default active">
										<input type="radio" name="radioBuoi" value="0" checked/>Sáng
									</label>
									<label class="btn btn-default">
										<input type="radio" name="radioBuoi" value="1"/>Chiều
									</label>
								</div>
							</div>
							<br>
							<table id="ViewTable" class="table table-bordered" style="background-color: white;">
							    <thead>
							      	<tr>							        	
							        	<th>Phòng</th>
							        	<th>Thứ 2</th>
							        	<th>Thứ 3</th>
							        	<th>Thứ 4</th>
							        	<th>Thứ 5</th>
							        	<th>Thứ 6</th>
							        	<th>Thứ 7</th>
							      	</tr>
						    	</thead>
							    <tbody>		
							    <?php $idphong = 1; ?>				
								@foreach($phong as $phong)
							      	<tr>						        								        	
										<td>{{$phong->TenPhong}}</td>
										<td id="{{$idphong}}2"></td>
							        	<td id="{{$idphong}}3">aaa</td>
							        	<td id="{{$idphong}}4"></td>
							        	<td id="{{$idphong}}5"></td>
							        	<td id="{{$idphong}}6"></td>
							        	<td id="{{$idphong}}7"></td>
							        	<?php $idphong++; ?>									        	
						     	 	</tr>
					     	 	@endforeach												      	
							    </tbody>
						  	</table>
				    	</div>				    	
				  	</div>
				  	
				</div>
			</div>
		</div>

		<div class="col-md-12" style="background-color: rgb(51, 122, 183); border-color: #337ab7; color: white; height: 30px; font-size: 16px; padding: 5px;">
			<center><strong>HỆ THỐNG QUẢN LÝ LỊCH THỰC HÀNH KHOA CÔNG NGHỆ THÔNG TIN & TRUYỀN THÔNG</strong></center>
		</div>
	</div>
	
	<script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
</body>
</html>

<script type="text/javascript">


	//get val() radioFormTuan
	$('#myForm input').on('change', function() {
	   var nameTuan = $('input[name=radioName]:checked', '#myForm').val();
	   $('#nameTuan').html(nameTuan);
	});

	$('body').on('load', function(){
		@for($i = 0; $i<1; $i++)
		var a = $('#13').val();
		alert(a);
		@endfor
	});
	

</script>