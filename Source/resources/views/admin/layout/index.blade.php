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
	<base href="{{asset('')}}">
</head>
<body>
	<div class="container">
		@include('admin.layout.anhbia')

		@include('admin.layout.header')	
		
		<div class="row">
			
			@include('admin.layout.col3')

			@yield('content')
		</div>

		@include('admin.layout.footer')
	</div>
	
	<script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>

	@yield('script')
</body>
</html>

