@extends('admin.layout.index')
@section('title')
Vấn đề - Danh sách
@endsection
@section('content')
<!-- Page Content -->
<div class="col-md-12 text-center" style="color: blue"><h2>CHI TIẾT VẤN ĐỀ</h2></div>
<div class="col-md-12 text-center" style="padding-top: 10px">
	<a style="width: 20%" class="btn btn-primary" href="admin/vande/danhsach"><span class="glyphicon glyphicon-plus"></span>  DANH SÁCH</a>
</div>

<div class="col-md-12" style="padding-top: 10px">
	<div class="panel panel-primary">
		<div class="panel-heading text-center">
			THÔNG TIN CHI TIẾT VÁN ĐỀ
		</div>
		<div class="panel-body">
			<!-- <div class="col-md-12 text-center">
				<a style="width: 20%; margin-bottom: 10px" class="btn btn-warning" href="admin/vande/sua/{{$vande->id}}"><span class="glyphicon glyphicon-pencil"></span>  CẬP NHẬT</a>
			</div> -->
			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading">
						<label>Mã vấn đề: {{$vande->id}}</label>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4">
								<label>Tình trạng</label>
							</div>
							<div class="col-md-8">
								@if($vande->trangThai == 0)
									<p style="color: red">Chưa sửa <span class="glyphicon glyphicon-remove" style="color: red"></span></p>
								@else
									<p style="color: green">Đã sửa  <span class="glyphicon glyphicon-ok" style="color: green"></span></p>
								@endif
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label>Phòng</label>
							</div>
							<div class="col-md-8">
								@foreach($allPhong as $p)
									@if($p->id == $vande->idPhong)
										{{$p->TenPhong}}
									@endif
								@endforeach
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label>Người báo cáo</label>
							</div>
							<div class="col-md-8">
								@foreach($allGiaoVien as $gv)
									@if($gv->id == $vande->nguoiBaoCao)
										<div>Mã - {{$gv->MaGV}}</div>
										<div>Tên - {{$gv->HoGV}} {{$gv->TenGV}}</div>
										<div>Email - {{$gv->Email}}</div>
										<div>SDT - {{$gv->SDT}}</div>

									@endif
								@endforeach
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>Thời gian báo cáo</label>
							</div>
							<div class="col-md-6">
								{{$vande->ngayBaoCao}}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading">
						<label>Yêu cầu xử lý</label>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-5">
								<label>Tên vấn đề</label>
							</div>
							<div class="col-md-7">
								{{$vande->tomTatVD}}
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<label>Chi tiết vấn đề</label>
							</div>
							<div class="col-md-7">
								{{$vande->chiTietVD}}
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<label>Gửi yêu cầu đến</label>
							</div>
							<div class="col-md-7">
								@foreach($allGiaoVien as $g)
									@if($g->id == $vande->nguoiNhan)
										<div>Mã - {{$g->MaGV}}</div>
										<div>Tên - {{$g->HoGV}} {{$g->TenGV}}</div>
										<div>Email - {{$g->Email}}</div>
										<div>SDT - {{$g->SDT}}</div>
									@endif
								@endforeach
							</div>
							<div class="row">
								<div class="col-md-5">
									<label>Thời gian gửi yêu cầu</label>
								</div>
								<div class="col-md-7">
									{{$vande->ngayNhan}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12" style="padding-top: 10px">
	<div class="panel panel-primary">
		<div class="panel-heading text-center">
			LỊCH SỬ GIẢI QUYẾT VẤN ĐỀ
		</div>
		<div class="panel-body">
			<table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
			    <thead>
			        <tr align="center">
			            <th>STT</th>
			            <th>Ghi chú</th>
			            <th>Người nhận</th>
			            <th>Thời gian</th>
			            <th>Thực hiện</th>
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
			        @foreach($ls_vande as $vd)
			        	<?php 
			        		$i++;
			        	?>
			            <tr class="odd gradeX" align="center">
			                <td>{{$i}}</td>
			                <td>
			                	{{$vd->ghiChu}}
			                </td>
			                <td>
			                	@foreach($allGiaoVien as $a)
			                		@if($a->id == $vd->nguoiNhan)
			                			{{$a->MaGV}} - {{$a->TenGV}}
			                		@endif
			                	@endforeach
			                	@if($vd->nguoiNhan == 0)
		                			
		                		@endif
			                </td>
			                <td>
			                	{{$vd->ngayNhan}}
			                </td>
			                <td>
			                	@if($vd->trangThai != 1)
			                	<span class="txtTT"></span>
			                	@endif
								@if($vd->trangThai == 1)
		                			Đã xử lý
		                			<input type="hidden" id="idTrangThai" value="{{$vd->trangThai}}">
		                		@endif
		                		
		                		<!-- @if($vd->trangThai == 1)
		                			Đã xử lý
		                		@endif
		                		@if($vd->trangThai == 0 && $vd->id != $last_lsvd->id)
		                			Đã chuyển yêu cầu
		                		@endif
		                		@if($vd->trangThai == 0 && $vd->id == $last_lsvd->id)
		                			Đã chuyển yêu cầu
		                		@endif -->
			                </td>
			            </tr>
			        @endforeach
			    </tbody>
			</table>
				
			<div class="text-center">
				@if($vande->trangThai == 0)
				   	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
					 	Thực hiện yêu cầu
					</button>
			    @endif
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	    <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">THỰC HIỆN XỬ LÝ</h4>
	    </div>
	    <div class="modal-body">
		    <form action="admin/vande/themlichsu/{{$vande->id}}" method="post">
		    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		    	<div class="form-group form-inline">
		        	<label>Mã vấn đề</label>
		        	<p name="idVanDe">{{$vande->id}}</p>
		        	<input type="hidden" class="form-control" name="idVanDe" value="{{$vande->id}}"></input>
		        </div>
		    	<div class="form-group form-inline">
		        	<label>Tóm tắt vấn đề</label>
		        	<input disabled class="form-control" name="tomTatVD" value="{{$vande->tomTatVD}}"></input>
		        </div>
		        <div class="form-group form-inline">
		        	<label>Ghi chú</label>
		        	<input class="form-control" name="ghiChu"></input>
		        </div>
		        <div class="form-group form-inline">
		        	<label>Đã xử lý</label>
		        	<input type="checkbox" name="check" id="check"></input>
		        	<input hidden name="nguoiNhan" value="{{$vande->nguoiBaoCao}}" class="kt" disabled></input>
		        </div>
		        <div class="form-group form-inline">
		        	<label>Chỉ định người xử lý</label>
		        	<select class="form-control kt1" name="nguoiNhan">
		        		<option value="0"></option>
		        		@foreach($allGiaoVien as $gv)
		            		@if($gv->idChucVu == 4)
		            			<option value="{{$gv->id}}">{{$gv->MaGV}} - {{$gv->TenGV}}</option>
		            		@endif
		            	@endforeach
		        	</select>
		        </div>
		        <button type="submit" class="btn btn-primary">Thực hiện</button>
		        <!-- <button name="xuly" type="submit" class="btn btn-primary" >Xử lý</button> -->
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    </form>
	    </div>
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

		var tt = $('#idTrangThai').val();
		if (tt == 1)
		{
			$('.txtTT').html('Đã chuyển yêu cầu');
		}
	});
</script>
<!-- ẩn chỉnh định người thực hiện -->
<script>
        $(document).ready(function(){
            $("#check").change(function(){
                if($(this).is(":checked")) 
                {
                    $(".kt").removeAttr('disabled');
                    $(".kt1").attr('disabled','');
                }
                else
                {
                    $(".kt").attr('disabled','');
                    $(".kt1").removeAttr('disabled');
                }
            });
        });
    </script>
@endsection