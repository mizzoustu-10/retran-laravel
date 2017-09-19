@extends('layouts.master')
@section('page-css')
	<link rel="stylesheet" href="/css/details.css">
@endsection
@section('content')
	@if(isset($result))
        @foreach ($result as $row)
            <div id="wrapper">
                <div id="headbody">
                    <div><span id="street">{{ $row->Situs_Street }}</span>, {{ $row->Situs_City }} CA, {{ $row->Situs_Zip }}</div>
                    <div><span id="number">{{ $row->bed }}</span> bed + <span id="number">{{ $row->bath }}</span> bath | <span id="number">{{ $row->sq_feet }}</span> Sq. Ft. | <span id="number">19{{ $row->yr_built }}</span> Build Year</div>
                    <div><span id="usecode">{{ $row->use_code }}</span></div>
                    <div>&nbsp;</div>
                </div>
                <div id="headbodyright">
                    <div>Recording Notice Date: <span id="number">{{ $row->recording_date }}</span></div>
                    <div>Loan Amount: <span id="number">${{ number_format((int)$row->loan_amt) }}</span></div>
                    <div>Default Amount: <span id="rednumber">${{ number_format((int)$row->amount) }}</span></div>
                   <div> <a href="/bookmarkRecord/{{ $row->count2 }}">Bookmark Record</a></div>
                </div>
                <div id="cleared"></div>
                <div id="body">
                    <div id="title">PROPERTY DETAILS</div><div id="cleared"></div>
                    <div id="bodyleft">
                        Assessor's Parcel NO: <span id="bodynumber">{{ $row->APN }}</span><br/>
                        Property Type: <span id="bodynumber">{{ $row->use_code }}</span><br/>
                        Bed: <span id="bodynumber">{{ $row->bed }}</span></br>
                        Unit:
                    </div>
                    <div id="bodyright">
                        Zoning: <span id="bodynumber">{{ $row->zoning }}</span><br/>
                        Build Year: <span id="bodynumber">19{{ $row->yr_built }}</span><br/>
                        Bath: <span id="bodynumber">{{ $row->bath }}</span><br/>
                        Lot Size: <span id="bodynumber">{{ $row->lot_size }}</span> Sq. Ft.</span><br/>
                    </div>
                    
                    <div id="title">PROPERTY TAX ASSESSMENT</div><div id="cleared"></div>
                    <div id="bodyleft">
                        Land: <span id="bodynumber">${{ $row->land_value }}</span><br/>
                        Improvement: <span id="bodynumber">${{ $row->improve_value }}</span><br/>
                        Total: <span id="bodynumber">${{ $row->assessed_value }} </span><br/>
                        Transfer: <span id="bodynumber">{{ $row->Last_Transfer_Date }}</span><br/>
                    </div>
                    <div id="bodyright">
                        Assessment Year: <span id="bodynumber"></span><br/>
                        Tax Rate: <span id="bodynumber">{{ $row->Tax_Rate }}</span><br/>
                        Property Tax: <span id="bodynumber"></span><br/>
                        Sale Amount: <span id="bodynumber"></span><br/>
                    </div>
                    
                    <div id="title">DEFAULTED LOAN INFORMATION AS OF: {{ $row->as_of_date }}</div><div id="cleared"></div>
                    <div id="bodyleft">
                        Origination Date:<br/>
                        Loan Amount: <span id="bodynumber">${{ $row->loan_amt }}</span><br/>
                        Delinquent Amount: <span id="bodynumber">${{ $row->amount }}</span><br/>
                        Document #: <span id="bodynumber"> {{ $row->loan_doc_number }}</span><br/>
                    </div>
                    <div id="bodyright">
                        Monthly Mortage Payment (Est):<br/>
                        Fair Market Rent (Est): <span id="bodynumber">${{ $row->tee_suite }}</span><br/>
                        1st Missed Payment: <span id="bodynumber"> {{ $row->default_date }}</span><br/>
                        <br/>
                    </div>
                    
                    <div id="title">BENEFICIARY (LENDER) <span id="titleright">FORECLOSING TRUSTEE</span></div><div id="cleared"></div>
                    <div id="bodyleft">
                        <span id="bodynumber">{{ $row->beneficiary_name }}</span><br/>
                        {{ $row->ben_contact }}<br/>
                        {{ $row->ben_st }}<br/>
                        {{ $row->ben_city_state }}, {{ $row->ben_zip }}<br/>
                        {{ $row->ben_phone }}<br/>
                        Loan Number: <span id="bodynumber">{{ $row->tee_loan_number }}</span><br/>
                    </div>
                    <div id="bodyright">
                        <span id="bodynumber">{{ $row->trustee_name }}</span><br/>
                        {{ $row->tee_st }}<br/>
                        {{ $row->tee_city_state }}, {{ $row->tee_zip }}<br/>
                        {{ $row->tee_phone }}<br/>
                        Trustee Number: <span id="bodynumber">{{ $row->tee_number }}</span><br/>
                    </div>
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