@extends('admin.layout.index')
@section('title')
Phòng- Sửa
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12 text-center" style="color: blue"><h2>SỬA PHÒNG</h2></div>
<div class="col-md-12 text-center" style="padding-top: 10px">
    <a style="width: 20%" class="btn btn-primary" href="admin/phong/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
</div>
<div class="col-md-12" style="padding-top: 10px">
    <div class="panel panel-primary">
        <div class="panel-heading text-center">
            SỬA PHÒNG - {{$phong->TenPhong}}
        </div>
        <div class="panel-body">
            <div class="col-md-8" style="padding-top: 10px">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="admin/phong/sua/{{$phong->id}}" method="POST">
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{session('thongbao')}}
                                </div>
                            @endif
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="col-md-6">
                                <div class="form-group form-inline">
                                    <label>Tên phòng</label>
                                    <input class="form-control pull-right" name="TenPhong" placeholder="Nhập tên phòng" value="{{$phong->TenPhong}}" />
                                </div>
                                <div class="form-group form-inline">
                                    <label>Bộ môn</label>
                                    <select name="idBoMon" class="form-control pull-right">
                                        @foreach($bomon as $bm)
                                            <option
                                            @if($bm->id == $phong->idBoMon)
                                                {{"selected"}}
                                            @endif
                                             value="{{$bm->id}}">{{$bm->TenBM}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group form-inline">
                                    <label>RAM</label>
                                    <input type="number" class="form-control pull-right" name="DLRam" placeholder="Nhập dung lượng RAM" value="{{$phong->DLRam}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-inline">
                                    <label>Ổ cứng</label>
                                    <input type="number" class="form-control pull-right" name="DLOCung" placeholder="Nhập dung lượng ổ cứng" value="{{$phong->DLOCung}}" />
                                </div>
                                <div class="form-group form-inline">
                                    <label>CPU</label>
                                    <input class="form-control pull-right" name="CPU" placeholder="Nhập thông tin CPU" value="{{$phong->CPU}}" />
                                </div>
                                <div class="form-group form-inline">
                                    <label>GPU</label>
                                    <input class="form-control pull-right" name="GPU" placeholder="Nhập thông tin GPU" value="{{$phong->GPU}}" />
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-warning" onclick="return confirm('Bạn có muốn cập nhật {{$phong->TenPhong}}  không?');"><span class="glyphicon glyphicon-edit"> </span> Cập nhật</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <form action="admin/phong/suapm/{{$phong->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <input hidden name="idPhong" value="{{$phong->id}}" />
                    <div class="form-group">
                        <label>Tên phần mềm</label>
                        <select name="idPhanMem" class="form-control">
                            @foreach($phanmem as $p_pm)
                                <option value="{{$p_pm->id}}">{{$p_pm->TenPM}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Thêm phần mềm</button>
                    </div>
                    <br><br>
                </form>
                <!-- <center><label>Các phần mềm</label></center> -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <tr>
                        <th>STT</th>
                        <th>Tên phần mềm</th>
                        <th>Phiên bản</th>
                        <th>Xóa</th>
                    </tr>
                    <?php $i=0; ?>
                    @foreach($phong_phanmem as $pm)
                    <?php $i++; ?>
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$pm->TenPM}}</td>
                        <td>{{$pm->PhienBan}}</td>
                        <td><a href="admin/phong/chitiet/xoaPM/{{$pm->id}}/{{$pm->idPhong}}">Xóa</a></td>
                    </tr>
                    @endforeach
                </table>
            </div> 
        </div>
            
</div>
    <!-- <div class="col-md-4" style="padding-top: 10px">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                Danh sách phần mềm
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <tr>
                        <th>STT</th>
                        <th>Tên phần mềm</th>
                        <th>Phiên bản</th>
                        <th>Xóa</th>
                    </tr>
                    <?php $i=0; ?>
                    @foreach($phong_phanmem as $pm)
                    <?php $i++; ?>
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$pm->TenPM}}</td>
                        <td>{{$pm->PhienBan}}</td>
                        <td><a href="admin/phong/chitiet/xoaPM/{{$pm->id}}/{{$pm->idPhong}}">Xóa</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>        
    </div> -->
@endsection