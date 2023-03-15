@extends('layout.user')
@section('content')    
    <!-- Contact Start -->
    
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="background-position:center;height:50vh;background-image: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url('{{asset('img/establish-a-company-in-Egypt.jpg')}}')">
        <div class="container text-center py-5">
            <h1 class="display-4  animated slideInDown mb-3 text-white">Contact Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{route('homepage')}}">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="#"><a class="text-white" href="{{asset('contact')}}">Contact</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Contact Us</h6>
                <h1 class="display-6 mb-4">Please Feel Free To Contact Us</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="img-border">
                        <img class="img-fluid" src="{{asset('img/carousel-1.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
            <form method="POST" action="{{ route('contact_us') }}" id="contactUSForm">
                @csrf
                @if(session('message'))
                        <div class="alert alert-success text-center"> 
                            {{ session('message') }}                   
                        </div>
                @endif
                        <div class="row g-3">
                            <input type="hidden" class="form-control" id="name" name="user_id" placeholder="Your Name" value="{{ auth()->user()->id }}">

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}">
                                    <label for="name">Your Name</label>
                                    @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                    @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                    @if ($errors->has('subject'))
                                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 200px">{{ old('message') }}</textarea>
                                    <label for="message">Message</label>
                                    @if ($errors->has('message'))
                                            <span class="text-danger">{{ $errors->first('message') }}</span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn rounded-pill py-3 px-5 text-white" style="background-color: #018cdd" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Contact End -->

    @include('sweetalert::alert')

    <!-- Google Map Start -->
    {{-- <div class="container-xxl pt-5 px-0 wow fadeIn" data-wow-delay="0.1s">
        <iframe class="w-100 mb-n2" style="height: 450px;"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
            frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div> --}}
    <!-- Google Map End -->
@endsection