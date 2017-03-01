<div id="baner">
 
	<img width="100%" src="img/banner.png" class="img-responsive">

	<div class="menubar">
		
		<nav class="navbar navbar-default">
				<div class="container-fluid">
				<div class="navbar-header">
  					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>                        
  					</button>

				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
  					<ul class="nav navbar-nav">
    					<li class="active"><a href="#">TRANG CHỦ</a></li>
    					<li class=""><a href="#">ĐĂNG KÝ PHÒNG THỰC HÀNH</a></li>	
  					</ul>
  					<ul class="nav navbar-nav navbar-right">
					@if(!Auth::user())
    					<li><a href="{{route("getLogin")}}">ĐĂNG NHẬP</a></li>
					@endif
  					</ul>
				</div>
				</div>
		</nav>

	</div> <!-- /menubar -->
</div> <!-- /banner -->