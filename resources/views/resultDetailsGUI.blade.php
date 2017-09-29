@extends('layouts.master')
@section('page-css')
	<link rel="stylesheet" href="/css/details.css">
@endsection
@section('content')
	@if(isset($result))
        @foreach ($result as $row)
            <div class="wrapper">
                <div class="googlemap">
                    <?php
                        $address = $row->Situs_Street .','. $row->Situs_City .','. $row->Situs_Zip;
                        echo '<img src="https://maps.googleapis.com/maps/api/streetview?size=600x200&location='.$address.'&key=AIzaSyDjjGvvzBSnmzJmAcVOGgHPdH7dfBCmjXc" width="100%">';
                    ?>
                </div>
                <div class="headbody">
                    <div><span class="street">{{ $row->Situs_Street }}</span>, {{ $row->Situs_City }} CA, {{ $row->Situs_Zip }}</div>
                    <div><span class="number">{{ $row->bed }}</span> bed + <span class="number">{{ $row->bath }}</span> bath | <span class="number">{{ $row->sq_feet }}</span> Sq. Ft. | <span class="number">19{{ $row->yr_built }}</span> Build Year</div>
                    <div><span class="usecode">{{ $row->use_code }}</span></div>
                    <div>&nbsp;</div>
                </div>
                <div class="headbodyright">
                    <div>Recording Notice Date: <span class="number">{{ $row->recording_date }}</span></div>
                    <div>Loan Amount: <span class="number">${{ number_format((int)$row->loan_amt) }}</span></div>
                    <div>Default Amount: <span class="rednumber">${{ number_format((int)$row->amount) }}</span></div>
                   <div> <a href="/bookmarkRecord/{{ $row->count2 }}">Bookmark Record</a></div>
                </div>
                <div class="cleared"></div>
                <div class="body">
                    <div class="title">PROPERTY DETAILS</div><div class="cleared"></div>
                    <div class="bodyleft">
                        Assessor's Parcel NO: <span class="bodynumber">{{ $row->APN }}</span><br/>
                        Property Type: <span class="bodynumber">{{ $row->use_code }}</span><br/>
                        Bed: <span class="bodynumber">{{ $row->bed }}</span></br>
                        Unit:
                    </div>
                    <div class="bodyright">
                        Zoning: <span class="bodynumber">{{ $row->zoning }}</span><br/>
                        Build Year: <span class="bodynumber">19{{ $row->yr_built }}</span><br/>
                        Bath: <span class="bodynumber">{{ $row->bath }}</span><br/>
                        Lot Size: <span class="bodynumber">{{ $row->lot_size }}</span> Sq. Ft.</span><br/>
                    </div>
                    
                    <div class="title">PROPERTY TAX ASSESSMENT</div><div class="cleared"></div>
                    <div class="bodyleft">
                        Land: <span class="bodynumber">${{ $row->land_value }}</span><br/>
                        Improvement: <span class="bodynumber">${{ $row->improve_value }}</span><br/>
                        Total: <span class="bodynumber">${{ $row->assessed_value }} </span><br/>
                        Transfer: <span class="bodynumber">{{ $row->Last_Transfer_Date }}</span><br/>
                    </div>
                    <div class="bodyright">
                        Assessment Year: <span class="bodynumber"></span><br/>
                        Tax Rate: <span class="bodynumber">{{ $row->Tax_Rate }}</span><br/>
                        Property Tax: <span class="bodynumber"></span><br/>
                        Sale Amount: <span class="bodynumber"></span><br/>
                    </div>
                    
                    <div class="title">DEFAULTED LOAN INFORMATION AS OF: {{ $row->as_of_date }}</div><div class="cleared"></div>
                    <div class="bodyleft">
                        Origination Date:<br/>
                        Loan Amount: <span class="bodynumber">${{ $row->loan_amt }}</span><br/>
                        Delinquent Amount: <span class="bodynumber">${{ $row->amount }}</span><br/>
                        Document #: <span class="bodynumber"> {{ $row->loan_doc_number }}</span><br/>
                    </div>
                    <div class="bodyright">
                        Monthly Mortage Payment (Est):<br/>
                        Fair Market Rent (Est): <span class="bodynumber">${{ $row->tee_suite }}</span><br/>
                        1st Missed Payment: <span class="bodynumber"> {{ $row->default_date }}</span><br/>
                        <br/>
                    </div>
                    
                    <div class="title">BENEFICIARY (LENDER) <span class="titleright">FORECLOSING TRUSTEE</span></div><div class="cleared"></div>
                    <div class="bodyleft">
                        <span class="bodynumber">{{ $row->beneficiary_name }}</span><br/>
                        {{ $row->ben_contact }}<br/>
                        {{ $row->ben_st }}<br/>
                        {{ $row->ben_city_state }}, {{ $row->ben_zip }}<br/>
                        {{ $row->ben_phone }}<br/>
                        Loan Number: <span class="bodynumber">{{ $row->tee_loan_number }}</span><br/>
                    </div>
                    <div class="bodyright">
                        <span class="bodynumber">{{ $row->trustee_name }}</span><br/>
                        {{ $row->tee_st }}<br/>
                        {{ $row->tee_city_state }}, {{ $row->tee_zip }}<br/>
                        {{ $row->tee_phone }}<br/>
                        Trustee Number: <span class="bodynumber">{{ $row->tee_number }}</span><br/>
                    </div>
                </div>
                <?php
                    $apn = $row->APN;
                    $result = DB::table('outindexdftr')
                    ->join('outtd', 'outindexdftr.apn', '=', 'outtd.apn')
                    ->where('outindexdftr.apn', '=', $apn)
                    ->get();
                    //dd($row);
                foreach ($result as $row)
                {
                if (isset($row))
                {
                //print $row->bene1;
                print '<div class="table">';
                print  '<span class="tableheader">ABRIDGED TITLE CHAIN OF FIRST 10 OPEN TDS AND LIENS (AS OF: ' . $row->recording_date . ')</span>';
                print    '<br/><br/>';
                print    '<table align="center">';
                
                print   '<tr>
                        <th class="headrow">Grantee/Lender</th>
                            <th class="headrow">Amount</th>
                            <th class="headrow">Type</th>
                            <th class="headrow">Date</th>
                            <th class="headrow">Verified</th>
                            <th class="headrow">Document #</th>
                        </tr>';
                         
                          
                            for ($count=1; $count <= 10; $count++)
                            {
                                $benefit = 'bene' . $count;
                                $amount = 'amt' . $count;
                                $type = 'type' . $count;
                                $date = 'date' . $count;
                                $verified = 'verified' . $count;
                                $doc = 'doc' . $count;
                                if($row->$benefit !="")
                                {
                                    echo '<tr>';
                                    echo '<td width="40%" class="bodyrow">'.$row->$benefit.'</td>';
                                    echo '<td class="bodyrow">'.$row->$amount.'</td>';
                                    echo '<td class="bodyrow">'.$row->$type.'</td>';
                                    echo '<td class="bodyrow">'.$row->$date.'</td>';
                                    echo '<td class="bodyrow"></th>';
                                    echo '<td class="bodyrow">'.$row->$doc.'</td>';
                                    echo '</tr>';
                                }
                            }
                            
                    }            
                else {
                        print "blah";
                }
                break;
            }
                ?>
                        <tr>
                            <th class="headrow"></th>
                            <th class="headrow"></th>
                            <th class="headrow"></th>
                            <th class="headrow"></th>
                            <th class="headrow"></th>
                            <th class="headrow"></th>
                        </tr>
                    </table>
                </div>
            </div>
            <?php break; ?>
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