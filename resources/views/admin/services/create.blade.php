@extends('layout.admin')
@section('content')
<div class="container w-75  p-3 m-4">

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
  <form method="POST" action="{{route('services.store')}}" enctype="multipart/form-data">

    <div class="card-header ">create service</div>
    {{-- <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
    <h6 class="section-title bg-white text-center text-primary px-3">create service</h6>
    </div> --}}

    @csrf
    <div class="mb-3 mt-5">
        <label for="exampleFormControlInput1" class="form-label">name</label>
        <input type="text" class="form-control" name="name" placeholder="your name ">
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">Img</label>
        <input class="form-control" type="file" name="img">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
      </div>

      <button type="submit" class="btn btn-primary px-3" >Add</button>
  </form>
    </div>
</body>
</html>
@endsection