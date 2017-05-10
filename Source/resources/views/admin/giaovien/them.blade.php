@extends('admin.layout.index')
@section('title')
Giáo viên - Thêm
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12 text-center" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/giaovien/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
</div>
<div class="col-md-12" style="padding-top: 10px">
	
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
	<div class="panel panel-primary">
		<div class="panel-heading text-center"><h4>THÊM MỚI NGƯỜI DÙNG</h4></div>
		<div class="panel-body"> 
			<div class="col-md-10 col-md-offset-1 ">
			<form action="admin/giaovien/them" method="POST">
		        <input type="hidden" name="_token" value="{{csrf_token()}}" />
		        <table class="table">
		        <tr> 
		        	<td width="20%">
			            <label>Mã giáo viên</label>
		            </td>
		            <td width="30%">
			            <input class="form-control pull-right" name="MaGV" placeholder="Nhập mã giáo viên" />
		            </td>
			        <td width="20%">
			            <label>Họ</label>
		            </td>
		            <td width="30%">
			            <input class="form-control pull-right" name="HoGV" placeholder="Nhập học giáo viên" />
			        </td>
			    </tr>
			    <tr>
			    	<td>
			            <label>Tên</label>
			        </td>
		            <td>
			            <input class="form-control pull-right" name="TenGV" placeholder="Nhập tên giáo viên" />
			        </td>
			        <td>
			            <label>Ngày sinh</label>
			        </td>
			        <td>
			            <input type="date" class="form-control pull-right" name="NgaySinh"/>
			        </td>
		        </tr>
			    <tr>
			    	<td>
			            <label>Giới tính</label>
			        </td>
			        <td>
			            <select class="form-control pull-right" name="GioiTinh">
			            	<option value="1">Nam</option>
			            	<option value="0">Nữ</option>
			            </select>
			        </td>

			    	<td>
			            <label>Số điện thoại</label>
		            </td>
		            <td>
			            <input type="text" class="form-control pull-right" name="SDT" placeholder="Nhập Số điện thoại" />
			        </td>
			    </tr>
			    <tr>
			    	<td>
			            <label>Email</label>
		            </td>
		            <td>
			            <input type="text" class="form-control pull-right" name="Email" placeholder="Nhập email" />
			        </td>
			        <td>
			            <label>Chức vụ</label>
			        </td>
			        <td>
			            <select class="form-control pull-right" name="idChucVu">
			            	<option selected value="-1"></option>
			            	@foreach($chucvu as $cv)
			            		<option value="{{$cv->id}}">{{$cv->TenCV}}</option>
			            	@endforeach
			            </select>
			        </td>
			    </tr>
			    <tr>
			    	<td>
			            <label>Bộ môn</label>
			        </td>
			        <td>
			            <select class="form-control pull-right" name="idBoMon">
			            	<option selected value="-1"></option>
			            	@foreach($bomon as $bm)
			            		<option value="{{$bm->id}}">{{$bm->TenBM}}</option>
			            	@endforeach
			            </select>
			        </td>
			        <td>
			            <label>Mật khẩu</label>
			        </td>
			        <td>
			            <input type="text" class="form-control pull-right" name="password" placeholder="Nhập mật khẩu" />
			        </td>
			    </tr>
			    <tr>
			    	<td colspan="4">
			    <div class="text-center">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"> </span> Thêm</button>
                    <button type="reset" class="btn btn-default">Reset</button>      
                </div>
                	</td>
                </tr>
                </table>
		    </form>
		    </div>
		</div>
	</div>	
</div>

@endsection
