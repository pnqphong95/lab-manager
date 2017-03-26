@section('title')
Trang chủ
@endsection
@extends('layout.index')

@section('main')
<div class="row">
	<div class="col-lg-12">
		<div class="white-well">
		<center>
			    <div class="error-template">
				    <h1>Oops!</h1>
				    <h2>404 Not Found</h2>
				    <div class="error-details">
						Sorry, an error has occured, Requested page not found!<br>
				    </div>
				    <div class="error-actions">
						<a href="" class="btn btn-primary">
						    <i class="icon-home icon-white"></i> Take Me Home </a>
						<a href="" class="btn btn-default">
						    <i class="icon-envelope"></i> Contact Support </a>
				    </div>
				</div>
				</center>
		</div> {{-- <div class="white-well"> --}}
	</div> {{-- <div class="col-lg-12"> --}}

</div> {{-- <div class="row"> --}}
@endsection