@extends('layout.user')
@section('content')


            <!-- Carousel Start -->

            <div class="container-fluid px-0 mb-5">
                <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img style="height: 450px" class="w-100 " src="img/shutterstock_240339163-696x464.jpg"
                                alt="Image">
                            <div class="carousel-caption">
                                <!-- <div class="container"> -->
                                    <!-- <div class="row justify-content-center">
                                        <div class="col-lg-10 text-start"> -->
                                            <!-- <p class="fs-5 fw-medium text-dark text-uppercase animated slideInRight">Home Helpers</p> -->

                                        </div>
                                    </div>
                                </div>
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
    @if (empty($user->items))
        <h2 class="text-center" style="padding: 150px 0">You have not order any service yet</h2>
    @endif

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
                <a href="/chatify/{{$users->id}}" class="btn btn-success py-2" style="width:15%">Contact</a>
            {{-- </div> --}}
        </div>

      </div>
    @endforeach
</div>
   

@endsection