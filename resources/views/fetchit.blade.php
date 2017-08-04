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
 
    <button type="submit">Search</button>
</form>