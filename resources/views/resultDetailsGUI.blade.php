@extends('layouts.master')
@section('page-css')
	<link rel="stylesheet" href="/css/details.css">
@endsection
@section('content')
	@if(isset($result))
        @foreach ($result as $row)
            <div id="wrapper">
                <div id="content">
                    <div><span id="street">{{ $row->Situs_Street }}</span>, {{ $row->Situs_City }} CA, {{ $row->Situs_Zip }}</div>
                    <div><span id="number">{{ $row->bed }}</span> bed + <span id="number">{{ $row->bath }}</span> bath | <span id="number">{{ $row->sq_feet }}</span> Sq. Ft. | <span id="number">19{{ $row->yr_built }}</span> Build Year</div>
                    <div><span id="usecode">{{ $row->use_code }}</span></div>
                </div>
                <div id="sidebar">
                    <div>Recording Notice Date: <span id="number">{{ $row->recording_date }}</span></div>
                    <div>Loan Amount: <span id="number">${{ number_format((int)$row->loan_amt) }}</span></div>
                    <div>Default Amount: <span id="number">${{ number_format((int)$row->amount) }}</span></div>
                </div>
            

        @endforeach
    @endif
@endsection

@section('page-js')
	<script>
		$(document).ready(function(){
			$("#searchCategoryWrap ul li").click(function(){
				$("#searchCategoryWrap ul li.active").removeClass("active");
				$(this).addClass("active");
			});
		});
	</script>
@endsection