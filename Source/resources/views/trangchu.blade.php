<?php
use App\LopHocPhan;
use App\GiaoVien;
$soLuongPhong = 0;
?>

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
					    <li style="width: 25%"><a href="trangchu">TRANG CHỦ</a></li>
					    <li style="width: 25%"><a href="admin/phong/danhsach">PHÒNG THỰC HÀNH</a></li>
					    <li style="width: 25%"><a href="admin/lophocphan/danhsach">LỚP HỌC PHẦN</a></li>
					    <li style="width: 25%"><a href="admin/monhoc/danhsach">MÔN HỌC</a></li>
					    <li style="width: 25%"><a href="admin/lich/danhsach">LỊCH THỰC HÀNH</a></li>
					    <li style="width: 25%"><a href="admin/taovande/danhsach">TẠO VẤN ĐỀ</a></li>
					    <li style="width: 25%"><a href="admin/nhatky/danhsach">NHẬT KÝ SỬ DỤNG</a></li>
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
										<input type="radio" name="radioBuoi" value="1" checked/>Sáng
									</label>
									<label class="btn btn-default">
										<input type="radio" name="radioBuoi" value="2"/>Chiều
									</label>
								</div>
							</div>
							<br>
							<table id="ViewTable" class="table table-bordered" style="background-color: white;">
							    <thead>
							      	<tr>							        	
							        	<th width="9%">Phòng</th>
							        	<th width="13%">Thứ 2</th>
							        	<th width="13%">Thứ 3</th>
							        	<th width="13%">Thứ 4</th>
							        	<th width="13%">Thứ 5</th>
							        	<th width="13%">Thứ 6</th>
							        	<th width="13%">Thứ 7</th>
							        	<th width="13%">Chủ nhật</th>
							      	</tr>
						    	</thead>
							    <tbody>									    				
								@foreach($phong as $phong)
							      	<tr>						        								        	
										<td>{{$phong->TenPhong}}</td>
										<td id="{{$phong->id}}2"></td>
							        	<td id="{{$phong->id}}3"></td>
							        	<td id="{{$phong->id}}4"></td>
							        	<td id="{{$phong->id}}5"></td>
							        	<td id="{{$phong->id}}6"></td>
							        	<td id="{{$phong->id}}7"></td> 
							        	<td id="{{$phong->id}}8"></td> 
						     	 	</tr>
						     	 	<?php $soLuongPhong++;?>
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
	$(document).ready(function(){
		$("input[name=radioBuoi]").change(function () {
			var buoiLich = $("input[name=radioBuoi]:checked").val();
       		emptyLich();

       		$.ajax({

	            type: "get",
	            url: "ajax/getLich/" + buoiLich,
	            success: function (data) {
	                console.log(data);
	            	showLich(data);
	                //alert(data.length);
	            },
	            error: function (data) {
	                console.log('Error:', data);
	            }
	        });
    	});
	});
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

	function emptyLich() {
		$(document).ready(function(){
			var i = 1;
			for (i = 1; i < {{$soLuongPhong}}; i++)
			{
			var t = $('#' + i + 2);
			t.html('');
	    	t = $('#' + i + 3);
	    	t.html('');
	    	t = $('#' + i + 4);
	    	t.html('');
	    	t = $('#' + i + 5);
	    	t.html('');
	    	t = $('#' + i + 6);
	    	t.html('');
	    	t = $('#' + i + 7);
	    	t.html(''); 
	    	t = $('#' + i + 8);
	    	t.html('');
	    	}
	    });
	}

	function showLich(data) {
		var jsonLich = '{ "lich" :' + data + '}';
		var obj = JSON.parse(jsonLich);
		//alert(obj.lich.length);
		
		for(i = 0; i < obj.lich.length; i++)
		{
			
			var cell = $('#' + obj.lich[i].idPhong + obj.lich[i].idThu);
			var noidung = obj.lich[i].idLopHocPhan;
			
			cell.text(noidung);
			
		}
	}
</script>

<script type="text/javascript">
 	$(document).ready(function(){ 	
 		@foreach ($lich as $lich) 
 			<?php
 			$lophocphan = LopHocPhan::find( $lich->idLopHocPhan);
 			$giaovien = GiaoVien::find( $lich->idGiaoVien);
 			?>
 			$('#' + {{$lich->idPhong}} + {{$lich->idThu}}).html("{{$lophocphan->TenLop}} - Thầy {{$giaovien->TenGV}}");
 		@endforeach
 	});
</script>