<!-- <img width="100%" src="img/banner.png" class="img-responsive"> -->
    <div class="navbar-default sidebar" role="navigation" style="margin-top: 0px;">
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
                <li><!--lớp học phần-->
                    <a href="admin/giaovien/danhsach"><i class="fa fa-cube fa-fw"></i> LỚP HỌC PHẦN<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/lophocphan/danhsach">Danh sách</a>
                        </li>
                        <li>
                            <a href="admin/lophocphan/them">Nhập từ excel</a>
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
                            <a href="admin/thongke/sosanhphong">So sánh theo phòng</a>
                        </li>
                        <li>
                            <a href="admin/thongke/sosanhbomon">So sánh theo bộ môn</a>
                        </li>
                        <li>
                            <a href="admin/thongke/sosanhhocky">So sánh theo học kỳ</a>
                        </li>
                        <!-- <li>
                            <a href="admin/thongke/bieudotron/sosanh">So sánh</a>
                        </li> -->
                    </ul>
                </li>
                @role('admin')
                <li> <!--phòng-->
                    <a href="admin/phong/danhsach"><i class="fa fa-cube fa-fw"></i> HỌC KỲ-NIÊN KHÓA<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Danh sách</a>
                        </li>
                        <li>
                            <a href="#">Thêm</a>
                        </li>
                        <li>
                            <a href="#">So sánh giữa các phòng</a>
                        </li>
                        <li>
                            <a href="#">Số lần được dùng của các phòng</a>
                        </li>
                    </ul>
                </li>
                @endrole
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
