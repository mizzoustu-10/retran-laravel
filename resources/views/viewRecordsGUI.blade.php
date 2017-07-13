<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>viewRecordsGUI</title>
	<link rel="stylesheet" href="css/main.css">
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
	</script>
	<![endif]-->
</head>
<body>
	<header>
		<div class="nonResponseContainer">
			<img src="img/logo.jpg" alt="" id="logo">
			<nav>
				<a href="">Fetch It</a>
				<a href="">Search</a>
				<a href="">Latest Records</a>
				<a href="">Saved Homes</a>
				<a href="">Tutorials</a>
				<a href="">Resources</a>
			</nav>
			<div id="accountBox">
				
			</div>
			<div class="clear"></div>
		</div>
	</header>
	<div id="searchWrap">
		<div class="nonResponseContainer">
			<div id="searchCategoryWrap">
				<ul>
					<li class="active">Notice of Default</li
					>|<li>Notice of Trustee Sales</li
					>|<li>Trustees Deed Upon Sale</li
					>|<li>Auction Information</li
					>|<li>Status of Past Sales</li>
				</ul>
			</div>
			<div id="dateRangeWrap">
				
			</div>
			<div id="searchCriteriaWrap">
				
			</div>
			<div id="search"></div>
		</div>
	</div>
	<div id="displayListingWrap">
		<div class="nonResponseContainer">
		@foreach ($rows as $row)
			<div class="card">
				<div class="topBar">
					<span class="address"><span class="big">{{ $row->Situs_Street }}</span> {{ $row->Situs_City }} {{ $row->Mail_Carrier_Route }}, {{ $row->Situs_Zip }}</span>
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
					<div class="clear"></div>
				</div>
				<div class="midSection">
					<div class="threeCol">
						<div class="col">
							<div class="row"><span class="label">County</span><span class="info county"><b>{{ $row->county }}</b> (retran code)</span><div class="clear"></div></div>
							<div class="row"><span class="label">Notice Date</span><span class="info noticeDate"><b>{{ $row->recording_date }}</b></span><div class="clear"></div></div>
							<div class="row"><span class="label">(Type) Instrument</span><span class="info instrument"><b>({{ $row->document_type }}){{ $row->document_number }}</b></span><div class="clear"></div></div>
							<div class="row"><span class="label">Trustee NO.</span><span class="info trusteeNO"><b>{{ $row->tee_number }}</b></span><div class="clear"></div></div>
							<div class="row"><span class="label">Last Status</span><span class="info lastStatus">Join outtracking?</span><div class="clear"></div></div>
						</div>
						<div class="col">
							<div class="row"><span class="label">Assessor's Parcel NO.</span><span class="info parcelNO"><b>{{ $row->APN }}</b></span><div class="clear"></div></div>
							<div class="row"><span class="label">Beneficiary</span><span class="info beneficiary"><b>{{ $row->beneficiary_name }}</b></span><div class="clear"></div></div>
							<div class="row"><span class="label">Loan Owner</span><span class="info loanOwner"><b>{{ $row->trustor_full_name }}</b></span><div class="clear"></div></div>
							<div class="row"><span class="label">Phone</span><span class="info phone"><b>Owner or Trustee?</b></span><div class="clear"></div></div>
							<div class="row"><span class="label">Loan Amount - EMV</span><span class="info loanAmount"><b>${{ number_format((int)$row->loan_amt) }} - {{ number_format((int)$row->Special_Name_Alias) }}</b></span><div class="clear"></div></div>
						</div>
						<div class="col">
							<div class="row"><span class="label">Loan Date</span><span class="info loanDate"><b>{{ $row->loan_date }}%</b></span><div class="clear"></div></div>
							<div class="row"><span class="label">Default Amount - FMR</span><span class="info defaultAmount"><b>${{ number_format((int)$row->amount) }} - FMR?</b></span><div class="clear"></div></div>
							<div class="row"><span class="label">As of - LTV(%)</span><span class="info LTV"><b>{{ $row->as_of_date }} - {{ $row->ltv }}%</b></span><div class="clear"></div></div>
							<div class="row"><span class="label">Max Offer (%)</span><span class="info maxOffer"><b>${{ number_format((int)$row->Special_Name_Alias*.37) }}</b> (37%)</span><div class="clear"></div></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		@endforeach
		</div>
		<div id="pageLinks">
			{{$rows->links()}}
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#searchCategoryWrap ul li").click(function(){
				$("#searchCategoryWrap ul li.active").removeClass("active");
				$(this).addClass("active");
			});
		});
	</script>
</body>
</html>