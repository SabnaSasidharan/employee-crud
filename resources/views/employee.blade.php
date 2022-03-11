<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Employee Add</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1> Add Employee </h1> <br>
        <form action="{{ route('addemployee')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="ename" class="form-control" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="eemail" class="form-control" placeholder="Enter your email id" required>
            </div>
            <div class="form-group">
                <label>Photo</label>
                <input type="file" name="ephoto" class="form-control"  >
            </div>
            <div class="form-group">
                <label>Designation</label>
                <select class="form-control" name="edesignation" id="edesignation" required>
                    <option value="">--Select--</option>
                    <option value="Programmer">Programmer</option>
                    <option value="Tester">Tester</option>
                    <option value="Designer">Designer</option>
                    <option value="Leader">Leader</option>
                </select>               
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
            <a href='{{"/employee"}}' class="btn btn-primary">Back</a>
        </form>
        </div>
    </div>
</body>
</html>