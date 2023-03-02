@extends('layout.worker')
@section('content')
<div class="container w-75  p-3 m-4">
<h2>Service</h2>
    <form method="POST" action="{{route('worker.services.store')}}" enctype="multipart/form-data">
        <div class="card-header mb-4">create service</div>
        @csrf
        <input type="hidden" name="worker_id" value="{{ auth()->user()->workers->id }}">
        <select class="form-select mb-5" name="service_id" aria-label="Default select example">
            @foreach ($services as $service)        
             <option value="{{ $service->id}}">{{ $service->name }}</option>
            @endforeach
        </select>

          <button type="submit" class="btn btn-primary px-3">Add</button>
      </form>
</div>
</body>
</html>
@endsection
