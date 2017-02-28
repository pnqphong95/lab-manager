<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
	<link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/mystyle.css')}}">
</head>
<body>
	<div class = "container">

		<div class="wrapper">
			<form action="{{url('login')}}" method="post" name="Login_Form" class="form-signin">  
				<input type="hidden" name="_token" value="{{ csrf_token() }}">    
			    <h4 class="form-signin-heading">Đăng nhập tại đây với tên đăng nhập và mật khẩu mà bạn đã được cung cấp.</h3>
				  	<hr class="colorgraph"><br>
				  	@include('errors.login-form-error');
				  	
				  	<input type="text" class="form-control" name="Username" placeholder="Username"  autofocus="" />
				  	<input type="password" class="form-control" name="Password" placeholder="Password" />     		  
				 
				  	<button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="submit">Đăng nhập</button> 				  
			</form>			
		</div>
	</div>
</body>
</html>