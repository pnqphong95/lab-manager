<script type="text/javascript">
	$(document).ready(function(){
		$("input[name=radioBuoi]").change(function () {
			var buoiLich = $("input[name=radioBuoi]:checked").val();
       		emptyLich();

       		$.ajax({

	            type: "get",
	            url: "ajax/getLich/" + buoiLich,
	            success: function (data) {
	                console.log(data);
	            	showLich(data);
	                //alert(data.length);
	            },
	            error: function (data) {
	                console.log('Error:', data);
	            }
	        });
    	});
	});
	//get val() radioFormTuan
	$('#myForm input').on('change', function() {
	   var nameTuan = $('input[name=radioName]:checked', '#myForm').val();
	   $('#nameTuan').html(nameTuan);
	});

	$('body').on('load', function(){
		@for($i = 0; $i<1; $i++)
		var a = $('#13').val();
		alert(a);
		@endfor
	});

	function emptyLich() {
		$(document).ready(function(){
			var i = 1;
			for (i = 1; i < {{$soLuongPhong}}; i++)
			{
			var t = $('#' + i + 2);
			t.html('');
	    	t = $('#' + i + 3);
	    	t.html('');
	    	t = $('#' + i + 4);
	    	t.html('');
	    	t = $('#' + i + 5);
	    	t.html('');
	    	t = $('#' + i + 6);
	    	t.html('');
	    	t = $('#' + i + 7);
	    	t.html(''); 
	    	t = $('#' + i + 8);
	    	t.html('');
	    	}
	    });
	}

	function showLich(data) {
		var jsonLich = '{ "lich" :' + data + '}';
		var obj = JSON.parse(jsonLich);
		//alert(obj.lich.length);
		
		for(i = 0; i < obj.lich.length; i++)
		{
			
			var cell = $('#' + obj.lich[i].idPhong + obj.lich[i].idThu);
			var noidung = obj.lich[i].idLopHocPhan;
			
			cell.text(noidung);
			
		}
	}
</script>

<script type="text/javascript">
 	$(document).ready(function(){ 	
 		@foreach ($lich as $lich) 
 			<?php
 			$lophocphan = LopHocPhan::find( $lich->idLopHocPhan);
 			$giaovien = GiaoVien::find( $lich->idGiaoVien);
 			?>
 			$('#' + {{$lich->idPhong}} + {{$lich->idThu}}).html("{{$lophocphan->TenLop}} - Thầy {{$giaovien->TenGV}}");
 		@endforeach
 	});
</script>