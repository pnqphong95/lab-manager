<!-- <img width="100%" src="img/banner.png" class="img-responsive"> -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    
    <ul class="nav navbar-top-links pull-right">
        <li>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> Thông tin tài khoản</a></li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Cài đặt</a></li>
                <li class="divider"></li>
                <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a></li>
                <li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>  
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="admin/trangchu"><i class="fa fa-dashboard fa-fw"></i>Trang chủ</a>
                </li>
                <li><!--Lịch-->
                    <a href="admin/lich/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i> LỊCH THỰC HÀNH<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/lich/danhsach#lich">Lịch</a>
                        </li>
                        <li>
                            <a href="admin/lich/danhsach#choduyet">Yêu cầu chờ duyệt</a>
                        </li>
                        <li>
                            <a href="admin/lich/danhsachemail">Email</a>
                        </li>
                        <li>
                            <a href="admin/lich/dangkyphong">Đăng ký phòng</a>
                        </li>
                    </ul>
                </li>
                <li><!--Bộ môn-->
                    <a href="admin/bomon/danhsach"><i class="fa fa-cube fa-fw"></i> BỘ MÔN<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/bomon/danhsach">Danh sách</a>
                        </li>
                        <li>
                            <a href="admin/bomon/them">Thêm</a>
                        </li>
                    </ul>
                </li>
                <li><!--chức vụ-->
                    <a href="admin/chucvu/danhsach"><i class="fa fa-cube fa-fw"></i> CHỨC VỤ<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/chucvu/danhsach">Danh sách</a>
                        </li>
                        <li>
                            <a href="admin/chucvu/them">Thêm</a>
                        </li>
                    </ul>
                </li>
                <li><!--giáo viên-->
                    <a href="admin/giaovien/danhsach"><i class="fa fa-cube fa-fw"></i> GIÁO VIÊN<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/giaovien/danhsach">Danh sách</a>
                        </li>
                        <li>
                            <a href="admin/giaovien/them">Thêm</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="admin/taikhoan/danhsach"><i class="fa fa-cube fa-fw"></i> TÀI KHOẢN<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/taikhoan/danhsach">Danh sách</a>
                        </li>
                        <li>
                            <a href="admin/taikhoan/them">Thêm</a>
                        </li>
                    </ul>
                </li>
                <li> <!--phòng-->
                    <a href="admin/phong/danhsach"><i class="fa fa-cube fa-fw"></i> PHÒNG<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/phong/danhsach">Danh sách</a>
                        </li>
                        <li>
                            <a href="admin/phong/them">Thêm</a>
                        </li>
                    </ul>
                </li>
                <li> <!--môn học-->
                    <a href="admin/monhoc/danhsach"><i class="fa fa-cube fa-fw"></i> MÔN HỌC<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/monhoc/danhsach">Danh sách</a>
                        </li>
                        <li>
                            <a href="admin/monhoc/them">Thêm</a>
                        </li>
                    </ul>
                </li>
                <li> <!--phần mềm-->
                    <a href="admin/phanmem/danhsach"><i class="fa fa-cube fa-fw"></i> PHẦN MỀM<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/phanmem/danhsach">Danh sách</a>
                        </li>
                        <li>
                            <a href="admin/phanmem/them">Thêm</a>
                        </li>
                    </ul>
                </li>
                <li> <!--vấn đề-->
                    <a href="admin/taovande/danhsach"><i class="fa fa-cube fa-fw"></i> VẤN ĐỀ<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/vande/danhsach">Danh sách</a>
                        </li>
                        <li>
                            <a href="admin/vande/them">Thêm</a>
                        </li>
                    </ul>
                </li>
                <li> <!--thống kê-->
                    <a href="admin/thongke/danhsach"><i class="fa fa-cube fa-fw"></i> THỐNG KÊ<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/thongke/danhsach">Danh sách</a>
                        </li>
                        <li>
                            <a href="admin/thongke/them">Thêm</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>