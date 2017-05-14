@extends('admin.layout.index')
@section('title')
Phòng - Thêm
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12" style="padding-top: 10px">
    <table width="100%">
        <tr>
            <td style="text-align: left;">
                <h3>THÊM MỚI PHÒNG</h3>
            </td>
            <td>
                <div class="pull-right">
                    <a class="btn btn-primary" href="admin/phong/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
                </div>
            </td>
        </tr>
    </table>
</div>
<hr>
<br>

<div class="col-md-12" style="padding-top: 10px">
    @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}
            @endforeach
        </div>
    @endif

    @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif
    <ul class="list-group">
        <li class="list-group-item">
            <div class="row">
                <form action="admin/phong/them" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tên phòng</label>
                            <input class="form-control" name="TenPhong" placeholder="Nhập tên phòng" />
                        </div>
                        <div class="form-group">
                            <label>Bộ môn</label>
                            <select name="idBoMon" class="form-control">
                                @foreach($allBoMon as $bomon)
                                <option value="{{$bomon->id}}">{{$bomon->TenBM}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Dung lượng ram</label>
                            <input type="number" class="form-control" name="DLRam" placeholder="Nhập dung lượng ram" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Dung lượng ổ cứng</label>
                            <input type="number" class="form-control" name="DLOCung" placeholder="Nhập dung lượng ổ cứng" />
                        </div>
                        <div class="form-group">
                            <label>CPU</label>
                            <input class="form-control" name="CPU" placeholder="Nhập thông tin CPU" />
                        </div>
                        <div class="form-group">
                            <label>GPU</label>
                            <input class="form-control" name="GPU" placeholder="Nhập thông tin GPU" />
                        </div>
                    </div>        
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <a href="admin/phong/danhsach" class="btn btn-default">Hủy</a>
                    </div>
                </form>
            </div>
        </li>
    </ul>
</div>

@endsection

<!-- @section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID
            
            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="col-md-4 pull-left"><input class="form-control" type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
                }
            });
            
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });
    </script>
@endsection -->