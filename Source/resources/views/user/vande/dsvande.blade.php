@section('title')
Danh sách các vấn đề
@endsection
@extends('layout.index')


@section('main')
<?php $thisPage = 'vande';?>
<div class="row">
	<div class="col-lg-12">
		<div class="white-well">
			<h3>Danh sách các lỗi/hỏng người dùng báo</h3>
			<hr>

			@foreach($allvande as $vd)
			@if($vd->trangThai == 0)
			<div class="alert alert-danger my-error">
				<label>Phòng 
				@foreach($allPhong as $p)
					@if($p->id == $vd->idPhong)
						{{$p->TenPhong}}
					@endif
				@endforeach
					{{$vd->tomTatVD}}
				</label>
			    <div class="panel-body">{{$vd->chiTietVD}}</div>
			    <button class="btn btn-default my-fix" id="{{$vd->id}}">Đã sửa</button>
		  	</div>
		  	@else
		  	<div class="alert alert-success my-error-fixxed">
				<label>Phòng 
				@foreach($allPhong as $p)
					@if($p->id == $vd->idPhong)
						{{$p->TenPhong}}
					@endif
				@endforeach
					{{$vd->tomTatVD}}
				</label>
			    <div class="panel-body">{{$vd->chiTietVD}}</div>
		  	</div>
		  	@endif
			@endforeach

		</div> {{-- <div class="white-well"> --}}
	</div> {{-- <div class="col-lg-12"> --}}

</div> {{-- <div class="row"> --}}
@endsection

@section('script')

@endsection