<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee View</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>

    <!--delete modal-->
    <div id="deleteModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">										
				<h4 class="modal-title w-100">Delete Employee</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
            
			<div class="modal-body">
                <input type="hidden" id="employee_id" name='id'>
				<p>Do you really want to delete the record?</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="submit" id="empdelete" class="btn btn-danger">Delete</button>
			</div>
           
		</div>
	</div>
</div>   
<!--end delete modal-->
<a href='{{"/insert"}}' class="btn btn-primary">Add Employee</a>
    <div class="container">
        <table>
            <table class="table" id="etable">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Photo</th>
                    <th class="text-center">Designation</th>
                    <th class="text-center" colspan="2">Actions</th>                    
                </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach($edata as $data)
                    <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td class="text-center">{{$data->name}}</td>
                        <td class="text-center">{{$data->email}}</td>
                        <td class="text-center">
                             <img src="{{ asset('uploads/employee/'.$data->photo) }}" height="50px" width="50px"></td>
                        <td class="text-center">{{$data->designations}}</td>
                        <td colspan="2" class="text-center">
                        <!--<button type="submit" name="update" class="btn btn-info" data-taggle="modal" data-target="#editModal">Update</button>                        -->
                        <a href='{{"edit/".$data->id}}' class="btn btn-info">Update</a>
                        <a href='{{"delete/".$data->id}}' class="btn btn-primary">Delete</a>
                    </td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach                    
                </tbody>
            </table>
        </table>
    </div>
    
    
 

<!--<script type="text/javascript">

    function deleteemploye($id){
      
        if(confirm('continue?')){
            alert(id);
            $.ajax({
                url: '/employee/'+id,
                type: 'DELETE',
                data: {
                    _token : $('input[name=_token]').val()
                },
                success: function (response) {
                   // $('#employee_id'+id).remove();
                    alert('success');
                },
                error: function (data) {                 
                   alert(console.log('Error:', data));
                }
            });
        }
    }
       
   $(document).on('click', '#empdelete', function () {   
           
            var id= $("#employee_id").val();
        
            confirm("Are You sure want to delete !"); alert(id);
            $.ajax({
                type: "DELETE",
                url: "/"+id,
                success: function (data) {
                    alert('success');
                },
                error: function (data) {                 
                   alert(console.log('Error:', data));
                }
            });
        });

        function empl_del(id){
            $('#employee_id').val(id); 
        }
    </script>-->
</body>
</html>