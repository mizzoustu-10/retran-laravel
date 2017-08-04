 <html lang="en">
<head>
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#datestart" ).datepicker();
  });

  $(function() {
    $( "#dateend" ).datepicker();
  });

  </script>
</head>

<body>
<!--form method="GET" action="/batchsearch">-->
    
    {{ Form::open(array('url' => '/batchsearch', 'method' => 'get')) }}
    {{csrf_field()}}
    <!--From: <input type="date" name="startdate" id="datestart">
    <br/>
    To: <input type="date" name="enddate" id="dateend">-->
    From: {{ Form::text('startdate', '', array('id' => 'datestart')) }}
    To: {{ Form::text('enddate', '', array('id' => 'dateend')) }}
    {{ Form::radio('recordingdate', 'recording_date') }}Recording Date
    {{ Form::radio('forecastedsale', 'forecastedsale') }}Forecasted Sale
    {{ Form::radio('published', 'published') }}Published
    <br/>
    Location {{ Form::text('Situs_zip') }}
    Bed {{ Form::selectRange('bed', 1, 10) }}
    Bath {{ Form::selectRange('bath', 1, 10) }}
    Min Sq Ft {{ Form::select('minsqft', [500, 1000, 1500, 2000, 2500, 3000, 3500, 4000, 4500, 5000, 5500, 6000, 6500, 7000, 7500, 8000, 8500, 9000, 9500, 10000]) }}
    Max Sq Ft {{ Form::select('maxsqft', [500, 1000, 1500, 2000, 2500, 3000, 3500, 4000, 4500, 5000, 5500, 6000, 6500, 7000, 7500, 8000, 8500, 9000, 9500, 10000]) }}
    Min Lot Size {{ Form::select('minlot', [500, 1000, 1500, 2000, 2500, 3000, 3500, 4000, 4500, 5000, 5500, 6000, 6500, 7000, 7500, 8000, 8500, 9000, 9500, 10000]) }}
    Max Lot Size {{ Form::select('maxlot', [500, 1000, 1500, 2000, 2500, 3000, 3500, 4000, 4500, 5000, 5500, 6000, 6500, 7000, 7500, 8000, 8500, 9000, 9500, 10000]) }}
    Units {{ Form::selectRange('units', 1, 20) }}
    Days on MLS {{ Form::select('minmls', [1, 30, 60, 90, 120, 150, 180, 360]) }}
    {{ Form::select('maxmls', [1, 30, 60, 90, 120, 150, 180, 360]) }}
    {{ Form::submit('Search') }}
    <!--<button type="submit">Search</button>-->
    {{ Form::close() }}
</form>
</body>
</html>
