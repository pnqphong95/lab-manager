@section('title')
Vấn đề
@endsection
@extends('layout.index')


@section('main')
<?php $thisPage = 'vande';?>
<div class="row">
	<div class="col-lg-12">
		<div class="white-well">
				<h3>Tạo vấn đề</h3>
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

</div>
@endsection

@section('script')

@endsection