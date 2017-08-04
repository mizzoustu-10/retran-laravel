<form method="POST" action="/search">
    {{csrf_field()}}


    Fetch for records containing <input type="text" id="fetchinput" name="fetchinput"> using criteria 
    <select id="criteria" name="criteria">
        <option value="apn">Property's APN</option>
        <option value="situs_street">Property Street Addres</option>
    </select>       
 
    <button type="submit">Search</button>
</form>