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
                <i class="fa fa-user fa-fw"></i> {{Auth::user()->HoGV}} {{Auth::user()->TenGV}} <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="admin/giaovien/chitiet/{{Auth::user()->id}}"><i class="fa fa-user fa-fw"></i> Thông tin tài khoản</a></li>
                <li class="divider"></li>
                <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a></li>
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
                    <a href="user/trangchu"><i class="fa fa-dashboard fa-fw"></i>Trang chủ</a>
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
                <li><!--giáo viên-->
                    <a href="admin/giaovien/danhsach"><i class="fa fa-cube fa-fw"></i> NGƯỜI DÙNG<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/giaovien/danhsach">Danh sách</a>
                        </li>
                        <li>
                            <a href="admin/giaovien/them">Thêm</a>
                        </li>
                    </ul>
                </li>
                <!--môn học-->
                <li> 
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
                <!--phần mềm-->
                <li> 
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
                <!--vấn đề-->
                <li> 
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
                <li> 
                    <a href="admin/duyetlich/danhsach"><i class="fa fa-cube fa-fw"></i> DUYỆT LỊCH<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/duyetlich/danhsach">Danh sách</a>
                        </li>
                    </ul>
                </li>
                <!--thống kê-->
                <li> 
                    <a href="admin/thongke/danhsach"><i class="fa fa-cube fa-fw"></i> THỐNG KÊ<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <!-- <li>
                            <a href="admin/thongke/danhsach">Toàn học kỳ</a>
                        </li>
                        <li>
                            <a href="admin/thongke/tuan">Số lần dùng phòng qua các tuần</a>
                        </li> -->
                        <li>
                            <a href="admin/thongke/sosanhphong">Thống kê theo phòng</a>
                        </li>
                        <li>
                            <a href="admin/thongke/sosanhbomon">Thống kê theo bộ môn</a>
                        </li>
                        <li>
                            <a href="admin/thongke/sosanhhocky">Thống kê theo học kỳ</a>
                        </li>
                        <!-- <li>
                            <a href="admin/thongke/bieudotron/sosanh">So sánh</a>
                        </li> -->
                    </ul>
                </li>
                @role('admin')
                <li> <!--phòng-->
                    <a href="admin/hocky/danhsach"><i class="fa fa-cube fa-fw"></i> HỌC KỲ-NIÊN KHÓA<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/hocky/danhsach">Danh sách</a>
                        </li>
                        <li>
                            <a href="admin/hocky/them">Thêm</a>
                        </li>
                    </ul>
                </li>
                @endrole
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>