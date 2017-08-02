<html>
   
   <head>
      <title>View Rows</title>
   </head>
   
   <body>
      <table border = 1>
         <tr>
            <td>APN</td>
            <td>Assessed Value</td>
         </tr>
         @foreach ($rows as $row)
         <tr>
            <td>{{ $row->APN }}</td>
            <td>{{ $row->assessed_value }}</td>
         </tr>
         @endforeach
      </table>
    
    {{ Form::open(['method' => 'GET']) }}
        {{ Form::input('search', 'q', null, ['placeholder' => 'Search...']) }}
    {{ Form::close() }}

   </body>
</html>