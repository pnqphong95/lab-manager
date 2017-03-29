<div id="baner">
    <div id="bg-banner">
        <div id="header-login">
            @if(!Auth::user())
            <span>Bạn chưa đăng nhập (</span>
            <a style="color: yellow;" href="login">Đăng nhập</a>
            <span>)</span>
            @else
            <span>Xin chào! </span>
            <a href="user/thongtin/{{Auth::user()->id}}">
            <span style="color: yellow;"> {{Auth::user()->HoGV}} {{Auth::user()->TenGV}}</span>
            </a>
            <span> ( </span>
            <a style="color: red;" href="logout">Thoát</a>
            <span>)</span>
            @endif
        </div>
    </div>
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
                        <a href="user/cacyeucau">Các yêu cầu phòng</a>
                    </li> 
                    <li>
                        <a href="user/lichthuchanh">Lịch thực hành</a>
                    </li>

                   
                @endif
                </ul>
                
                
            </div>
            <!-- /.navbar-collapse -->
    </nav>
</div> <!-- /banner -->