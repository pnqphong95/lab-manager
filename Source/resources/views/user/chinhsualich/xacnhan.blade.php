<!DOCTYPE html>
<html>
<head>
	<title>Xác nhận</title>
</head>
<body>

</body>
</html>
<script type="text/javascript">
	var r = confirm ("Không tìm được phòng để chuyển bạn có muốn đưa yêu cầu vào lịch chờ duyệt?"); 
    if (r == true) {
        window.location.href = "/user/chinhsualich/choduyet/{{$id}}";
    } else {
        window.location.href = "/user/chinhsualich";
    }
</script>