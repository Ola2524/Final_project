@extends('layout.worker')
@section('content')
<div class="container w-75  p-3 m-4">
<h2>Service</h2>
    <form method="POST" action="{{route('worker.services.update',['service'=>$service->id])}}" enctype="multipart/form-data">
        <div class="card-header mb-4">create service</div>
        @csrf
        @method("PUT")
        <input type="hidden" name="worker_id" value="{{ auth()->user()->workers->id }}">
        <select class="form-select mb-5" name="service_id" aria-label="Default select example">
            <option value="{{ $service->services->id}}" selected>{{ $service->services->name }}</option>
            @foreach ($services as $s)  
            @if ($s->id != $service->services->id )                
             <option value="{{ $s->id}}">{{ $s->name }}</option>
            @endif      
            @endforeach
        </select>

          <button type="submit" class="btn btn-primary px-3">Edit</button>
      </form>
</div>
</body>
</html>
@endsection
