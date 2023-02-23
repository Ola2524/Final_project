@extends('layout.app')
@section('content')
<div class="main">
  <div class="container">
    <div class="card" style="margin:20px;">
      <div class="card-header">Create New Users
      </div>
    </div>
  <div class="card-body">
       
      <form action="{{ url('user') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>City</label></br>
        <input type="text" name="city" id="city" class="form-control"></br>
        <label>Country</label></br>
        <input type="text" name="country" id="country" class="form-control"></br>
        <label>Street</label></br>
        <input type="text" name="street" id="street" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" class="form-control"></br>
        <label for="title">Select User:</label>
        <select name="user_role" id="state" class="form-control">
            <option value="user" >User</option>
              <option value="admin" >Admin</option>
        </select>
        <br>
        <input type="submit" value="Submit" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
    </div>
    </div>

</body>
</html>
@endsection