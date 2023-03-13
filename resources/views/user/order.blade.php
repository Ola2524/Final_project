@extends('layout.user')
@section('content')
<div class="container w-50 p-3 m-4">

    <form method="POST" action="{{ route('order.store') }}">
        @csrf
        <h3 class="mb-5">Order Details</h3>
 
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <input type="hidden" name="worker_id" value="{{ $workers->id }}">
        <input type="hidden" name="service_id" value="{{ $service->id }}">
    
        <input type="hidden" name="status" value="pending">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Service</label><h4>{{ $service->name }}</h4>
            {{-- <select class="form-select" name="service_id" aria-label="Default select example"> --}}
                {{-- <option selected value="{{ $worker_services->services->id }}">{{ $worker_services->services->name }}</option>                     --}}

                {{-- @foreach ($worker_services as $worker_service)
                    <option value="{{ $worker_service->services->id }}">{{ $worker_service->services->name }}</option>                    
                    <input type="hidden" name="worker_id" value="{{ $worker_service->workers->id }}">
                @endforeach --}}
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Target Date</label>
            <input type="date" class="form-control" name="date" id="exampleInputPassword1">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">price</label>
            <input type="number" class="form-control" name="price" id="exampleInputPassword1">
        </div>
        <label for="exampleInputPassword1" class="form-label">Description</label>

        <div class="form-floating mb-3">
            <textarea class="form-control" name="desc" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea">Enter description</label>
        </div>

        <button type="submit" class="btn btn-primary">Order</button>
    </form>
</div>
@endsection