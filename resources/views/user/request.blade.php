@extends('layout.user')
@section('content')


            <!-- Carousel Start -->

            <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="background-image: url('{{asset('img/elder care (1).jpg')}}')">
                <div class="container text-center py-5">
                    <h1 class="display-4  animated slideInDown mb-3">Request</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="{{route('homepage')}}">Home</a></li>
                            <li class="breadcrumb-item text-primary active" aria-current="#"><a class="text-white" href="{{asset('requse')}}t">Requests</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
<!--                                  
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> -->
                
                <!-- Carousel End -->
    <!-- Service Start -->


<!-- start card services -->
<div class="container">
    {{-- @if (empty($user->items))
        <h2 class="text-center" style="padding: 150px 0">You have not order any service yet</h2>
    @endif --}}

@foreach ($user as $users )
{{-- @dd($users) --}}
    {{-- <div class="column"> --}}

      <div class="card mb-4">
        <div class="row align-items-center justify-content-center">
        
        <div class="col-md-3 d-flex flex-column align-items-center justify-content-center">
            {{-- <div class="center"> --}}
                <img src="img/{{$users->workers->users->img}}" class="img-fluid" style="width:150px;height:auto;padding-top:10px; ">
            {{-- </div> --}}
        </div>
           
        <div class="col-md-3 d-flex flex-column align-items-center justify-content-center">
            <h1>{{$users->workers->users->name}}</h1>
            <p class="title">{{$users->services->name}}</p>
        </div>
        
        <div class="col-md-3 fs-3 d-flex flex-column align-items-center justify-content-center"><p class="title">${{$users->price}}</p></div>
        {{-- <div class="col-md-3"><!-- <p>{{$users->status}}</p> --></div> --}}
        @if($users->status == 'Rejected')
        <div class="col-md-3"><p class="bg-danger status text-center py-1 ms-5 me-5">{{$users->status}}</p></div>
       
        @elseif($users->status == 'In progress')
        <div class="col-md-3"><p class="bg-warning status text-center py-1 ms-5 me-5">{{$users->status}}</p></div>

        @elseif($users->status == 'Pending')
        <div class="col-md-3"><p class="bg-secondary status text-center py-1 ms-5 me-5">{{$users->status}}</p></div>

        @elseif($users->status == 'Done')
        <div class="col-md-3"><p class="bg-success status text-center py-1 ms-5 me-5">{{$users->status}}</p></div>
    
        @endif
          {{-- <p></p> --}}
        </div>

        <div class="row justify-content-center mt-3">
            {{-- <div class="col-md-6"> --}}
                @if ($users->status == 'In progress')
                    <a href="{{route('stripe',['id'=>$users->id])}}" class="btn btn-primary py-2 me-3" style="width:15%">Pay</a>                    
                @endif
            {{-- </div>
            <div class="col-md-6"> --}}
                <a href="/chatify/{{$users->workers->users->id}}" class="btn btn-success py-2" style="width:15%">Contact</a>
            {{-- </div> --}}
        </div>

      </div>
    @endforeach
</div>
   

@endsection