@extends('layouts.master')

@section('content')
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
@endsection