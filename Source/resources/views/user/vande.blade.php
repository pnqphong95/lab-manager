@section('title')
Vấn đề
@endsection
@extends('layout.index')


@section('main')
<?php $thisPage = 'vande';?>
<div class="row">
	<div class="col-lg-12">
		<div class="white-well">
			<div class="row">
				<div class="col-lg-6">
					<h2>Tạo vấn đề</h2>
				</div>
				
			</div>
			<hr>
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
			<form action="user/vande" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label>Phòng</label>
							<select class="form-control" name="idPhong">
								@foreach($allPhong as $p)
								<option value="{{$p->id}}">{{$p->TenPhong}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="form-group">
							<label>Tóm tắt vấn đề</label>
							<input class="form-control" type="text" name="tomTatVD" />
								
						</div>
					</div>			
					
				
					<div class="col-lg-12">
						<div class="form-group">
							<label>Chi tiết vấn đề</label>
							<textarea class="form-control" rows="3" name="chiTietVD"></textarea>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-info">Gửi vấn đề</button>
			</form>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="panel panel-primary thong-tin">
			<div class="panel-heading">
				<center>THÔNG TIN NGƯỜI DÙNG</center>
			</div>
			<div class="panel-body">
				<table class="table borderless table-borderless" style="border: none;">
					<tr>
						<th><span>Mã cán bộ:</span></th>
						<td><span>{{Auth::user()->MaGV}}</span></td>
					</tr>
					<tr>
						<th><span>Họ và tên:</span></th>
						<td><span>{{Auth::user()->HoGV}} {{Auth::user()->TenGV}}</span></td>
					</tr>
					<tr>
						<th><span>Giới tính:</span></th>
						<td><span>Nam</span></td>
					</tr>
					<tr>
						<th><span>Chức vụ:</span></th>
						<td><span>Giảng Vien</span></td>
					</tr>
				</table>				 
				
				<br><center><a class="btn btn-default" href="{{route('logout')}}">Đăng xuất</a></center>
			</div>
	</div> <!-- /thong-tin -->

	<div class="panel panel-primary lich">
			<div class="panel-heading">
				<span><center>LỊCH</center></span>
			</div>
			<div class="panel-body" style="padding: 1px;">
				<script type="text/javascript">  								
					document.write(printCal());  								
				</script>
			</div>
	</div> <!-- /lich -->
	</div>
</div>
@endsection

@section('script')

@endsection