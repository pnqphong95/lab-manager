@section('title')
Đăng ký phòng
@endsection
@extends('layout.index')


@section('main')
<div class="row">
	<div class="col-md-10 col-md-offset-1 white-well">
		<h2>Đăng ký phòng thực hành</h2>
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
		<form action="user/dangkyphong" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
			<input type="hidden" name="idGiaoVien" value="{{Auth::user()->id}}">
			<div class="form-group">
				<div class="btn-group" data-toggle="buttons">
					<label class="btn btn-warning">
						Tuần
					</label>
					@foreach($allTuan as $tuan)
	    			<label class="btn btn-default">
						<input type="radio" name="idTuan" value="{{$tuan->id}}"/>{{$tuan->TenTuan}}
					</label>
					@endforeach
				</div>
			</div>
			
			<div class="form-group">
				<div class="btn-group" data-toggle="buttons">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-warning">
							Thứ
						</label>
	    				@foreach($allThu as $thu)
	    				<label class="btn btn-default">
							<input type="radio" name="idThu" value="{{$thu->id}}"/>{{$thu->TenThu}}
						</label>					
	    				@endforeach
					</div>
				</div>
			</div>	

			<div class="form-group">
				<div class="btn-group" data-toggle="buttons">
					<div class="btn-group" data-toggle="buttons">
					<label class="btn btn-warning">
						Buổi
					</label>
					@foreach($allBuoi as $buoi)
	    			<label class="btn btn-default">
						<input type="radio" name="idBuoi" value="{{$buoi->id}}"/>{{$buoi->TenBuoi}}
					</label>					
					@endforeach
				</div>
				</div>
			</div>	

			<div class="form-group">
				<div class="btn-group" data-toggle="buttons">
					<label class="btn btn-warning">
						Phòng
					</label>
					@foreach($phong as $p1)
	    			<label class="btn btn-default">
						<input type="radio" name="idPhong" value="{{$p1->id}}"/>{{$p1->TenPhong}}
					</label>
					@endforeach
				</div>
			</div>

			<div class="row">
			<div class="col-md-4">
      			<label>Môn học </label> 
      			<select class="form-control" name="idMonHoc">
      				@foreach($allMonHoc as $monHoc)
      				<option value="{{$monHoc->id}}">{{$monHoc->TenMH}}</option>
      				@endforeach
      			</select>
  			</div>
  			<div class="col-md-2">
      			<label>Nhóm môn học </label> 
      			<input class="form-control" type="text" name="nhom"> 
      			</div>
      		</div>	
      		<br> 
			<button type="submit" class="btn btn-info">Đăng ký</button>
			<button type="reset" class="btn btn-info">Đặt lại</button>
		</form>
	</div>
</div>
@endsection

@section('script')

@endsection