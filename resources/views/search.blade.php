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
         @foreach ($search as $a)
         <tr>
            <td>{{ $a->APN }}</td>
            <td>{{ $a->assessed_value}}
         </tr>
         @endforeach
      </table>
    
  
   </body>
</html>