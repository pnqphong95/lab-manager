@extends('admin.layout.index')

@section('content')
<div class="row">
	<div class="col-lg-12">
	    <div class="white-well">			
			<ul class="nav nav-tabs">
			    <li class="active"><a href="admin/lich/danhsach#lich"><h4>Lịch thực hành</h4></a></li>
			    <li><a href="admin/lich/danhsach#choduyet"><h4>Yêu cầu chờ duyệt</h4></a></li>
			    <li><a href="admin/lich/lichchoduyet/danhsach"><h4>Lịch chờ duyệt</h4></a></li>
  			</ul>

  			<div class="tab-content">
  				<div id="lich" class="tab-pane fade in active">
					
				</div> <!-- div#lich -->
				<h3>Danh sách các yêu cầu phòng đăng ký phòng chưa được xếp</h3>
		<hr>
		<table class="table table-striped table-bordered table-hover" id="dataTables-example" style="text-align: center;">
			<thead>
				<?php 
					$i=0;
				 ?>
				<tr>
					<th width="5%">STT</th>
					<th width="15%">Giáo viên</th>
					<th width="10%">Môn học</th>
					<th width="10%">Nhóm</th>
					<th width="10%">Thứ</th>
					<th width="10%">Buổi</th>
					<th width="10%">Tuần</th>
					<th width="10%">Phòng</th>     								
				</tr>
			</thead>
			<tbody>
				@foreach ($allLichCD as $lichCD)
					<?php 
						$i++;
					?>
		      	<tr>						        							<td>{{$i}}</td>     	
					<td>
						@foreach($allGiaoVien as $gv)
							@if($gv->id == $lichCD->idGiaoVien)
								{{$gv->TenGV}}
							@endif
						@endforeach	
					</td>
		        	<td>
		        		@foreach($allMonHoc as $mh)
							@if($mh->id == $lichCD->idMonHoc)
								{{$mh->TenMH}}
							@endif
						@endforeach
		        	</td>
		        	<td>{{$lichCD->Nhom}}</td>
		        	<td>{{$lichCD->idThu}}</td>
		        	<td>
		        	@foreach($allBuoi as $b)
							@if($b->id == $lichCD->idBuoi)
								{{$b->TenBuoi}}
							@endif
						@endforeach
		        	</td>
		        	<td>{{$lichCD->idTuan}}</td> 
		        	<td>
		        		<form action="" type="post">
		        			<input type="hidden" name="idLichCD" value="{{$lichCD->id}}">
		        			<button class="btn btn-info btn-xs btn-xepphong" type="button">Xếp phòng</button>
		        		</form>
		        	</td>
	     	 	</tr>
	     	 	@endforeach
	     	 </tbody>
	    </table>
				
			</div> <!-- div.tab-content -->
		</div>
	</div> <!-- <div class="col-lg-12"> -->

</div> <!-- <div class="row"> -->
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready (function (){
		$('.btn-xepphong').click(function () {
			var select = $('<select><option>1</option></select>');
			var btnOK = $('<button>OK</button>');
			var parentEle = $(this).parent();
			$(this).remove();
			parentEle.append(select);
			parentEle.append(btnOK);
		});
	});
</script>
@endsection