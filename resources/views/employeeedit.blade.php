<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Employee Edit</title>
</head>
<body>
<div class="container">
        <div class="jumbotron">
            <h1> Update Employee </h1> <br>
        <form action="/update" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
           <input type="hidden" name="eid" value="{{$data['id']}}">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="ename" value="{{$data['name']}}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="eemail" value="{{$data['email']}}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Photo</label>
                <input type="file" name="ephoto" value="{{$data['photo']}}" class="form-control"  >
                <label>{{$data['photo']}}</label>
            </div>
            <div class="form-group">
                <label>Designation</label> 
                <select class="form-control" name="edesignation" id="edesignation" required>
                    <option  value="">--Select--</option>
                    <option {{ ($data['designations']) == 'Programmer' ? 'selected' : '' }} value="Programmer">Programmer</option>
                    <option {{ ($data['designations']) == 'Tester' ? 'selected' : '' }} value="Tester">Tester</option>
                    <option {{ ($data['designations']) == 'Designer' ? 'selected' : '' }} value="Designer">Designer</option>
                    <option {{ ($data['designations']) == 'Leader' ? 'selected' : '' }} value="Leader">Leader</option>
                </select>

              <!--  <input type="text" name="edesignation" value="{{$data['designations']}}" class="form-control" placeholder="Enter your designation" required>-->
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
            <a href='{{"/employee"}}' class="btn btn-primary">Back</a>
        </form>
        </div>
    </div>
</body>
</html>