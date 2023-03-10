@extends('layout.admin')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Worker</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/workers') }}"> Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
<form action="{{ route('workers.update',$worker->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>National ID:</strong>
                <input type="text" name="national_id" value="{{ $worker->national_id }}" class="form-control" placeholder="National ID">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $worker->users->name }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="img" value="{{$worker->users->img}}"  class="form-control" placeholder="image">
                <img src="/img/{{ $worker->users->img }}" width="300px">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone_Number:</strong>
                <input type="text" name="phone_number" value="{{ $worker->phone_number }}" class="form-control" placeholder="phone_number">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" value="{{ $worker->users->email }}" class="form-control" placeholder="email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Age:</strong>
                <input type="text" name="age" value="{{ $worker->age }}" class="form-control" placeholder="age">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>City:</strong>
                <input type="text" name="city" value="{{ $worker->users->city }}" class="form-control" placeholder="city">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Country:</strong>
                <input type="text" name="country" value="{{ $worker->users->country }}" class="form-control" placeholder="country">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Street:</strong>
                <input type="text" name="street" value="{{ $worker->users->street }}" class="form-control" placeholder="street">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Bio:</strong>
            <div class="form-group input-group">
                <textarea name="bio" class="form-control" placeholder="Bio" type="text" id="bio">{{ $worker->users->bio }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
      
</form>
    </div>
</body>
</html>
@endsection