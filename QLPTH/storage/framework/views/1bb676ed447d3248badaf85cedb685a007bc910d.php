<!DOCTYPE html>
<html>
<head>
	<title>Quản lý phòng thực hành</title>
</head>
<body>
	<h1>Chào mừng đến với hệ thông quản lý phòng thực hành!</h1>
	<form action="<?php echo e(route('dangnhap')); ?>" method="post">
		Đăng nhập <br>
		Tài khoản <input type="text" name="taikhoan"> <br>
		Mật khẩu <input type="password" name="matkhau"> <br>
		<input type="submit" name="submit">
	</form>
</body>
</html>