<html>
   
   <head>
      <title>View Rows</title>
   </head>
   
   <body>
      <table border = 1>
         <tr>
            <td>County <br/> Notice Date <br/> (Type)Instrument Number <br/> Trustee No <br/> Last Status</td>
            <td>Assessor's Parcel No <br/> Street <br/> City State, Zip <br/> Loan Owner -- Phone</td>
            <td>Loan Amount -- EMV <br/> Loan Date <br/> Default Amount <br/> As Of -- LTV% <br/> Max Offer (%)</td>
            <td>Bed -- Baths <br/> Units -- SQFT <br/> Year Built <br/> Type Code</td>
         </tr>
         @foreach ($search as $a)
         <tr>
            <td>{{ $a->county }} <br/> {{ $a->recording_date }} <br/> ({{ $a->document_type }}) {{ $a->document_number }} <br/> {{ $a->tee_number }} <br/> {{ $a->dpd_number }}</td>
            <td>{{ $a->APN }} <br/> {{ $a->Situs_Street }} <br/> {{ $a->Situs_City }}, {{ $a->Situs_Zip }} <br/> {{ $a->trustor_full_name }} <br/> {{ $a->Owner_Phone_Number }}</td>
            <td>{{ $a->loan_amt }} -- {{ $a->Special_Name_Alias }} <br/> {{ $a->loan_date }} <br/> {{ $a->amount }} <br/> {{ $a->as_of_date }} -- {{ $a->ltv }}% <br/> {{ $a->maxOffer }}</td>
            <td>{{ $a->bed }} -- {{ $a->bath }} <br/> {{ $a->number_of_units }} -- {{ $a->sq_feet }} <br/> {{ $a->yr_built }} <br/> {{ $a->use_code }}</td>
         </tr>
         @endforeach
      </table>
    
  
   </body>
</html>