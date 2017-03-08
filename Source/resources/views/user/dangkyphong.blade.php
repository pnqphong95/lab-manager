@section('title')
Đăng ký phòng
@endsection
@extends('layout.index')


@section('main')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<h2>Đăng ký phòng thực hành</h2>
		<form>
			<div class="form-group">
				<div class="btn-group" data-toggle="buttons">
					<label class="btn btn-default">
						Phòng
					</label>
					@foreach($phong as $p1)
	    			<label class="btn btn-default">
						<input type="radio" name="radioPhong" value="{{$p1->id}}"/>{{$p1->TenPhong}}
					</label>
					@endforeach
				</div>
			</div>
			<div class="form-group has-warning has-feedback">
				<div class="btn-group" data-toggle="buttons">
					<label class="btn btn-default">
						Tuần
					</label>
					@for($i = 1; $i <= 20; $i++)
	    			<label class="btn btn-default">
						<input type="radio" name="radioTuan" value="{{$i}}"/>{{$i}}
					</label>
					@endfor
				</div>
			</div>
			<div class="form-group has-error has-feedback">
				<div class="btn-group" data-toggle="buttons">
					<div class="btn-group" data-toggle="buttons">
					<label class="btn btn-default">
						Thứ
					</label>
	    			<label class="btn btn-default active">
						<input type="radio" name="radioThu" value="1" checked/>CN
					</label>
					<label class="btn btn-default">
						<input type="radio" name="radioThu" value="2"/>2
					</label>
					<label class="btn btn-default">
						<input type="radio" name="radioThu" value="3"/>3
					</label>
					<label class="btn btn-default">
						<input type="radio" name="radioThu" value="4"/>4
					</label>
					<label class="btn btn-default">
						<input type="radio" name="radioThu" value="5"/>5
					</label>
					<label class="btn btn-default">
						<input type="radio" name="radioThu" value="6"/>6
					</label>
					<label class="btn btn-default">
						<input type="radio" name="radioThu" value="7"/>7
					</label>
				</div>
				</div>
			</div>		
			<div class="form-group has-error has-feedback">
				<div class="btn-group" data-toggle="buttons">
					<div class="btn-group" data-toggle="buttons">
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
			</div>		
			<div class="input-group">
      			<div class="input-group-addon">$</div>
      			<input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount">
      			<div class="input-group-addon">.00</div>
    		</div>		 
			<button type="submit" class="btn btn-info">Create Account</button>
		</form>
	</div>
</div>
@endsection

@section('script')

@endsection