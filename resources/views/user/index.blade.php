@extends('layout.user')
@section('content')    
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php $i=0 ?>
                @foreach ($services as $service)
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="<?php echo $i?>" class="active" aria-current="true" aria-label="Slide 1">
                    <img class="img-fluid" src="{{asset('img/'.$service->img)}}" alt="Image">
                </button>
                @endforeach
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img style="width: 100%;height:100vh" src="img/Cleaning.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-3 text-white mb-0 animated zoomIn mb-3">Home care.</h1>

                            <h4 class="text-white text-uppercase mb-4 animated zoomIn">There is no place like home & HOME CARE coregivers help you remain there.</h4>
                        </div>
                    </div>
                </div>
                @foreach ($services as $service)                    
                <div class="carousel-item">
                    <img class="w-100" style="width: 100%;height:100vh" src="{{asset('img/'.$service->img)}}" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-4 animated zoomIn">{{ $service->description }}</h4>
                            {{-- <h1 class="display-1 text-white mb-0 animated zoomIn">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1> --}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title bg-white text-center text-primary px-3">Our services</h4>
                {{-- <h1 class="display-6 mb-4">.</h1> --}}
            </div>

            <div class="row g-4">
            @foreach ($services as $service)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="service-item d-block rounded text-center h-100 p-4 text-decoration-none" href="our-services/{{$service->id}}">
                        <img class="img-fluid rounded mb-4" style="height:250px;width:100%" src="{{asset('img/'.$service->img)}}" alt="">
                        <h4 class="mb-0 text-dark fw-bold">{{ $service->name }} Service</h4>
                    </a>
                </div>
            @endforeach
    
                {{-- <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="">
                        <img class="img-fluid rounded mb-4" src="images/cleaning (2).jpg" alt="">
                        <h4 class="mb-0">Cleaning Services</h4>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="">
                        <img class="img-fluid rounded mb-4" src="images/waiter (1).jpg" alt="">
                        <h4 class="mb-0">Waiter Services</h4>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="">
                        <img class="img-fluid rounded mb-4" src="images/Bride Preparing.jpeg" alt="">
                        <h4 class="mb-0">Waiter Services</h4>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="">
                        <img class="img-fluid rounded mb-4" src="images/elder care (2).jpg" alt="">
                        <h4 class="mb-0">Waiter Services</h4>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="">
                        <img class="img-fluid rounded mb-4" src="images/security.jpg" alt="">
                        <h4 class="mb-0">Waiter Services</h4>
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Service End -->

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
                        <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                        <h1 class="display-6 mb-4">Why you chose our service ?</h1>
                        <p>We can help you to care about your home with our amazing qualified employees. We are your reliable on-demand cleaning, childeren care, bride preparation, Elder people Care, security, and guests services</p>
                        <p class="mb-4">We provide many services that helping you saving time, money, and effort. We also make the workers verified by their criminal record certificate so you can feeling save. We also offer a discount for users when they pay with our site. For workers, we will not get our discount presentage if the user pay by his points.</p>
                        
                        <a class="btn rounded-pill py-3 px-5 text-white" style="background-color: #008dde" href="{{ route('about') }}">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="display-6 mb-4">What Our Clients Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s" >
                @foreach ($jobs as $job)   
                @if($job->review!=Null)

                <div class="testimonial-item bg-light rounded p-4" >
                    <div class="d-flex align-items-center mb-4" >
                        <img class="flex-shrink-0 rounded-circle border p-1" src="{{asset('img/'.$job->users->img)}}" alt="">
                        <div class="ms-4">                      
                            <h5 class="mb-1">{{$job->users->name}}</h5>
                            <span class="review-stars mb-5" style="color: yellow;">
                                <!-- ////////////// STAR RATE CHECKER ////////////// -->
                                    @if($job->rate <= 0.00)
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                    @elseif($job->rate === 1.00)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                    @elseif($job->rate === 2.00)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                    @elseif($job->rate === 3.00)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                    @elseif($job->rate === 4.00)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                    @elseif($job->rate >= 5.00)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    @endif
                                    <!-- ///////////////////////////////////////////// -->
                                </span>
                            {{-- <span class="review-stars mb-5" style="color: yellow;"><i class="fa-solid fa-star" ></i></span>
                            <span class="review-stars mb-5" style="color: yellow;"><i class="fa-solid fa-star"></i></span>
                            <span class="review-stars mb-5" style="color: yellow;"><i class="fa-solid fa-star"></i></span>
                            <span class="review-stars mb-5" style="color: yellow;"><i class="fa-solid fa-star"></i></span> --}}
                        </div>
                    </div>
                    <p class="mb-0">{{$job->review}}</p>
                </div>
                @endif
                @endforeach

                {{-- <div class="testimonial-item bg-light rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-2.jpg" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Client Name</h5>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                    </div>
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                </div>
                <div class="testimonial-item bg-light rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-3.jpg" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Client Name</h5>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                    </div>
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                </div>
                <div class="testimonial-item bg-light rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-4.jpg" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Client Name</h5>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                    </div>
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
    @include('sweetalert::alert')


    


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    @endsection
