<?php
use App\LopHocPhan;
use App\GiaoVien;
$soLuongPhong = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Trang nhất</title>
    <base href="{{asset('')}}">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    
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
    
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    @yield('script')
</body>
</html>

