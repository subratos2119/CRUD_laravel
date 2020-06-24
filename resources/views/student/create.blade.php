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
  
  <form action="{{ route('student.store')}}" method="POST" enctype="multipart/form-data">
  	@csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="db_name">
    </div>
    <div class="form-group">
      <label for="roll">Roll</label>
      <input type="number" class="form-control" name="db_roll">
    </div>
    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="number" class="form-control" name="db_phone">
    </div>
    <div class="form-group">
      <label for="file">Student Image</label>
      <input type="file" class="form-control" name="db_image">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<br>
<br>
<br>
<div class="container">
  <h2>Student Table</h2>            
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Image</th>
        <th>Name</th>
        <th>Roll</th>
        <th>Phone</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($students as $key => $student)
      <tr>
        <td>{{$key+1}}</td>
        <td>
          <img width="100" src="{{asset('public/images/'.$student->image)}}">
          
        </td>
        <td>{{$student->name}}</td>
        <td>{{$student->roll}}</td>
        <td>{{$student->phone}}</td>
        <td>
          <a href="{{ route('student.edit',$student->id)}}" type="button" class="btn btn-primary" >Edit</a>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$student->id}}">Delete</button>
        </td>
      </tr>

<!-- The Modal -->
<div class="modal" id="myModal{{$student->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
<form action="{{ route('student.delete',$student->id)}}" method="POST">
  @csrf
  @method('delete')
  <div class="modal-header">
        <h4 class="modal-title">Are you sure to delete ! {{$student->name}}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach
    </tbody>
  </table>
</div>


</body>
</html>