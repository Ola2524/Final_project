@extends('layout.user')
@section('content')
     <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s"style="background-image: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url('img/waiter.jpg')">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="index.html">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="#"><a href="" class="text-white">About Us</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="img-border">
                        <img class="img-fluid" src="{{asset('img/elder care.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        {{-- <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6> --}}
                        <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                        <h1 class="display-6 mb-4">Why you chose our service ?</h1>
                        <p>We can help you to care about your home with our amazing qualified employees. We are your reliable on-demand cleaning, childeren care, bride preparation, Elder people Care, security, and guests services</p>
                        <p class="mb-4">We provide many services that helping you saving time, money, and effort. We also make the workers verified by their criminal record certificate so you can feeling save. We also offer a discount for users when they pay with our site. For workers, we will not get our discount presentage if the user pay by his points.</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Facts Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                {{-- <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-certificate fa-4x text-primary mb-4"></i>
                        <h5 class="mb-3">Years Experience</h5>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">2</h1>
                    </div>
                </div> --}}
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-users-cog fa-4x text-primary mb-4"></i>
                        <h5 class="mb-3">Team Members</h5>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">{{ $workers_count }}</h1>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-users fa-4x text-primary mb-4"></i>
                        <h5 class="mb-3">Satisfied Clients</h5>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">{{ $users_count }}</h1>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-check fa-4x text-primary mb-4"></i>
                        <h5 class="mb-3">Available Services</h5>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">{{ $service_count }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title bg-white text-center text-primary px-3">Our services</h4>
                {{-- <h1 class="display-6 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1> --}}
            </div>

            <div class="row g-4">
            @foreach ($services as $service)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="service-item d-block rounded text-center h-100 p-4 text-decoration-none" href="">
                        <img class="img-fluid rounded mb-4" style="height:250px;width:100%" src="{{asset('img/'.$service->img)}}" alt="">
                        <h4 class="mb-3 text-dark fw-bold">{{ $service->name }} Service</h4>
                        <p class="mb-0 text-dark" style="font-size: 18px">{{ $service->description }}</p>
                    </a>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <!-- Facts End -->
@endsection