@extends('layout.worker')
@section('content')
<section class="main">
    <div class="container">
      <div class="card bg-light">
        <h5 class="card-header">Order details: {{ $job->users->name }}</h5>
        <div class="card-body">
          {{-- <h5 class="card-title">{{ $job->users->name }}</h5> --}}
          <p>User name: {{ $job->users->name }}</p>
          <p>Price: ${{ $job->price }}</p>
          <p>Service: {{ $job->services->name }}</p>
          <p>Date: {{ $job->date }}</p><br>
          <h6>Description: </h6>
          <p class="card-text">{{ $job->desc }}</p>
          <a href="{{route('req')}}" class="btn btn-primary">back</a>
        </div>
      </div>
    </div>
</section>
@endsection