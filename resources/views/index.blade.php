@extends('layouts.master')
@section('content')
	<div class="container">
		<div class="row">
			@if(Auth::check())
				<form method="GET" action="/search">
					{{csrf_field()}}
					Fetch for records containing <input type="text" id="fetchinput" name="fetchinput"> using criteria 
					<select id="criteria" name="criteria">
						<option value="apn">Property's APN</option>
						<option value="situs_street">Property Street Address</option>
						<option value="document_number">Notice Document Number</option>
						<option value="tee_loan_number">Loan Document Number</option>
						<option value="tee_number">Trustee Sale Number</option>
						<option value="trustor_full_name">Homeowner's Name</option>
						<option value="owner_phone_number">Homeowner's Phone Number</option>
					</select>
					<button type="submit" class="btn btn-primary">Search</button>
				</form>
			@else
				<div class="container">
					<div class="starter-template">
						<h1>Welcome to Retran 2.0</h1>
						<p class="lead">This is it.</p>
					</div>
				</div><!-- /.container -->
				<div class="col-md-8">
					<h1>Sign In</h1>
					<form action="/login" method=POST>
						{{csrf_field()}}
						<div class="form-group">
							<label for="email">Email Address:</label>
							<input type="email" class="form-control" id="email" name="email">
						</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" class="form-control" id="password" name="password">
						</div>
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Sign In</button>
						</div>
						@include('layouts.errors')
					</form>
					<a href="/register">Register</a>
				</div>
			@endif
		</div>
	</div>
@endsection