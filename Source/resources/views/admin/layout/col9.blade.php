<div class="col-md-9">
	<div class="panel panel-primary">
	  	<div class="panel-heading">
	    	<h3 class="panel-title"><center>THÔNG TIN LỊCH THỰC HÀNH</center></h3>
	  	</div>
	  	<div class="panel-body">
	    	<div class="well well-sm">				    	
	    		<div>
		    		<div class="btn-group" data-toggle="buttons">
		    			<label class="btn btn-default">
							Tuần
						</label>
		    			<label class="btn btn-default active">
							<input type="radio" name="radioName" value="1" checked/>1
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioName" value="2" />2
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioName" value="3" />3
						</label>
						<label class="btn btn-default ">
							<input type="radio" name="radioName" value="4" />4
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioName" value="5" />5
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioName" value="6" />6
						</label>
						<label class="btn btn-default ">
							<input type="radio" name="radioName" value="7" />7
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioName" value="8" />8
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioName" value="9" />9
						</label>
						<label class="btn btn-default ">
							<input type="radio" name="radioName" value="10" />10
						</label>
						<label class="btn btn-default ">
							<input type="radio" name="radioName" value="11" />11
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioName" value="12" />12
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioName" value="13" />13
						</label>
						<label class="btn btn-default ">
							<input type="radio" name="radioName" value="14" />14
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioName" value="15" />15
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioName" value="16" />16
						</label>
						<label class="btn btn-default ">
							<input type="radio" name="radioName" value="17" />17
						</label>
						<label class="btn btn-default">
							<input type="radio" name="radioName" value="18" />18
						</label>
					</div>
		
				
					<div style="margin-top: 10px;" class="btn-group" data-toggle="buttons">
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
				</div>
				<br>
				<table id="ViewTable" class="table table-bordered" style="background-color: white;">
				    <thead>
				      	<tr>							        	
				        	<th width="9%">Phòng</th>
				        	<th width="13%">Thứ 2</th>
				        	<th width="13%">Thứ 3</th>
				        	<th width="13%">Thứ 4</th>
				        	<th width="13%">Thứ 5</th>
				        	<th width="13%">Thứ 6</th>
				        	<th width="13%">Thứ 7</th>
				        	<th width="13%">Chủ nhật</th>
				      	</tr>
			    	</thead>
				    <tbody>									    				
					@foreach($phong as $phong)
				      	<tr>						        								        	
							<td>{{$phong->TenPhong}}</td>
							<td id="{{$phong->id}}2"></td>
				        	<td id="{{$phong->id}}3"></td>
				        	<td id="{{$phong->id}}4"></td>
				        	<td id="{{$phong->id}}5"></td>
				        	<td id="{{$phong->id}}6"></td>
				        	<td id="{{$phong->id}}7"></td> 
				        	<td id="{{$phong->id}}8"></td> 
			     	 	</tr>
			     	 	<?php $soLuongPhong++;?>
		     	 	@endforeach												      	
				    </tbody>
			  	</table>
	    	</div>				    	
	  	</div>
	  	
	</div>
</div>