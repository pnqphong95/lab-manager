@extends('admin.layout.index')

@section('content')

<?php $thisPage = 'vande';?>
<div class="row">
	<div class="col-lg-12">
		<div class="white-well">
			<h3>Danh sách các lỗi được gửi</h3>
			<hr>
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
			    <thead>
			        <tr align="center">
			            <th>STT</th>
			            <th>Tên phòng</th>
			            <th>Tóm tắt lỗi</th>
			            <th>Ngày báo cáo</th>
			            <th>Ngày sửa</th>
			            <th>Trạng thái</th>
			            <th>Xóa</th>
			        </tr>
			    </thead>
			    <tbody>
			    	@if(session('thongbao'))
			    		<div class="alert alert-success">
			    			{{session('thongbao')}}
			    		</div>
			    	@endif	
			    	<?php 
			    		$i=0;
			    	?>
			        @foreach($allVanDe as $vd)
			        	<?php 
			        		$i++;
			        	?>
			            <tr class="odd gradeX" align="center">
			                <td>{{$i}}</td>
			                <td>
			                	@foreach($allPhong as $p)
			                		@if($p->id == $vd->idPhong)
			                			{{$p->TenPhong}}
			                		@endif
			                	@endforeach
			                </td>
			                <td>{{$vd->tomTatVD}}</td>
			                <td>
			               		<?php 
			               			$ngay = $vd->ngayBaoCao;
									$ngay = date("d-m-Y", strtotime($ngay));
			               		 ?>
			               		 {{$ngay}}
			                </td>
			                <td>
			                	<?php 
			               			$ngay = $vd->ngaySua;
									$ngay = date("d-m-Y", strtotime($ngay));
			               		 ?>
			               		 {{$ngay}}
			                </td>
			                <td>
								@if($vd->trangThai == 0)
									<a href="" class="btn btn-danger  my-fix" id="{{$vd->id}}">Chưa sửa</a>
							  	@endif
								@if($vd->trangThai == 1)
									<button class="btn btn-success my-fix" id="{{$vd->id}}">Đã sửa</button>

							  	@endif
			                </td>
			                <td class="center">
			                	<i class="fa fa-trash-o  fa-fw"></i>
			                	<a href="admin/vande/xoa/{{$vd->id}}" onclick="return confirm('Bạn có muốn xóa vấn đề {{$vd->tomTatVD}} không?');"> Xóa</a>
			                </td>
			            </tr>
			        @endforeach
			    </tbody>
			</table>

			@foreach($allVanDe as $vd)
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