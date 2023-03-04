@extends('layout.user')
@section('content')
<div class="container mt-5">
    <div class="card border-success border-start border-5 mb-3">
    <div class="card-body">
        <h2 class="text-success text-center">Your Order Have Been Done Successfully</h2>
    </div>
    </div>
    <div class="text-center">
        <a href="{{route('homepage')}}" class="btn btn-outline-success">Back</a>
    </div>
</div>
@endsection