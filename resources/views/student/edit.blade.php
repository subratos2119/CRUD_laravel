<!DOCTYPE html>
<html>
<head>
	<title>Student Database</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<div class="container">
  
  <form action="{{ route('student.update',$students->id) }}" method="POST" enctype="multipart/form-data">
  	@csrf
  	@method('put')
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="db_name" value="{{$students->name}}">
    </div>
    <div class="form-group">
      <label for="roll">Roll</label>
      <input type="number" class="form-control" name="db_roll" value="{{$students->roll}}">
    </div>
    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="number" class="form-control" name="db_phone" value="{{$students->phone}}">
    </div>
     <div class="form-group">
      <label for="file">Student Inage</label>
      <input type="file" class="form-control" name="db_image">
    </div>

    <div class="row">
      <div class="col-12">
         <img width="500" src="{{asset('public/images/'.$students->image)}}">
      </div>
    </div>

    <br>

    

    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>

</body>
</html>