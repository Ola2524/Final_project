@extends('layout.admin')
@section('content')
<div class="container w-75  p-3 m-5">

  <form method="POST" action="{{route('services.update',['services'=>$services->id])}}" enctype="multipart/form-data">
    <div class="card-header">Edit service</div>
    @csrf
    @method("PUT")
    <div class="mb-3 mt-5">
        <label for="exampleFormControlInput1" class="form-label">name</label>
        <input type="text" class="form-control" name="name" placeholder="your name"value="{{$services->name}}">
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">Img</label>
        <input class="form-control" type="file" name="img"value="Storage/img/{{$services->img}}">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" name="description" rows="3">{{$services->description}}</textarea>
      </div>

      <button type="submit" class="btn btn-primary px-3">Edit</button>
  </form>
    </div>
</body>
</html>
@endsection