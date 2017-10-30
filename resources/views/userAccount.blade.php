@extends('layouts.master')
@push('css')
	<link rel="stylesheet" href="/css/account.css">
@endpush
@section('content')
	<div class="container">
		<div class="row">
			@if(isset($user))
				<div class="col-md-12">
					<div class="row">
						<h2>Hi {{$user->name}}</h2>
					</div>
					<div class="row">
						<div class="col-md-6">
							<h3>Bookmarks</h3>
							@foreach($user->bookmarks as $bookmark)
								<div class="row">
									<div class="col-md-7"><a href=/search/{{$bookmark->count2}}> {{ $bookmark->address }}</a></div>
									<div class="col-md-1">
										<form action="/bookmark/{{$bookmark->id}}">
											{{csrf_field()}}
											<button type="submit" name="delete" formmethod="POST" class="custDelete">Delete</button>
										</form>
									</div>
								</div>
							@endforeach
						</div>
						<div class="col-md-6">
							<h3>Search Filters</h3>
							@foreach($user->filters as $filter)
								<div class="row">
									<div class="col-md-5"><a href="/batchsearch?searchName={{$filter->name}}&{{$filter->options}}"> {{ $filter->name }}</a></div>
									<div class="col-md-1">
										<form action="/filter/{{$filter->id}}">
											{{csrf_field()}}
											<button type="submit" name="delete" formmethod="POST" class="custDelete">Delete</button>
										</form>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection