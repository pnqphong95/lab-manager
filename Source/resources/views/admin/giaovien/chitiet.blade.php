@extends('admin.layout.index')
@section('title')
Giáo viên - Chi tiết
@endsection
@section('content')
<!-- Page Content -->

<div class="col-md-12" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/giaovien/danhsach"><span class="glyphicon glyphicon-list-alt"></span>   DANH SÁCH</a>
	<a style="width: 20%" class="btn btn-success" href="admin/giaovien/them"><span class="glyphicon glyphicon-plus"></span>  THÊM</a>
</div>
<div class="col-md-12">
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
	    
    <div class="row">
	    <div class="col-lg-7">
	    	<div class="panel panel-primary text-center">
		    	<div class="panel-heading">
		    		<label>Thông tin giáo viên</label>
		    	</div>
		    	<div class="panel-body">
		    		<table class="table-show-data" style="border: none;width: 100%;">
		    			<tr>
	    					<td>Mã giáo viên</td>
	    					<td id="MaGV">{{$giaovien->MaGV}}</td>
		    			</tr>
		    			<tr>
		    				<td>Họ và tên</td>
		    				<td>
		    					{{$giaovien->HoGV}}
		    					{{$giaovien->TenGV}}
		    				</td>
		    			</tr>
		    			<tr>
	    					<td>Ngày sinh</td>
	    					<td>{{$giaovien->NgaySinh}}</td>
		    			</tr>
		    			<tr>
	    					<td>Giới tính</td>
	    					<td>{{$giaovien->GioiTinh}}</td>
		    			</tr>
		    			<tr>
	    					<td>Số điện thoại</td>
	    					<td>{{$giaovien->SDT}}</td>
		    			</tr>
		    			<tr>
	    					<td>Bộ môn</td>
	    					<td>
	    						@foreach ($bomon as $bm)
	    							@if ($bm->id == $giaovien->idBoMon)
	    							{{$bm->TenBM}}
	    							@endif
	    						@endforeach
	    					</td>
		    			</tr>
		    		</table>
		    	</div>
		    </div>
	    </div>
	    <div class="col-lg-5">
	    	<div class="panel panel-primary">
			  	<div class="panel-heading text-center">
			  		<label>Quyền người dùng</label>
		  		</div>
		  		<ul class="list-group">
			  		<li class="list-group-item">
	                    Người dùng bình thường
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

@section ('script')
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