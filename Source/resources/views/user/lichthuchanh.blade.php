@section('title')
Lịch thực hành
@endsection
@extends('layout.index')


@section('main')
<div class="row">
	<div class="col-lg-12">
		<div class="white-well">
			<div class="row">
				<div class="col-lg-6">
					<h2>Lịch dạy thực hành</h2>
				</div>
				
			</div>
			<hr>
			
			
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