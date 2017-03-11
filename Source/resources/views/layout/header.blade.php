<div id="baner">
    <div id="banner"></div>
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
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="user/trangchu">Trang chủ</a>
                    </li>
                    @if(Auth::user())
                    <li>
                        <a href="user/dangkyphong">Đăng ký phòng BM</a>
                    </li>
                    <li>
                        <a href="user/vande">Tạo và gửi vấn đề</a>
                    </li>
                    <li>
                        <a href="user/DKphongBMkhac">Đăng ký phòng khác</a>
                    </li>                   
                   
                @endif
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                @if(!Auth::user())                
                    <li><a href="{{route('getLogin')}}"></span>Đăng nhập</a></li>                
                @else
                    <li>
                        <a>
                            Xin chào! <strong>{{Auth::user()->TenGV}}</strong> (Đăng xuất)
                        </a>
                    </li>                     
                @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
    </nav>
</div> <!-- /banner -->