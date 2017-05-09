@section('title')
Trang chủ
@endsection
@extends('layout.index')


@section('main')
	<?php $thisPage = 'trangchu';?>
<div id="main">
    	
	<div class="row">	    		
    	<div class="col-md-12 sidebar">
    		<div class="white-well">
				<h3>Lịch thực hành</h3>
				<hr>
			
				<div style="margin-top: 10px;" class="btn-group" data-toggle="buttons">
					<label class="btn btn-default">
						Tuần
					</label>
					@foreach ($allTuan as $t)
	    			<label class="btn btn-default">
						<input type="radio" id="radioTuan{{$t->id}}" name="radioTuan" value="{{$t->id}}"/> {{$t->TenTuan}}
					</label>
					@endforeach
					
				</div>
				<br>
				<br>
				<!-- <div style="margin-top: 10px; margin-bottom: 10px;" class="btn-group" data-toggle="buttons">
					<label class="btn btn-default">
						Buổi
					</label>
	    			<label class="btn btn-default active">
						<input type="radio" name="radioBuoi" value="1" checked/>Sáng
					</label>
					<label class="btn btn-default">
						<input type="radio" name="radioBuoi" value="2"/>Chiều
					</label>
				</div> -->

				<table style="background-color: #e6f3ff;" class="table table-bordered" style="text-align: center;">
					<thead>
						<tr>
							<th colspan="8">Buổi sáng</th>
						</tr>
							<tr>
							<th width="9%">Phòng - Bộ môn</th>
							<th width="13%">Thứ 2</th>
							<th width="13%">Thứ 3</th>
							<th width="13%">Thứ 4</th>
							<th width="13%">Thứ 5</th>
							<th width="13%">Thứ 6</th>
							<th width="13%">Thứ 7</th>
							<th width="13%">CN</th>        								
							</tr>
					</thead>
					<tbody>
					@foreach($phong as $p)
				      	<tr>						        								        	
							<td>{{$p->TenPhong}} - 
							@foreach ($allBM as $bm)
								@if ($bm->id == $p->idBoMon)
									{{$bm->TenVietTat}}
								@endif
							@endforeach
							</td>
							<td id="{{$p->id}}2s"></td>
				        	<td id="{{$p->id}}3s"></td>
				        	<td id="{{$p->id}}4s"></td>
				        	<td id="{{$p->id}}5s"></td>
				        	<td id="{{$p->id}}6s"></td>
				        	<td id="{{$p->id}}7s"></td> 
				        	<td id="{{$p->id}}8s"></td> 
			     	 	</tr>				     	 	
		     	 	@endforeach	
					</tbody>
				</table>

				<table style="background-color: #ffffe6;" class="table table-bordered" style="text-align: center;">
					<thead>
						<tr>
							<th colspan="8">Buổi chiều</th>
						</tr>
							<tr>
							<th width="9%">Phòng</th>
							<th width="13%">Thứ 2</th>
							<th width="13%">Thứ 3</th>
							<th width="13%">Thứ 4</th>
							<th width="13%">Thứ 5</th>
							<th width="13%">Thứ 6</th>
							<th width="13%">Thứ 7</th>
							<th width="13%">CN</th>        								
							</tr>
					</thead>
					<tbody>
					@foreach($phong as $p)
				      	<tr>						        								        	
							<td>{{$p->TenPhong}}</td>
							<td id="{{$p->id}}2c"></td>
				        	<td id="{{$p->id}}3c"></td>
				        	<td id="{{$p->id}}4c"></td>
				        	<td id="{{$p->id}}5c"></td>
				        	<td id="{{$p->id}}6c"></td>
				        	<td id="{{$p->id}}7c"></td> 
				        	<td id="{{$p->id}}8c"></td> 
			     	 	</tr>				     	 	
		     	 	@endforeach	
					</tbody>
				</table>
			</div>
		</div>
		

    	
	</div>
    
</div> <!-- /main -->
@endsection

@section('script')
<script type="text/javascript">

	$(document).ready(function(){ 	
		$('#radioTuan1').prop('checked', true);
		$('#radioTuan1').parent().addClass('active');
 		@foreach ($lich as $lich) 			
 			$('#' + {{$lich->idPhong}} + {{$lich->idThu}} + 's').html("{{$lich->MaMH}} - Thầy {{$lich->TenGV}}");
 			$('#' + {{$lich->idPhong}} + {{$lich->idThu}} + 's').addClass('bg-xam');
 		@endforeach

 		@foreach ($lichChieu as $lichC) 			
 			$('#' + {{$lichC->idPhong}} + {{$lichC->idThu}} + 'c').html("{{$lichC->MaMH}} - Thầy {{$lichC->TenGV}}");
 			$('#' + {{$lichC->idPhong}} + {{$lichC->idThu}} + 'c').addClass('bg-xam');
 		@endforeach

		//ajax theo buoi
		$("input[name=radioBuoi]").change(function () {
			var buoiLich = $("input[name=radioBuoi]:checked").val();
			var tuanLich = $("input[name=radioTuan]:checked").val();
       		emptyLich();

       		$.ajax({
	            type: "get",
	            url: "ajax/getLich/" + buoiLich + "/" + tuanLich,
	            success: function (data) {
	                //console.log(data);
	            	showLich(data);	               
	            },
	            error: function (data) {
	                console.log('Error:', data);
	            }
	        });
    	});

    	//ajax theo tuan
		$("input[name=radioTuan]").change(function () {
			var buoiLich = $("input[name=radioBuoi]:checked").val();
			var tuanLich = $("input[name=radioTuan]:checked").val();
       		emptyLich();

       		$.ajax({
	            type: "get",
	            url: "ajax/getLich/" + buoiLich + "/" + tuanLich,
	            success: function (data) {
	                console.log(data);
	            	showLich(data);	               
	            },
	            error: function (data) {
	                console.log('Error:', data);
	            }
	        });
    	});

	});

	function emptyLich() {		
		@foreach($phong as $ph)
			var t = $('#' + {{$ph->id}} + 2 + 's');
			t.html('');
			t.addClass('bg-trang');
	    	t = $('#' + {{$ph->id}} + 3 + 's');
	    	t.html('');
	    	t.addClass('bg-trang');
	    	t = $('#' + {{$ph->id}} + 4 + 's');
	    	t.html('');
	    	t.addClass('bg-trang');
	    	t = $('#' + {{$ph->id}} + 5 + 's');
	    	t.html('');
	    	t.addClass('bg-trang');
	    	t = $('#' + {{$ph->id}} + 6 + 's');
	    	t.html('');
	    	t.addClass('bg-trang');
	    	t = $('#' + {{$ph->id}} + 7 + 's');
	    	t.html('');
	    	t.addClass('bg-trang');
	    	t = $('#' + {{$ph->id}} + 8 + 's');
	    	t.html('');
	    	t.addClass('bg-trang');
	    	t = $('#' + {{$ph->id}} + 2 + 'c');
			t.html('');
			t.addClass('bg-trang');
	    	t = $('#' + {{$ph->id}} + 3 + 'c');
	    	t.html('');
	    	t.addClass('bg-trang');
	    	t = $('#' + {{$ph->id}} + 4 + 'c');
	    	t.html('');
	    	t.addClass('bg-trang');
	    	t = $('#' + {{$ph->id}} + 5 + 'c');
	    	t.html('');
	    	t.addClass('bg-trang');
	    	t = $('#' + {{$ph->id}} + 6 + 'c');
	    	t.html('');
	    	t.addClass('bg-trang');
	    	t = $('#' + {{$ph->id}} + 7 + 'c');
	    	t.html('');
	    	t.addClass('bg-trang');
	    	t = $('#' + {{$ph->id}} + 8 + 'c');
	    	t.html('');
	    	t.addClass('bg-trang');
    	@endforeach

	}

	function showLich(data) {
		var jsonLich = '{ "lich" :' + data + '}';
		var obj = JSON.parse(jsonLich);
		//alert(obj.lich.length);
		
		for(i = 0; i < obj.lich.length; i++)
		{	
			if (obj.lich[i].idBuoi == 1)
			{
				var cell = $('#' + obj.lich[i].idPhong + obj.lich[i].idThu + 's');
				var noidung = obj.lich[i].MaMH + " - Thầy " + obj.lich[i].TenGV;			
				cell.text(noidung);		
				cell.removeClass('bg-trang');
				cell.addClass('bg-xam');	
			} else if (obj.lich[i].idBuoi == 2)
			{
				var cell = $('#' + obj.lich[i].idPhong + obj.lich[i].idThu + 'c');
				var noidung = obj.lich[i].MaMH + " - Thầy " + obj.lich[i].TenGV;			
				cell.text(noidung);		
				cell.removeClass('bg-trang');
				cell.addClass('bg-xam');
			}
		}
	}

	
</script>
@endsection