@section('title')
Đăng ký phòng
@endsection
@extends('layout.index')


@section('main')
<div class="row">
	<div class="col-lg-12">
		<div class="white-well">
			<!-- Dang ky -->
			<h3>Đăng ký phòng</h3>
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
	                {!!session('thongbao')!!}
		           
		        </div>
		    @endif
			<form action="user/dangkyphong" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">
					<div class="col-lg-4">		
						<div class="form-group">
							<label>Môn học (trong thời khóa biểu)</label>
							<select class="form-control" name="idMonHoc">
							@foreach($allMonHoc as $mh)
								<option value="{{$mh->id}}">{{$mh->TenMH}}</option>
							@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label>Nhóm</label>
							<input type="text" name="nhomHoc" class="form-control" required>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="form-group">
							<label>Đăng ký phòng cho môn học ngoài TKB</label>
							<a class="btn btn-info " href="user/dangkyphongk">Đăng ký môn học khác</a>
						</div>
						
					</div>
				</div>

						<div class="form-group">
							<label>Tuần</label>
							@foreach($allTuan as $t)
						 	<label class="checkbox-inline">
						 		<input class="selectTuan" type="checkbox" value="{{$t->id}}">{{$t->TenTuan}}
						 	</label>
							@endforeach
						</div>

				<div class="form-group">
					<label>Lịch</label>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th style="text-align: center;">Tuần</th>
									<th style="text-align: center;">Thứ 2</th>
									<th style="text-align: center;">Thứ 3</th>
									<th style="text-align: center;">Thứ 4</th>
									<th style="text-align: center;">Thứ 5</th>
									<th style="text-align: center;">Thứ 6</th>
									<th style="text-align: center;">Thứ 7</th>
									<th style="text-align: center;">Chủ nhật</th>
								</tr>
							</thead>
							<tbody id="dataLich" style="text-align: center;">								
							
							</tbody>
						</table>
					</div>
				</div>
				<div class="form-group">
			      	<center><button type="submit" class="btn btn-success">Đăng ký</button></center>
			  </div>
			</form>
			<!-- End dang ky -->
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	
	$(document).ready(function(){	
		var start_td_div = '<td><div class="checkbox">';
		var end_div_td = '</div></td>'
		$('.selectTuan').on( "click", function() {  
			var idTuan = $(this).val();
			var idThu = 2;
			var T2 = start_td_div
				+'<label class="checkbox-inline">'
				+'<input name="lich[]" type="checkbox" class="selectLich" id="'+idTuan+',2,1" value="'+idTuan+',2,1">S'
				+'</label>'
				+'<label class="checkbox-inline">'
				+'<input name="lich[]" type="checkbox" class="selectLich" id="'+idTuan+',2,2" value="'+idTuan+',2,2">C'
				+'</label>'
				+end_div_td;
			var T3 = start_td_div
					+'<label class="checkbox-inline"><input name="lich[]" type="checkbox" value="'+idTuan+',3,1">S</label>'
					+'<label class="checkbox-inline"><input name="lich[]" type="checkbox" value="'+idTuan+',3,2">C</label>'
					+end_div_td;
			var T4 = start_td_div
					+'<label class="checkbox-inline"><input name="lich[]" type="checkbox" value="'+idTuan+',4,1">S</label>'
					+'<label class="checkbox-inline"><input name="lich[]" type="checkbox" value="'+idTuan+',4,2">C</label>'
					+end_div_td;
			var T5 = start_td_div
					+'<label class="checkbox-inline"><input name="lich[]" type="checkbox" value="'+idTuan+',5,1">S</label>'
					+'<label class="checkbox-inline"><input name="lich[]" type="checkbox" value="'+idTuan+',5,2">C</label>'
					+end_div_td;
			var T6 = start_td_div
					+'<label class="checkbox-inline"><input name="lich[]" type="checkbox" value="'+idTuan+',6,1">S</label>'
					+'<label class="checkbox-inline"><input name="lich[]" type="checkbox" value="'+idTuan+',6,2">C</label>'
					+end_div_td;
			var T7 = start_td_div
					+'<label class="checkbox-inline"><input name="lich[]" type="checkbox" value="'+idTuan+',7,1">S</label>'
					+'<label class="checkbox-inline"><input name="lich[]" type="checkbox" value="'+idTuan+',7,2">C</label>'
					+end_div_td;
			var CN = start_td_div
					+'<label class="checkbox-inline"><input name="lich[]" type="checkbox" value="'+idTuan+',8,1">S</label>'
					+'<label class="checkbox-inline"><input name="lich[]" type="checkbox" value="'+idTuan+',8,2">C</label>'
					+end_div_td;
			var tenTuan = $( this ).parent().text();

			var dataLich = '<tr id="tr'+ idTuan +'">' + '<td>'+ tenTuan +'</td>' + T2 + T3 + T4 + T5 + T6 + T7 + CN +'</tr>';
            if($(this).prop("checked") == true){
                $("#dataLich").append(dataLich);
            }
            else if($(this).prop("checked") == false){
     			$('#tr'+idTuan).remove();
            }	        
		});		
	});
</script>
@endsection