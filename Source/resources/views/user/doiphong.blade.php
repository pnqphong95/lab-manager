@section('title')
Danh sách các vấn đề
@endsection
@extends('layout.index')


@section('main')
<?php $thisPage = 'vande';?>
<div class="row">
	<div class="col-lg-12">
		<div class="white-well">
			<h3>Đổi phòng</h3>
			<hr>

			@if(session('thongbao'))
		        <div class="alert alert-success">		      
	                {!!session('thongbao')!!}
		           
		        </div>
		    @endif
			<div class="row">			
				<div class="col-lg-6">
					<table class="table-show-data table table-bordered">	
						<tr>
							<td colspan="2" style="text-align: center;">
								<label>Thông tin yêu cầu phòng</label>
							</td>
						</tr>			
						<tr>
							<td>
								<label>Giáo viên</label>
							</td>
							<td class="td-data">
								<span>
									@foreach ($allGiaoVien as $gv)
										@if ($gv->id == $lichCD->idGiaoVien)
											{{$gv->HoGV}} {{$gv->TenGV}}
										@endif
									@endforeach
								</span>
							</td>
						</tr>
						<tr>
							<td>
								<label>Môn học</label>
							</td>
							<td class="td-data">
								<span>
									@foreach ($allMonHoc as $mh)
										@if ($mh->id == $lichCD->idMonHoc)
											{{$mh->TenMH}}
										@endif
									@endforeach
								</span>
							</td>
						</tr>
						<tr>
							<td>
								<label>Tuần</label>
							</td>
							<td class="td-data">
								<span>
									@foreach ($allTuan as $tu)
										@if ($tu->id == $lichCD->idTuan)
											{{$tu->TenTuan}}
										@endif
									@endforeach
								</span>
							</td>
						</tr>
						<tr>
							<td>
								<label>Thứ</label>
							</td>
							<td class="td-data">
								<span>
									@foreach ($allThu as $th)
										@if ($th->id == $lichCD->idThu)
											{{$th->TenThu}}
										@endif
									@endforeach
								</span>
							</td>
						</tr>
						<tr>
							<td>
								<label>Buổi</label>
							</td>
							<td class="td-data">
								<span>
									@foreach ($allBuoi as $bu)
										@if ($bu->id == $lichCD->idBuoi)
											{{$bu->TenBuoi}}
										@endif
									@endforeach
								</span>
							</td>
						</tr>
					</table>
				</div>

				<div class="col-lg-6">
					<div class="well">
						<label>Các phòng còn trống trong bộ môn</label>
						<form id="form1" action="user/chinhsualich/{{$lichCD->id}}" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							@foreach ($nullPhong as $ph)
							<div class="radio">
  								<label>
  									<input type="radio" name="idPhong" value="{{$ph}}">
  									@foreach ($allPhong as $ph1)
  										@if ($ph1->id == $ph)
  											{{$ph1->TenPhong}}
  										@endif
  									@endforeach
								</label>
							</div>
							@endforeach							
							<button type="submit" class="btn btn-success">Duyệt</button>
						</form>
						
					</div>
				</div>
			</div>
		</div> <!-- <div class="white-well"> -->
	</div> <!-- <div class="col-lg-12"> -->

</div> <!-- <div class="row"> -->
@endsection

@section('script')
<script type="text/javascript">
	$('#form1').submit(function() {
	    if (  $('input:radio', this).is(':checked')) 
	    {
	        return true;
	    } else {
	        alert('Vui lòng chọn phòng!');
	        return false;
	    }
	});
</script>
@endsection