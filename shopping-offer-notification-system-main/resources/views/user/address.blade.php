@extends('layouts.dashboard')

@section('title')
	Shipping address
@endsection
@section('content')
	<form method="post" action="">
		@csrf

		<div class="form-group">
			<label>Name</label>
			<input class="form-control" type="text" name="name">
		</div>

		<div class="form-group">
			<label>Location</label>
			<input class="form-control" type="text" name="location">
		</div>

		<div class="form-group">
			<label>Phone number</label>
			<input class="form-control" type="text" name="phone_number">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">
				Submit
			</button>
		</div>
	</form>
@endsection
