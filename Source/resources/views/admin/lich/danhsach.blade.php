@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div class="col-md-12">
    <h1 class="page-header">Lịch
        <small>Danh sách</small>
    </h1>

    <div class="panel panel-primary">
		<div class="panel-heading">
			<h4><center>LỊCH THỰC HÀNH</center></h4>
		</div>
		<div class="panel-body">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h5><center>Đăng ký lịch</center></h5>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-2">
							<label>Tùy chọn</label>
						</div>
						<div class="col-md-2">
							<select class="form-control">
								<option name="CPU">CPU</option>
								<option name="GPU">GPU</option>
							</select>
						</div>
						<div class="col-md-3">
							<form action="timkiem" method="post" role="search">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<div class="form-group">
									<input type="text" name="tukhoa" class="form-control" placeholder="Tìm kiếm">
								</div>
								<button class="btn btn-primary" type="submit">Tìm</button>
							</form>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<label>Môn học</label>
						</div>
						<div class="col-md-4">
							<select class="form-control">
								@foreach($monhoc as $mh)
									<option value="{{$mh->id}}">{{$mh->TenMH}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-md-1">
							<label>Nhóm</label>
						</div>
						<div class="col-md-2">
							<input text="text"	 type="number" name="" class="form-control">
						</div>
					</div>
					<div class="row">
						<table class="table table-bordered" style="text-align: center;">
							<thead>
								<tr>
								<th width="9%">Tuần</th>
								<th width="13%">Thứ 2</th>
								<th width="13%">Thứ 3</th>
								<th width="13%">Thứ 4</th>
								<th width="13%">Thứ 5</th>
								<th width="13%">Thứ 6</th>
								<th width="13%">Thứ 7</th>
								<th width="13%">CN</th>        								
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
								</tr>
								<tr>
									<td>2</td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
								</tr>
								<tr>
									<td>3</td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
								</tr>
								<tr>
									<td>4</td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
									<td><input type="checkbox" name="radioTuan" value="2"/></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
<!-- 			<div style="margin-top: 10px;" class="btn-group" data-toggle="buttons">
				<label class="btn btn-default">
					Bộ môn
				</label>
    			<label class="btn btn-default active">
					<input type="radio" name="radioTuan" value="1" checked/>CNTT
				</label>
				<label class="btn btn-default">
					<input type="radio" name="radioTuan" value="2"/>TT&MMT
				</label>
				<label class="btn btn-default">
					<input type="radio" name="radioTuan" value="3"/>KTPM
				</label>
				<label class="btn btn-default">
					<input type="radio" name="radioTuan" value="4"/>KHMT
				</label>
				<label class="btn btn-default">
					<input type="radio" name="radioTuan" value="5"/>HTTT
				</label>
				<label class="btn btn-default">
					<input type="radio" name="radioTuan" value="6"/>THUD
				</label>						
			</div>
			<div style="margin-top: 10px;" class="btn-group" data-toggle="buttons">
				<label class="btn btn-default">
					Tuần
				</label>
    			<label class="btn btn-default active">
					<input type="radio" name="radioTuan" value="1" checked/>1
				</label>
				<label class="btn btn-default">
					<input type="radio" name="radioTuan" value="2"/>2
				</label>
				<label class="btn btn-default">
					<input type="radio" name="radioTuan" value="3"/>3
				</label>
				<label class="btn btn-default">
					<input type="radio" name="radioTuan" value="4"/>4
				</label>
				<label class="btn btn-default">
					<input type="radio" name="radioTuan" value="5"/>5
				</label>						
			</div>

			<div style="margin-top: 10px; margin-bottom: 10px;" class="btn-group" data-toggle="buttons">
				<label class="btn btn-default">
					Buổi
				</label>
    			<label class="btn btn-default active">
					<input type="radio" name="radioBuoi" value="1" checked/>Sáng
				</label>
				<label class="btn btn-default">
					<input type="radio" name="radioBuoi" value="2"/>Chiều
				</label>
			</div>

			<table class="table table-bordered" style="text-align: center;">
				<thead>
					<tr>
					<th width="9%">Phòng</th>
					<th width="13%">Thứ 2</th>
					<th width="13%">Thứ 3</th>
					<th width="13%">Thứ 4</th>
					<th width="13%">Thứ 5</th>
					<th width="13%">Thứ 6</th>
					<th width="13%">Thứ 7</th>
					<th width="13%">CN</th>        								
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Sáng P1</td>
						<td><input type="radio" name="radioTuan" value="2"/></td>
						<td><input type="radio" name="radioTuan" value="2"/></td>
						<td><input type="radio" name="radioTuan" value="2"/></td>
						<td><input type="radio" name="radioTuan" value="2"/></td>
						<td><input type="radio" name="radioTuan" value="2"/></td>
						<td><input type="radio" name="radioTuan" value="2"/></td>
						<td><input type="radio" name="radioTuan" value="2"/></td>
					</tr>
					<tr>
						<td>Sáng P2</td>
						<td><input type="radio" name="radioTuan" value="2"/></td>
						<td><input type="radio" name="radioTuan" value="2"/></td>
						<td><input type="radio" name="radioTuan" value="2"/></td>
						<td><input type="radio" name="radioTuan" value="2"/></td>
						<td><input type="radio" name="radioTuan" value="2"/></td>
						<td><input type="radio" name="radioTuan" value="2"/></td>
						<td><input type="radio" name="radioTuan" value="2"/></td>
					</tr>
					<!-- @foreach($phong as $p)
			      	<tr>						        								        	
						<td>{{$p->TenPhong}}</td>
						<td id="{{$p->id}}2"></td>
			        	<td id="{{$p->id}}3"></td>
			        	<td id="{{$p->id}}4"></td>
			        	<td id="{{$p->id}}5"></td>
			        	<td id="{{$p->id}}6"></td>
			        	<td id="{{$p->id}}7"></td> 
			        	<td id="{{$p->id}}8"></td> 
		     	 	</tr>				     	 	
	     	 	@endforeach -->	
				</tbody>
			<!-- </table> --> -->

		</div> <!-- /panel-body -->
	</div>
</div>

@endsection
