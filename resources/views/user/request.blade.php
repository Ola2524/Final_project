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
@foreach ($user as $users )
{{-- @dd($users) --}}
    {{-- <div class="column"> --}}
<div class="row">

      <div class="card">
        
        <div class="col-md-2">
            {{-- <div class="center"> --}}
                <img src="img/{{$users->users->img}}" class="img-fluid" style="width:150px;height:auto;padding-top:10px; border-radius: 100px;">
            {{-- </div> --}}
        </div>
           
        <div class="col-md-2"><h1>{{$users->workers->users->name}}</h1></div>
        
        <div class="col-md-2"><p class="title">{{$users->services->name}}</p></div>
        <div class="col-md-2"><p class="title">{{$users->services->fixed_price}}</p></div>
        <div class="col-md-2"><!-- <p>{{$users->status}}</p> --></div>
        @if($users->status == 'Rejected')
        <p class="bg-danger status text-center py-1 ms-5 me-5">{{$users->status}}</p>
        
        @elseif($users->status == 'In progress')
        <p class="bg-warning status text-center py-1 ms-5 me-5">{{$users->status}}</p>

        @elseif($users->status == 'Pending')
        <p class="bg-secondary status text-center py-1 ms-5 me-5">{{$users->status}}</p>

        @elseif($users->status == 'Done')
        <p class="bg-success status text-center py-1 ms-5 me-5">{{$users->status}}</p>
    
        @endif
          {{-- <p></p> --}}
       
          <div class="col-md-2">
            <p><a href="{{route('stripe',['id'=>$users->id])}}" class="btn btn-outline-primary">Pay</a></p>
            <p><a href="/chatify/{{$users->workers->id}}" class="btn btn-outline-primary">Contact</a></p>
        </div>

      </div>
    </div>
    @endforeach
{{-- </div> --}}
</div>
   

@endsection