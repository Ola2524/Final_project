@extends('layout.worker')
@section('content')
<div class="container w-75  p-3 m-4">
    <form method="POST" action="{{route('profile.update',auth()->user()->workers->id)}}" enctype="multipart/form-data">
      <div class="card-header">Edit profile</div>
      @csrf
        <div class="mb-4 mt-5">
          <label for="formFile" class="form-label">Img</label>
          <input class="form-control" type="file" name="img">
        </div>

        <div class="mb-4 mt-5">
            <label for="formFile" class="form-label">Bio</label>
            <textarea name="bio" class="form-control" id="" cols="30" rows="10">{{ auth()->user()->workers->bio }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary px-3">Edit</button>
    </form>
      </div>
  </body>
  </html>
@endsection