<!DOCTYPE html>
<html>
<head>
	<title>Tai Khoan</title>
</head>
<body>
	<table border="1px">
		<tr>
			<th>
				Tài khoản
			</th>
			<th>
				Mật khẩu
			</th>
			<th>
				Trạng thái
			</th>
			<th>
				Hành động
			</th>
		</tr>
		@foreach($data as $taikhoan)
		<tr>
			<td>{{ $taikhoan['id'] }}</td>
			<td>{{ $taikhoan['TenBM'] }}</td>
			<td>{{ $taikhoan['KichHoat'] }}</td>
			<td><a href="{{route('root')}}">Sửa</a></td>
		</tr>
		@endforeach
	</table>
	
		
	    
	    
	
</body>
</html>
