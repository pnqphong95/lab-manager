@extends('layout.index')


@section('main')
<div id="main">
    	
	<div class="row">	    		
    	<div class="col-md-9 sidebar">
    		<div class="panel panel-primary">
					<div class="panel-heading">
						<h4><center>LỊCH THỰC HÀNH</center></h4>
					</div>
					<div class="panel-body">
						<div style="margin-top: 10px;" class="btn-group" data-toggle="buttons">
						<label class="btn btn-default">
							Tuần
						</label>
		    			<label class="btn btn-default active">
							<input type="radio" name="radioTuan" value="1" checked/>1
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioTuan" value="2"/>2
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioTuan" value="3"/>3
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioTuan" value="4"/>4
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioTuan" value="5"/>5
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioTuan" value="6"/>6
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioTuan" value="7"/>7
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioTuan" value="8"/>8
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioTuan" value="9"/>9
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioTuan" value="10"/>10
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioTuan" value="11"/>11
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioTuan" value="12"/>12
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioTuan" value="13"/>13
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioTuan" value="14"/>14
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioTuan" value="15"/>15
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioTuan" value="16"/>16
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioTuan" value="17"/>17
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioTuan" value="18"/>18
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioTuan" value="19"/>19
						</label>								
					</div>

					<div style="margin-top: 10px; margin-bottom: 10px;" class="btn-group" data-toggle="buttons">
						<label class="btn btn-default">
							Buổi
						</label>
		    			<label class="btn btn-default active">
							<input type="radio" name="radioBuoi" value="1" checked/>Sáng
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioBuoi" value="2"/>Chiều
						</label>
					</div>

						<table class="table table-bordered" style="text-align: center;">
						<thead>
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
								<td id="{{$p->id}}2"></td>
					        	<td id="{{$p->id}}3"></td>
					        	<td id="{{$p->id}}4"></td>
					        	<td id="{{$p->id}}5"></td>
					        	<td id="{{$p->id}}6"></td>
					        	<td id="{{$p->id}}7"></td> 
					        	<td id="{{$p->id}}8"></td> 
				     	 	</tr>				     	 	
			     	 	@endforeach	
						</tbody>
						</table>

					</div> <!-- /panel-body -->
			</div>
    	</div> <!-- /sibar -->

    	<div class="col-md-3 sidebar">

			<div class="panel panel-primary lich">
					<div class="panel-heading">
						<span><center>LỊCH</center></span>
					</div>
					<div class="panel-body" style="padding: 1px;">
						<script type="text/javascript">  								
							document.write(printCal());  								
						</script>
					</div>
			</div> <!-- /lich -->

    		<div class="panel panel-primary hinh">
					<div class="panel-heading">
						<span><center>HÌNH ẢNH</center></span>
					</div>
					<div class="panel-body">
						<img width="100%" src="img/khoa.png" class="img-responsive">
					</div>
			</div> <!-- /hinh -->
			
    	</div> <!-- /sibar -->
	</div>
    
</div> <!-- /main -->
@endsection

@section('script')
<script type="text/javascript">

	$(document).ready(function(){ 	
 		@foreach ($lich as $lich) 			
 			$('#' + {{$lich->idPhong}} + {{$lich->idThu}}).html("{{$lich->TenLop}} - Thầy {{$lich->TenGV}}");
 		@endforeach

		//ajax theo buoi
		$("input[name=radioBuoi]").change(function () {
			var buoiLich = $("input[name=radioBuoi]:checked").val();
			var tuanLich = $("input[name=radioTuan]:checked").val();
			//alert(tuanLich);
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

    	//ajax theo tuan
		$("input[name=radioTuan]").change(function () {
			var buoiLich = $("input[name=radioBuoi]:checked").val();
			var tuanLich = $("input[name=radioTuan]:checked").val();
			//alert(tuanLich);
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
			var t = $('#' + {{$ph->id}} + 2);
			t.html('');
	    	t = $('#' + {{$ph->id}} + 3);
	    	t.html('');
	    	t = $('#' + {{$ph->id}} + 4);
	    	t.html('');
	    	t = $('#' + {{$ph->id}} + 5);
	    	t.html('');
	    	t = $('#' + {{$ph->id}} + 6);
	    	t.html('');
	    	t = $('#' + {{$ph->id}} + 7);
	    	t.html(''); 
	    	t = $('#' + {{$ph->id}} + 8);
	    	t.html('');
    	@endforeach

	}

	function showLich(data) {
		var jsonLich = '{ "lich" :' + data + '}';
		var obj = JSON.parse(jsonLich);
		//alert(obj.lich.length);
		
		for(i = 0; i < obj.lich.length; i++)
		{			
			var cell = $('#' + obj.lich[i].idPhong + obj.lich[i].idThu);
			var noidung = obj.lich[i].TenLop + " - Thầy " + obj.lich[i].TenGV;			
			cell.text(noidung);			
		}
	}
</script>
@endsection