@extends('admin.layout.index')
@section('title')
Giảng viên - Sửa
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12" style="padding-top: 10px">
<table width="100%">
	<tr>
		<td style="text-align: left;">
			<h3 class="page-header">SỬA GIẢNG VIÊN - {{$giaovien->HoGV}} {{$giaovien->TenGV}} ({{$giaovien->MaGV}})</h3>
		</td>
		<td>
			<div class="pull-right">
				<a class="btn btn-primary" href="admin/giaovien/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
			</div>
		</td>
	</tr>
</table>
</div>
<hr>
<br>

<div class="col-md-12" style="padding-top: 10px">
    <div class="panel panel-default">
 	
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
		    	<h4><label>Thông tin người dùng</label></h4>
		    	<ul class="list-group">
			  		<li class="list-group-item">
		    	
			        <input type="hidden" name="_token" value="{{csrf_token()}}" />
			        <div class="col-md-6">
			        	<div class="form-group">
				            <label>Mã giảng viên</label>
				            <input class="form-control" id="MaGV" name="MaGV" value="{{$giaovien->MaGV}}" placeholder="Nhập mã giảng viên" />
				        </div>
				        <div class="form-group">
				            <label>Họ giảng viên</label>
				            <input class="form-control" name="HoGV" value="{{$giaovien->HoGV}}" placeholder="Nhập học giảng viên" />
				        </div>
				        <div class="form-group">
				            <label>Tên giảng viên</label>
				            <input class="form-control" name="TenGV" placeholder="Nhập tên giảng viên" value="{{$giaovien->TenGV}}"/>
				        </div>
				        <div class="form-group">
				            <label>Ngày sinh</label>
				            <input type="date" class="form-control" name="NgaySinh" value="{{$giaovien->NgaySinh}}"/>
				        </div>
				        
			        </div>
				    <div class="col-md-6">
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
				    	<div class="form-group">
				            <label>Số điện thoại</label>
				            <input type="number" class="form-control" name="SDT" placeholder="Nhập Số điện thoại" value="{{$giaovien->SDT}}"/>
				        </div>
				        <div class="form-group">
				            <label>Tình trạng tài khoản</label>
				            
				            <ul class="list-group">
			  					<li class="list-group-item" style="padding-top: 10px;padding-bottom: 5px;">
			  						@if ($giaovien->KichHoat)
			  						Đã kích hoạt
			  						@else
			  						Chưa kích hoạt
			  						@endif
			  					</li>
			  				</ul>
				        </div>
				        <div class="form-group" style="margin-top: 5px;">
				            <label style="padding-top: 5px;">Bộ môn</label>
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
				        
				    </div>
			        <div class="text-center">
		                <button type="submit" class="btn btn-warning" onclick="return confirm('Bạn có muốn cập nhật thông tin giảng viên {{$giaovien->TenGV}} không?');"><span class="glyphicon glyphicon-edit"> </span> Sửa</button>
		                <a href="admin/giaovien/danhsach" class="btn btn-default">Hủy</a>      
		            </div>
			    </form>
			    	</li>
			    </ul>
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

	            <h4><label>Cấp lại mật khẩu</label></h4>
	    		<ul class="list-group">
	    			<form action="admin/giaovien/doiMK" method="POST">
	    				<input type="hidden" name="_token" value="{{csrf_token()}}" />
	    				<input type="hidden" name="id" value="{{$giaovien->id}}">
				  		<li class="list-group-item">
		                    <input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu">
		                </li>
		                <li class="list-group-item">
		                    <input class="form-control" type="password" name="re_password" placeholder="Nhập lại mật khẩu">
		                </li>
		                <li class="list-group-item">
		                    <button class="btn btn-info" type="submit">Đổi mật khẩu</button> 
		                </li>
	                </form>
	            </ul>
    		</div>
    	</div>
    </div>
</div>

@endsection
@section('script')

	<script type="text/javascript">
		$(document).ready (function (){
		$("input[type='checkbox']").change(function() {
		    if (this.checked) 
		    {
		    	var roleName = this.id;
		    	var magv = $('#MaGV').val();
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
		    	var magv = $('#MaGV').val();
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