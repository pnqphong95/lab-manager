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
                    @if(!Auth::user())
                    <li>
                        <a href="/">TRANG CHỦ</a>
                    </li>
                    @endif

                    @if(Auth::user())
                    <li>
                        <a href="/user/trangchu">TRANG CHỦ</a>
                    </li>
                    @endif
                    @role('normal')                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">TÍNH NĂNG
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="user/dangkyphong">ĐĂNG KÝ PHÒNG</a>
                            </li>
                            <li>
                                <a href="user/vande">PHẢN HỒI PHÒNG</a>
                            </li>                    
                            <li>
                                <a href="user/lichthuchanh">LỊCH DẠY & LỊCH CHỜ DUYỆT</a>
                            </li>
                        </ul>
                    </li>
                    @endrole
                    @role('manager')
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">QUẢN LÝ
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="user/cacyeucau">YÊU CẦU PHÒNG</a>
                            </li> 
                            <li>
                                <a href="user/chinhsualich">ĐIỀU CHỈNH LỊCH</a>
                            </li>
                            <li>
                                <a href="user/duyetlich/danhsach">ĐIỀU CHỈNH LỊCH</a>
                            </li>
                        </ul>
                    </li>
                                        
                    @endrole
                    @role ('admin')
                    <li>
                        <a href="admin/trangchu">ADMIN-PAGE</a>
                    </li>
                    @endrole
                </ul>

            </div>
            <!-- /.navbar-collapse -->
    </nav>
</div> <!-- /banner -->