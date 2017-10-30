@extends('layouts.master')
@push('css')
	<link rel="stylesheet" href="/css/search.css">
@endpush
@section('content')
	<div class="container-fluid filterWrap">
		<div class="container" id="searchForm">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8  rounded bgW nested mb10">
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
				</div>
			</div>
			@if(isset($user))
				<div class="row">
					<div class="col-md-6 rounded bgW nested mb10">
						<h3>Bookmarks</h3>
						@foreach($user->bookmarks as $bookmark)
							<div class="row">
								<div class="col-md-12"><a href=/search/{{$bookmark->count2}}> {{ $bookmark->address }}</a></div>
							</div>
						@endforeach
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-5 rounded bgW nested mb10">
						<h3>Search Filters</h3>
						@foreach($user->filters as $filter)
							<div class="row">
								<div class="col-md-5"><a href="/batchsearch?searchName={{$filter->name}}&{{$filter->options}}"> {{ $filter->name }}</a></div>
							</div>
						@endforeach
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection