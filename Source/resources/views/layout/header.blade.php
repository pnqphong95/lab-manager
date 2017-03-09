<div id="baner">
 
	<img width="100%" src="img/banner.png" class="img-responsive">
    <div class="blank" style=" margin-bottom: 10px;"></div>
	<nav class="navbar navbar-inverse menubar" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                	<li>
                        <a href="user/trangchu">Trang chủ</a>
                    </li>
                    @if(Auth::user())
                    <li>
                        <a href="user/dangkyphong">Đăng ký phòng thực hành</a>
                    </li>
                    <li>
                        <a href="services.html">Tạo và gửi vấn đề</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Portfolio <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="portfolio-1-col.html">1 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-2-col.html">2 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-3-col.html">3 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-4-col.html">4 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-item.html">Single Portfolio Item</a>
                            </li>
                        </ul>
                    </li>
                   
                @endif
                </ul>
                

                @if(!Auth::user())
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('getLogin')}}"></span>Đăng nhập</a></li>
                </ul>
                @endif
            </div>
            <!-- /.navbar-collapse -->
    </nav>
</div> <!-- /banner -->