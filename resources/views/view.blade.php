<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Datatable CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>

    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Datatable JS -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<div class="container"><a href='{{"/insert"}}' class="btn btn-primary">Add Employee</a><br>
@if(session()->has('message'))
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        {{ session()->get('message') }}
    </div>
@endif
<br>
<table id='empTable' width='100%' border="1" style='border-collapse: collapse;'>
        <thead>
            <tr>
                 <td>Photo</td>
                 <td>Name</td>
                 <td>Email</td>
                 <td>Desination</td>
                 <td>Actions</td>
            </tr>
         </thead>
     </table>
   
     <!-- Script -->
     <script type="text/javascript"> 
     $(document).ready(function(){

         // DataTable
        $('#empTable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{'/employee/getEmployees/'}}",
             columns: [               
                 { data: 'photo' },
                 { data: 'name' },
                 { data: 'email' },
                 { data: 'designation' },
                 { data: 'actions' }                              
             ]
         });

      });
      </script>
        </div>
</body>
</html>