@extends('layouts.master')
@section('page-css')
	<link rel="stylesheet" href="/css/records.css">
@endsection
@section('content')
	@if(isset($search))
		<div class="container-fluid" id="displayListingWrap">
			@foreach ($search as $row)
				<div class="card">
					<div class="row topBar">
						<div class="col-md-7">
							<span class="address"><span class="big"><a href=search/{{ $row->count2 }}> {{ $row->Situs_Street }}</a></span> {{ $row->Situs_City }} {{ $row->Mail_Carrier_Route }}, {{ $row->Situs_Zip }}</span>
						</div>
						<div class="col-md-5 text-md-right">
							<div class="mainInfo">
								<div class="bedBathWrap">
									<span class="bed"><b>{{ $row->bed }}</b> bed</span> +
									<span class="bath"><b>{{ $row->bath }}</b> bath</span>
								</div> |
								<div class="sqFeetWrap">
									<span class="sqFeet"><b>{{ $row->sq_feet }}</b> Sq. Ft</span>
								</div> |
								<div class="buildYearWrap">
									<span class="buildYear"><b>{{ $row->yr_built }}</b> Build Year</span>
								</div> |
								<div class="sfrWrap">
									<span class="sfr"><b>{{ $row->use_code }}</b></span>
								</div>
							</div>
						</div>
					</div>
					<div class="midSection row">
						<div class="col-md-4">
							<div class="row">
								<div class="col-md-5 text-md-right">
									<span class="label">County</span>
								</div>
								<div class="col-md-7">
									<span class="info county"><b>{{ $row->county }}</b> (retran code)</span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 text-md-right">
									<span class="label">Notice Date</span>
								</div>
								<div class="col-md-7">
									<span class="info noticeDate"><b>{{ $row->recording_date }}</b></span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 text-md-right">
									<span class="label">(Type) Instrument</span>
								</div>
								<div class="col-md-7">
									<span class="info instrument"><b>({{ $row->document_type }}){{ $row->document_number }}</b></span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 text-md-right">
									<span class="label">Trustee NO.</span>
								</div>
								<div class="col-md-7">
									<span class="info trusteeNO"><b>{{ $row->tee_number }}</b></span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 text-md-right">
									<span class="label">Last Status</span>
								</div>
								<div class="col-md-7">
									<span class="info lastStatus">Join outtracking?</span>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="row">
								<div class="col-md-5 text-md-right">
									<span class="label">Assessor's Parcel NO.</span>
								</div>
								<div class="col-md-7">
									<span class="info parcelNO"><b>{{ $row->APN }}</b></span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 text-md-right">
									<span class="label">Beneficiary</span>
								</div>
								<div class="col-md-7">
									<span class="info beneficiary"><b>{{ $row->beneficiary_name }}</b></span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 text-md-right">
									<span class="label">Loan Owner</span>
								</div>
								<div class="col-md-7">
									<span class="info loanOwner"><b>{{ $row->trustor_full_name }}</b></span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 text-md-right">
									<span class="label">Phone</span>
								</div>
								<div class="col-md-7">
									<span class="info phone"><b>Owner or Trustee?</b></span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 text-md-right">
									<span class="label">Loan Amount - EMV</span>
								</div>
								<div class="col-md-7">
									<span class="info loanAmount"><b>${{ number_format((int)$row->loan_amt) }} - {{ number_format((int)$row->Special_Name_Alias) }}</b></span>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="row">
								<div class="col-md-5 text-md-right">
									<span class="label">Loan Date</span>
								</div>
								<div class="col-md-7">
									<span class="info loanDate"><b>{{ $row->loan_date }}%</b></span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 text-md-right">
									<span class="label">Default Amount - FMR</span>
								</div>
								<div class="col-md-7">
									<span class="info defaultAmount"><b>${{ number_format((int)$row->amount) }} - FMR?</b></span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 text-md-right">
									<span class="label">As of - LTV(%)</span>
								</div>
								<div class="col-md-7">
									<span class="info LTV"><b>{{ $row->as_of_date }} - {{ $row->ltv }}%</b></span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 text-md-right">
									<span class="label">Max Offer (%)</span>
								</div>
								<div class="col-md-7">
									<span class="info maxOffer"><b>${{ number_format((int)$row->Special_Name_Alias*.37) }}</b> (37%)</span>
								</div>
							</div>
						</div>
					</div>
					<div class="botSection row">
						<div class="col-md-12">
							<a href="/bookmarkRecord/{{ $row->count2 }}">Bookmark Record</a>
						</div>
					</div>
				</div>
			@endforeach
			<div id="pageLinks">
                {{ $search->appends($_GET)->render() }}
			</div>
		</div>
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