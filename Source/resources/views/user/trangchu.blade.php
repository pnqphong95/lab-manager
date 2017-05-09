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

				<h3>Lịch thực hành (<span>HK{{$HKNK->HocKy}} / {{$HKNK->NienKhoa}}</span>)</h3>
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
							<th colspan="8">
								<span>Lịch phòng buổi sáng Tuần </span><span id="tuan">1 </span> (Từ <span class="th2"></span> đến <span class="th8"></span>)
							</th>
						</tr>
						<tr>
							<th width="9%">
								<span>Phòng</span><br>
								<span>Bộ môn</span>
							</th>
							<th width="13%">
								<span>Thứ 2</span><br>
								<span class="th2"></span>
							</th>
							<th  width="13%">
								<span>Thứ 3</span><br>
								<span class="th3"></span>
							</th>
							<th  width="13%">
								<span>Thứ 4</span><br>
								<span class="th4"></span>
							</th>
							<th  width="13%">
								<span>Thứ 5</span><br>
								<span class="th5"></span>
							</th>
							<th  width="13%">
								<span>Thứ 6</span><br>
								<span class="th6"></span>
							</th>
							<th width="13%">
								<span>Thứ 7</span><br>
								<span class="th7"></span>
							</th>
							<th width="13%">
								<span>Chủ nhật</span><br>
								<span class="th8"></span>
							</th>
							      								
						</tr>
					</thead>
					<tbody>
					@foreach($phong as $p)
				      	<tr>						        								        	
							
							<td>
								<span>{{$p->TenPhong}}</span><br>
								<span> 
							@foreach ($allBM as $bm)
								@if ($bm->id == $p->idBoMon)
									{{$bm->TenVietTat}}
								@endif
							@endforeach
								</span>
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
							<th colspan="8">
								<span>Lịch phòng buổi chiều Tuần </span><span id="tuan">1 </span> (Từ <span class="th2"></span> đến <span class="th8"></span>)
							</th>
						</tr>
						<tr>
							<th width="9%">
								<span>Phòng</span><br>
								<span>Bộ môn</span>
							</th>
							<th width="13%">
								<span>Thứ 2</span><br>
								<span class="th2"></span>
							</th>
							<th  width="13%">
								<span>Thứ 3</span><br>
								<span class="th3"></span>
							</th>
							<th  width="13%">
								<span>Thứ 4</span><br>
								<span class="th4"></span>
							</th>
							<th  width="13%">
								<span>Thứ 5</span><br>
								<span class="th5"></span>
							</th>
							<th  width="13%">
								<span>Thứ 6</span><br>
								<span class="th6"></span>
							</th>
							<th width="13%">
								<span>Thứ 7</span><br>
								<span class="th7"></span>
							</th>
							<th width="13%">
								<span>Chủ nhật</span><br>
								<span class="th8"></span>
							</th>        								
						</tr>
					</thead>
					<tbody>
					@foreach($phong as $p)
				      	<tr>						        								        	
							<td>
								<span>{{$p->TenPhong}}</span><br>
								<span> 
							@foreach ($allBM as $bm)
								@if ($bm->id == $p->idBoMon)
									{{$bm->TenVietTat}}
								@endif
							@endforeach
								</span>
							</td>
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

		//hien thi ngay len lich
		showNgayStart();

		$('#radioTuan1').prop('checked', true);
		$('#radioTuan1').parent().addClass('active');
		
 		@foreach ($lich as $lich) 			
 			$('#' + {{$lich->idPhong}} + {{$lich->idThu}} + 's').html("<span>{{$lich->MaMH}}<span><br><span>Thầy {{$lich->TenGV}}</span>");
 			$('#' + {{$lich->idPhong}} + {{$lich->idThu}} + 's').addClass('bg-xam');
 		@endforeach

 		@foreach ($lichChieu as $lichC) 			
 			$('#' + {{$lichC->idPhong}} + {{$lichC->idThu}} + 'c').html("{{$lichC->MaMH}} - Thầy {{$lichC->TenGV}}");
 			$('#' + {{$lichC->idPhong}} + {{$lichC->idThu}} + 'c').addClass('bg-xam');
 		@endforeach

		//ajax theo buoi
		// $("input[name=radioBuoi]").change(function () {
		// 	var buoiLich = $("input[name=radioBuoi]:checked").val();
		// 	var tuanLich = $("input[name=radioTuan]:checked").val();
  //      		emptyLich();

  //      		$.ajax({
	 //            type: "get",
	 //            url: "ajax/getLich/" + buoiLich + "/" + tuanLich,
	 //            success: function (data) {
	 //                //console.log(data);
	 //            	showLich(data);	               
	 //            },
	 //            error: function (data) {
	 //                console.log('Error:', data);
	 //            }
	 //        });
  //   	});

    	//ajax theo tuan
		$("input[name=radioTuan]").change(function () {
			var buoiLich = $("input[name=radioBuoi]:checked").val();
			var tuanLich = $("input[name=radioTuan]:checked").val();
       		emptyLich();
       		emptyNgay();

       		$.ajax({
	            type: "get",
	            url: "ajax/getLich/" + buoiLich + "/" + tuanLich,
	            success: function (data) {
	                //console.log(data);
	                $("#tuan").html(tuanLich);
	                showNgay(tuanLich);
	            	showLich(data);	               
	            },
	            error: function (data) {
	                console.log('Error:', data);
	            }
	        });
    	});

	});

	function addDays(date, days) 
	{
	    var result = new Date(date);
	    result.setDate(result.getDate() + days);
	    return result;
	}

	function emptyLich() 
	{		
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

	function emptyNgay ()
	{
		var t = $('.th2');
		t.html('');
    	t = $('.th3');
    	t.html('');
  
    	t = $('.th4');
    	t.html('');
  
    	t = $('.th5');
    	t.html('');
  
    	t = $('.th6');
    	t.html('');
  
    	t = $('.th7');
    	t.html('');
  
    	t = $('.th8');
    	t.html('');  
    	
	}

	function showNgayStart()
	{
		var dateBD = new Date("{{date_format($dateForDisp, 'Y-m-d')}}");

		var t = $('.th2');
		dateTh2 = addDays(dateBD, 0); 
		month2 = dateTh2.getMonth()+1;
		t.html(dateTh2.getDate()+"/"+month2);

    	dateTh3 = addDays(dateBD, 1); 
    	month3 = dateTh3.getMonth()+1;
    	t = $('.th3');
    	t.html(dateTh3.getDate()+"/"+month3);
  
    	dateTh4 = addDays(dateBD, 2); 
    	month4 = dateTh4.getMonth()+1;
    	t = $('.th4');
    	t.html(dateTh4.getDate()+"/"+month4);
  
    	dateTh5 = addDays(dateBD, 3); 
    	month5 = dateTh5.getMonth()+1;
    	t = $('.th5');
    	t.html(dateTh5.getDate()+"/"+month5);
  
    	dateTh6 = addDays(dateBD, 4); 
    	month6 = dateTh6.getMonth()+1;
    	t = $('.th6');
    	t.html(dateTh6.getDate()+"/"+month6);
  
    	dateTh7 = addDays(dateBD, 5); 
    	month7 = dateTh7.getMonth()+1;
    	t = $('.th7');
    	t.html(dateTh7.getDate()+"/"+month7);
  
  		dateTh8 = addDays(dateBD, 6); 
  		month8 = dateTh8.getMonth()+1;
    	t = $('.th8');
    	t.html(dateTh8.getDate()+"/"+month8);
	}

	function showNgay (tuan)
	{
		var dateBD = new Date("{{date_format($dateForDisp, 'Y-m-d')}}");
		var t = $('.th2');

		dateTh2 = addDays(dateBD, (tuan-1)*7); 
		month2 = dateTh2.getMonth()+1;
		t.html(dateTh2.getDate()+"/"+month2);

    	dateTh3 = addDays(dateBD, (tuan-1)*7 + 1); 
    	month3 = dateTh3.getMonth()+1;
    	t = $('.th3');
    	t.html(dateTh3.getDate()+"/"+month3);
  
    	dateTh4 = addDays(dateBD, (tuan-1)*7 + 2); 
    	month4 = dateTh4.getMonth()+1;
    	t = $('.th4');
    	t.html(dateTh4.getDate()+"/"+month4);
  
    	dateTh5 = addDays(dateBD, (tuan-1)*7 + 3); 
    	month5 = dateTh5.getMonth()+1;
    	t = $('.th5');
    	t.html(dateTh5.getDate()+"/"+month5);
  
    	dateTh6 = addDays(dateBD, (tuan-1)*7 + 4); 
    	month6 = dateTh6.getMonth()+1;
    	t = $('.th6');
    	t.html(dateTh6.getDate()+"/"+month6);
  
    	dateTh7 = addDays(dateBD, (tuan-1)*7 + 5); 
    	month7 = dateTh7.getMonth()+1;
    	t = $('.th7');
    	t.html(dateTh7.getDate()+"/"+month7);
  
  		dateTh8 = addDays(dateBD, (tuan-1)*7 + 6); 
  		month8 = dateTh8.getMonth()+1;
    	t = $('.th8');
    	t.html(dateTh8.getDate()+"/"+month8);
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
				var noidung = "<span>" + obj.lich[i].MaMH + "</span><br><span>Thầy " + obj.lich[i].TenGV + "</span>";			
				cell.html(noidung);		
				cell.removeClass('bg-trang');
				cell.addClass('bg-xam');	
			} else if (obj.lich[i].idBuoi == 2)
			{
				var cell = $('#' + obj.lich[i].idPhong + obj.lich[i].idThu + 'c');
				var noidung = "<span>" + obj.lich[i].MaMH + "</span><br><span>Thầy " + obj.lich[i].TenGV + "</span>";			
				cell.html(noidung);		
				cell.removeClass('bg-trang');
				cell.addClass('bg-xam');
			}
		}
	}

	
</script>
@endsection