@extends('admin.layout.index')
@section('title')
Giảng viên - Sửa
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12 text-center" style="color: blue"><h2>SỬA GIẢNG VIÊN</h2></div>
<div class="col-md-12 text-center" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/giaovien/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
</div>
<div class="col-md-12" style="padding-top: 10px">
    <div class="panel panel-primary">
    	<div class="panel-heading text-center">
    		SỬA GIẢNG VIÊN - {{$giaovien->MaGV}} - {{$giaovien->HoGV}} {{$giaovien->TenGV}}
    	</div>
    	<div class="panel-body">
    		@if(count($errors)>0)
	    		<div class="alert alert-danger">
	    			@foreach($errors->all() as $err)
	    				{{$err}}<br>
	    			@endforeach
	    		</div>
	    	@endif

	    	@if(session('thongbao'))
	    		<div class="alert alert-success">
	    			{{session('thongbao')}}
	    		</div>
	    	@endif

		    <div class="col-md-8">
		    	<form action="admin/giaovien/sua/{{$giaovien->id}}" method="POST">
			        <input type="hidden" name="_token" value="{{csrf_token()}}" />
			        <div class="col-md-6">
			        	<div class="form-group">
				            <label>Mã giảng viên</label>
				            <input class="form-control" name="MaGV" value="{{$giaovien->MaGV}}" placeholder="Nhập mã giảng viên" />
				        </div>
				        <div class="form-group">
				            <label>Họ</label>
				            <input class="form-control" name="HoGV" value="{{$giaovien->HoGV}}" placeholder="Nhập học giảng viên" />
				        </div>
				        <div class="form-group">
				            <label>Tên</label>
				            <input class="form-control" name="TenGV" placeholder="Nhập tên giảng viên" value="{{$giaovien->TenGV}}"/>
				        </div>
				        <div class="form-group">
				            <label>Ngày sinh</label>
				            <input type="date" class="form-control" name="NgaySinh" value="{{$giaovien->NgaySinh}}"/>
				        </div>
				        <div class="form-group">
				            <label>Giới tính</label>
				            <select name="GioiTinh" class="form-control">
				                @if($giaovien->GioiTinh == 0)
				                	<option selected value="0">Nam</option>
				                	<option value="1">Nữ</option>
				                @elseif($giaovien->GioiTinh == 1)
				                	<option selected value="1">Nữ</option>
				                	<option value="0">Nam</option>
				                @endif
				            </select>
				        </div>
			        </div>
				    <div class="col-md-6">
				    	<div class="form-group">
				            <label>Số điện thoại</label>
				            <input type="number" class="form-control" name="SDT" placeholder="Nhập Số điện thoại" value="{{$giaovien->SDT}}"/>
				        </div>
				        <div class="form-group">
				            <label>Email</label>
				            <input type="text" class="form-control" name="Email" placeholder="Nhập email" value="{{$giaovien->Email}}"/>
				        </div>
				        <div class="form-group">
				            <label>Chức vụ</label>
				            <select name="idChucVu" class="form-control">
				                @foreach($chucvu as $cv)
				                    <option
				                    @if($cv->id == $giaovien->idChucVu)
				                        {{"selected"}}
				                    @endif
				                     value="{{$cv->id}}">{{$cv->TenCV}}</option>
				                @endforeach
				            </select>
				        </div>
				        <div class="form-group">
				            <label>Bộ môn</label>
				            <select class="form-control" name="idBoMon">
				            	@foreach($bomon as $bm)
				                    <option
				                    @if($bm->id == $giaovien->idBoMon)
				                        {{"selected"}}
				                    @endif
				                     value="{{$bm->id}}">{{$bm->TenBM}}</option>
				                @endforeach
				            </select>
				        </div>
				        <span id="ipMK"></span>
				        <div class="form-group">
	                        <input type="checkbox" id="changePass" name="changePass">
	                        <label>Đổi mật khẩu</label>
	                        <input type="password" class="form-control password" name="password" placeholder="Nhập mật khẩu mới" disabled="" />
	                    </div>
	                    <div class="form-group">
	                        <label>Nhập lại mật khẩu</label>
	                        <input type="password" class="form-control password" name="matkhau2" placeholder="Nhập lại mật khẩu" disabled="" />
	                    </div>
				    </div>
			        <div class="text-center">
		                <button type="submit" class="btn btn-warning" onclick="return confirm('Bạn có muốn cập nhật thông tin giảng viên {{$giaovien->TenGV}} không?');"><span class="glyphicon glyphicon-edit"> </span> Sửa</button>
		                <button type="reset" class="btn btn-default">Reset</button>      
		            </div>
			    </form>
		    </div>
		    <div class="col-md-4">
    			<h4><label>Quyền người dùng</label></h4>
	    		<ul class="list-group">
			  		<li class="list-group-item">
	                    Giảng viên
	                    <div class="material-switch pull-right">
	                    	@if ($normal == true)
	                        <input checked id="normal" name="normal-user" type="checkbox"/>
	                        @else
	                        <input id="normal" name="normal-user" type="checkbox"/>
	                        @endif
	                        <label for="normal" class="label-success"></label>
	                    </div>
	                </li>
	                <li class="list-group-item">
	                    Người dùng quản lý
	                    <div class="material-switch pull-right">
	                    	@if ($manager == true)
	                        <input checked id="manager" name="manager" type="checkbox"/>
	                        @else
	                        <input id="manager" name="manager" type="checkbox"/>
	                        @endif
	                        <label for="manager" class="label-success"></label>
	                    </div>
	                </li>
	                <li class="list-group-item">
	                    Administrator
	                    <div class="material-switch pull-right">
                   		 	@if ($admin == true)
	                        <input checked id="admin" name="admin" type="checkbox"/>
	                        @else
	                        <input id="admin" name="admin" type="checkbox"/>
	                        @endif
	                        <label for="admin" class="label-success"></label>
	                    </div>
	                </li>
	            </ul>
    		</div>
    	</div>
    </div>
</div>

@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $("#changePass").change(function(){
                if($(this).is(":checked")) 
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                    $("#ipMK").html('<input class="form-control password" name="password" value="{{$giaovien->password}}" />');
                }
            });
        });
    </script>

	<script type="text/javascript">
		$(document).ready (function (){
		$("input[type='checkbox']").change(function() {
		    if (this.checked) 
		    {
		    	var roleName = this.id;
		    	var magv = $('#MaGV').text();
    	       	//alert(magv + roleId);
    	       	$.ajax({
		            type: "get",
		            url: "ajax/addRole/" +magv+ "/" + roleName,
		            success: function (data) {
		                console.log(data);		            	          
		            },
		            error: function (data) {
		                console.log('Error:', data);
		            }
		        });	

		    } 
		    else 
	    	{
    			var roleName = this.id;
		    	var magv = $('#MaGV').text();
    	       	//alert(magv + roleId);
    	       	$.ajax({
		            type: "get",
		            url: "ajax/removeRole/" +magv+ "/" + roleName,
		            success: function (data) {
		                console.log(data);
		            	//showLich(data);	               
		            },
		            error: function (data) {
		                console.log('Error:', data);
		            }
		        });	
    		}		    
		});
	});
	</script>
@endsection