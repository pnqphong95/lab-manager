@section('title')
Hộp thư người dùng
@endsection
@extends('layout.index')


@section('main')
<?php $thisPage = 'vande';?>
<div class="row">
	<div class="col-lg-12">
		<div class="white-well">
			<h3>Hộp thư</h3>
			<hr>
			<div class="row">
				<div class="col-lg-3">
					<div class="well">
						<center><a href="user/hopthu/soanthu" class="btn btn-danger">Soạn thư</a></center>
						<a href="">Hộp thư đến</a><br>
						<a href="">Hộp thư đi</a>
					</div> 
				</div>
				<div class="col-lg-9">
					<div class="well">
						
					</div> 
				</div>
			</div>
		</div> <!-- <div class="white-well"> -->
	</div> <!-- <div class="col-lg-12"> -->

</div> <!-- <div class="row"> -->
@endsection

@section('script')
<script type="text/javascript">
	
</script>
@endsection