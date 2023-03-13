@extends('layout.user')
@section('content')

<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="background-image: url('{{asset('img/elder care (1).jpg')}}')">
    <div class="container text-center py-5">
        <h1 class="display-4  animated slideInDown mb-3">Order Details</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{route('homepage')}}">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="#"><a class="text-white" href="">Order Details</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="w-100 p-3 m-4 d-flex justify-content-center align-items-center">
    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="img-border">
            <img class="img-fluid" src="{{asset('img/babysitter.jpg')}}" alt="">
        </div>
    </div>

    <form method="POST" action="{{ route('order.store') }}">
        @csrf
        @if(session('message'))
        <div class="alert alert-success text-center"> 
            {{ session('message') }}                   
        </div>
        @endif
        <div class="row justify-content-center align-items-center mx-5 ">
             
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <input type="hidden" name="worker_id" value="{{ $workers->id }}">
        <input type="hidden" name="service_id" value="{{ $service->id }}">
    
        <input type="hidden" name="status" value="pending">
        <div class="mb-3">
            <div class="d-flex align-items-center"><label for="exampleInputPassword1" class="form-label me-2">Service: </label><h5>{{ $service->name }}</h5></div>
            {{-- <select class="form-select" name="service_id" aria-label="Default select example"> --}}
                {{-- <option selected value="{{ $worker_services->services->id }}">{{ $worker_services->services->name }}</option>                     --}}

                {{-- @foreach ($worker_services as $worker_service)
                    <option value="{{ $worker_service->services->id }}">{{ $worker_service->services->name }}</option>                    
                    <input type="hidden" name="worker_id" value="{{ $worker_service->workers->id }}">
                @endforeach --}}
            {{-- </select> --}}
            
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Target Date</label>
            <input type="date" class="form-control" name="date" id="exampleInputPassword1">
        </div>
        @if ($errors->has('date'))
        <span class="text-danger mb-3">{{ $errors->first('date') }}</span>
        @endif
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">price</label>
            <input type="number" class="form-control" name="price" id="exampleInputPassword1">
        </div>
        @if ($errors->has('price'))
        <span class="text-danger mb-3">{{ $errors->first('price') }}</span>
        @endif
        <label for="exampleInputPassword1" class="form-label">Description</label>

        <div class="form-floating mb-3">
            <textarea class="form-control" name="desc" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
        </div>
        @if ($errors->has('desc'))
        <span class="text-danger mb-3">{{ $errors->first('desc') }}</span>
        @endif
        <div class="col-12 text-center">
        <button type="submit" class="btn rounded-pill py-3 px-5 text-white" style="background-color:#0b5ba4">Order</button>
        </div>
    </div>
    </form>
</div>
@endsection