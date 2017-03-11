@section('title')
Vấn đề
@endsection
@extends('layout.index')


@section('main')
<?php $thisPage = 'vande';?>
<div class="row">
	<div class="col-lg-8">
		<div class="white-well">
			<h3>Đăng ký phòng bộ môn khác</h3>
			<hr>
			<form>
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label>Phòng</label>
							<select class="form-control">
							@foreach($phong as $p)
								<option>{{$p->TenPhong}}</option>
							@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="form-group">
							<label>Môn học</label>
							<select class="form-control">
							@foreach($allMonHoc as $mh)
								<option>{{$mh->TenMH}}</option>
							@endforeach
							</select>
						</div>
					</div>
				
					<div class="col-lg-12">
						<div class="form-group">
							<label>Tuần thực hành</label>
							<div data-toggle="buttons">
					
				    			<label class="btn btn-default active" style="margin-bottom: 5px">
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
								<label class="btn btn-default">
									<input type="radio" name="radioTuan" value="6"/>6
								</label>
								<label class="btn btn-default">
									<input type="radio" name="radioTuan" value="7"/>7
								</label>
								<label class="btn btn-default">
									<input type="radio" name="radioTuan" value="8"/>8
								</label>
								<label class="btn btn-default">
									<input type="radio" name="radioTuan" value="9"/>9
								</label>
								<label class="btn btn-default">
									<input type="radio" name="radioTuan" value="10"/>10
								</label>
								<label class="btn btn-default">
									<input type="radio" name="radioTuan" value="11"/>11
								</label>
								<label class="btn btn-default">
									<input type="radio" name="radioTuan" value="12"/>12
								</label>
								<label class="btn btn-default">
									<input type="radio" name="radioTuan" value="13"/>13
								</label>
								<label class="btn btn-default">
									<input type="radio" name="radioTuan" value="14"/>14
								</label>
								<label class="btn btn-default">
									<input type="radio" name="radioTuan" value="15"/>15
								</label>
								<label class="btn btn-default">
									<input type="radio" name="radioTuan" value="16"/>16
								</label>
								<label class="btn btn-default">
									<input type="radio" name="radioTuan" value="17"/>17
								</label>
								<label class="btn btn-default">
									<input type="radio" name="radioTuan" value="18"/>18
								</label>
								<label class="btn btn-default">
									<input type="radio" name="radioTuan" value="19"/>19
								</label>								
							</div>
								
						</div>
					</div>

					<div class="col-lg-12">
						<div class="form-group">
							<label>Ngày thực hành</label>
							<div class="" data-toggle="buttons">
								
				    			<label class="btn btn-default active">
									<input type="radio" name="radioBuoi" value="1" checked/>Thứ 2
								</label>
								<label class="btn btn-default">
									<input type="radio" name="radioBuoi" value="2"/>Thứ 3
								</label>
								<label class="btn btn-default">
									<input type="radio" name="radioBuoi" value="2"/>Thứ 3
								</label>
								<label class="btn btn-default">
									<input type="radio" name="radioBuoi" value="2"/>Thứ 3
								</label>
								<label class="btn btn-default">
									<input type="radio" name="radioBuoi" value="2"/>Thứ 3
								</label>
								<label class="btn btn-default">
									<input type="radio" name="radioBuoi" value="2"/>Thứ 3
								</label>
								<label class="btn btn-default">
									<input type="radio" name="radioBuoi" value="2"/>Thứ 3
								</label>

							</div>
						</div>
					</div>
				
					<div class="col-lg-12">
						<div class="form-group">
							<label>Buổi thực hành</label>
							<div class="" data-toggle="buttons">
								
				    			<label class="btn btn-default active">
									<input type="radio" name="radioBuoi" value="1" checked/>Sáng
								</label>
								<label class="btn btn-default">
									<input type="radio" name="radioBuoi" value="2"/>Chiều
								</label>
							</div>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-info">Gửi vấn đề</button>
			</form>
		</div>
	</div>
	<div class="col-lg-4" style="padding-left: 0px;">
		<div class="white-well" >
			<h3>Các yêu cầu đã gửi</h3>
			<hr>
			<div class="alert alert-success" style="margin-bottom: 2px;">
	            P03 - Ứng dụng web - 02
	        </div>	
	        <div class="alert alert-success" style="margin-bottom: 2px;">
	            P03 - Ứng dụng web - 02
	        </div>
	        <div class="alert alert-success" style="margin-bottom: 2px;">
	            P03 - Ứng dụng web - 02
	        </div>
	        <div class="alert alert-success" style="margin-bottom: 2px;">
	            P03 - Ứng dụng web - 02
	        </div>
	        <div class="alert alert-success" style="margin-bottom: 2px;">
	            P03 - Ứng dụng web - 02
	        </div>
		</div>
	</div>
</div>
@endsection

@section('script')

@endsection