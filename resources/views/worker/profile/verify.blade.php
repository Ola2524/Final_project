@extends('layout.worker')
@section('content')
    
<div class="container w-75  p-3 m-4">
    <form method="POST" action="{{route('verify.update',auth()->user()->workers->id)}}" enctype="multipart/form-data">
      <div class="card-header">create service</div>
      @csrf
        <div class="mb-4 mt-5">
          <label for="formFile" class="form-label">Criminal Record Certificate</label>
          <input class="form-control" type="file" name="criminal_record_certificate">
        </div>

        <button type="submit" class="btn btn-primary px-3">Verify</button>
    </form>
      </div>
  </body>
  </html>
  @endsection