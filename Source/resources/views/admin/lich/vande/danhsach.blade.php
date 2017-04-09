@section('title')
Danh sách các vấn đề
@endsection
@extends('layout.index')


@section('main')
<?php $thisPage = 'vande';?>
<div class="row">
	<div class="col-lg-12">
		<div class="white-well">
			<h3>Danh sách các lỗi được gửi</h3>
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
<script type="text/javascript">
	$(document).ready(function (){
		$('.my-fix').click(function (){
			$(this).addClass('my-hidden');
			var idVanDe = $(this).prop('id');
			var elementParent = $(this).parent();
			//console.log(elementParent);	
			elementParent.removeClass('alert-danger');
			elementParent.addClass('alert-success');

			$.ajax({

	            type: "get",
	            url: "ajax/suaLoi/" + idVanDe,
	            success: function (data) {
	                console.log(data);
	            	//showLich(data);	               
	            },
	            error: function (data) {
	                console.log('Error:', data);
	            }
	        });
		});
	});
</script>
@endsection