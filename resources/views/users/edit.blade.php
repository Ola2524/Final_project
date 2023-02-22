@extends('layout.app')
@section('content')
<div class="main" >
        <div class="container" >
<div class="card" style="margin:20px;  ">
  <div class="card-header">Edit User</div>
  <div class="card-body">
       
    <form action="{{ url('user/' .$users->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$users->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$users->name}}" class="form-control"></br>
        <label>City</label></br>
        <input type="text" name="city" id="city" value="{{$users->city}}" class="form-control"></br>
        <label>Country</label></br>
        <input type="text" name="country" id="country" value="{{$users->country}}" class="form-control"></br>
        <label>Street</label></br>
        <input type="text" name="street" id="street" value="{{$users->street}}" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" value="{{$users->email}}" class="form-control"></br>
        <select name="user_role" id="state" class="form-control">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
    </div>
    </div>
    </div>
  
</body>
</html>
@endsection