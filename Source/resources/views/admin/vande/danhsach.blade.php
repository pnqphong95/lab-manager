@extends('admin.layout.index')
@section('title')
Vấn đề - Danh sách
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12 text-center" style="color: blue"><h2>DANH SÁCH VẤN ĐỀ</h2></div>
<div class="col-md-12 text-center" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-success" href="admin/vande/them"><span class="glyphicon glyphicon-plus"></span>  THÊM</a>
</div>
<div class="col-md-12" style="padding-top: 10px">
	<div class="panel panel-primary">
		<div class="panel-heading text-center">
			DANH SÁCH CÁC VẤN ĐỀ ĐÃ GỬI
		</div>
		<div class="panel-body">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
			    <thead>
			        <tr align="center">
			            <th>STT</th>
			            <th>Mã vấn đề</th>
			            <th>Tên phòng</th>
			            <th>Tóm tắt vấn đề</th>
			            <th>Thời gian báo cáo</th>
			            <th>Người báo cáo</th>
			            <th>Người xử lý</th>
			            <th>Chi tiết</th>
			            <th>Trạng thái</th>
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
			                <td>{{$vd->id}}</td>
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
			                	@foreach($allGiaoVien as $gv)
			                		@if($gv->id == $vd->nguoiBaoCao)
			                			{{$gv->MaGV}} - {{$gv->TenGV}}
			                		@endif
			                	@endforeach
			                </td>
			                <td>
			                	@foreach($allGiaoVien as $gv)
			                		@if($gv->id == $vd->nguoiNhan)
			                			{{$gv->MaGV}} - {{$gv->TenGV}}
			                		@endif
			                	@endforeach
			                </td>
			                <td>
			                	<a href="admin/vande/chitiet/{{$vd->id}}" class="btn btn-primary">Chi tiết</a>
			                </td>
			                <td>
								@if($vd->trangThai == 0)
									<a href="" class="btn btn-danger  my-fix" id="{{$vd->id}}">Chưa sửa</a>
							  	@endif
								@if($vd->trangThai == 1)
									<button class="btn btn-success my-fix" id="{{$vd->id}}">Đã sửa</button>

							  	@endif
			                </td>
			                <!-- <td class="center">
			                	<i class="fa fa-trash-o  fa-fw"></i>
			                	<a href="admin/vande/xoa/{{$vd->id}}" onclick="return confirm('Bạn có muốn xóa vấn đề {{$vd->tomTatVD}} không?');"> Xóa</a>
			                </td> -->
			            </tr>
			        @endforeach
			    </tbody>
			</table>
		</div>
	</div>
</div>
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
	            	window.location.href = "{{route('danhsachvande')}}";	               
	            },
	            error: function (data) {
	                console.log('Error:', data);
	            }
	        });
		});
	});
</script>
@endsection