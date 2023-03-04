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


    <section class="services">
        <div class="container">
            <header class="services__header text-center">
                <h2>What we do?
                    Why will you choces this</h2>
                <p>Our services
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo nesciunt quae quis magnam dolores
                    excepturi, laudantium maxime, molestias fugiat accusantium error adipisci voluptas similique
                    officiis! Alias nihil provident labore veniam?
                </p>
            </header>
        </section>

                
<!-- start card services -->
<div class="container">

@foreach ($user as $users )
{{-- @dd($users) --}}
    <div class="column">
      <div class="card">
        <div class="center">
            <img src="" style="width:150px;height:auto;padding-top:10px; border-radius: 100px;">
        </div>
            
        <h1>{{$users->name}}</h1>
        <p class="title">{{$users->service_name}}</p>
        <p class="title">${{$users->fixed_price}}</p>
          {{-- <p></p> --}}
       
{{-- <span class="review-stars mb-5" style="color: yellow;">
    <!-- ////////////// STAR RATE CHECKER ////////////// -->
        @if($users->rate <= 0.00)
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
        @elseif($users->rate === 1.00)
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
        @elseif($users->rate === 2.00)
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
        @elseif($users->rate === 3.00)
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
        @elseif($users->rate === 4.00)
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
        @elseif($users->rate >= 5.00)
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
        @endif
        <!-- ///////////////////////////////////////////// -->
    </span> --}}

        <p><a href="{{route('profile.show',['id'=>$users->worker_id])}}" class="btn btn-outline-primary">Show More </a></p>

      </div>
    </div>
    @endforeach
</div>
    {{-- <div class="column">
      <div class="card">
        <div class="center">
            <img src="https://th.bing.com/th/id/OIP.OOh0PWJjoab-C0l3WQs4ugHaLL?pid=ImgDet&rs=1" style="width:150px;height:150px ;padding-top:10px; border-radius: 100px;">
        </div>
        <h1>Abo Ahmed</h1>
        <p class="title">Aswan</p>
        <p>Lorem ipsum dolor sit amet consect</p>
        <div>
            <!-- <i class="fa fa-star mb-5"></i> -->
            <!-- <i class="fa fa-star mb-5"></i> -->
            <i class="fa fa-star mb-5"></i>
            <i class="fa fa-star mb-5"></i>
        </div>
        <p><button><a href="profile.html">Contact </a></button></p>

      </div>
    </div>
  
    <div class="column">
      <div class="card ">
        <div class="center">
        <img src="./img/male.jpg" style="width:150px;height:auto;padding-top:10px;">
    </div>
        <h1>Moustfa </h1>
        <p class="title">Aswan</p>
        <p>Lorem ipsum dolor sit amet consect</p>
        <div>
            <i class="fa fa-star mb-5"></i>
            <i class="fa fa-star mb-5"></i>
            <i class="fa fa-star mb-5"></i>
            <!-- <i class="fa fa-star mb-5"></i> -->
        </div>
        <p><button><a href="#">Contact </a></button></p>

      </div>
    </div>
  
    <div class="column">
        <div class="card">
            <div class="center">
                <img src="./img/male.jpg" style="width:150px;height:auto;padding-top:10px;">
            </div>
          <h1>nona </h1>
          <p class="title">Aswan</p>
          <p>Lorem ipsum dolor sit amet consect</p>
          <div>
            <i class="fa fa-star mb-5"></i>
            <i class="fa fa-star mb-5"></i>
            <i class="fa fa-star mb-5"></i>
            <i class="fa fa-star mb-5"></i>
        </div>
          <p><button><a href="#">Contact </a></button></p>

        </div>
      </div>

      <div class="column">
        <div class="card">
            <div class="center">
                <img src="./img/male.jpg" style="width:150px;height:auto;padding-top:10px;">
            </div>
          <h1>nany</h1>
          <p class="title">Aswan</p>
          <p>Lorem ipsum dolor sit amet consect</p>
          <div>
            <i class="fa fa-star mb-5"></i>
            <i class="fa fa-star mb-5"></i>
            <i class="fa fa-star mb-5"></i>
            <i class="fa fa-star mb-5"></i>
        </div>
          <p><button><a href="#">Contact </a></button></p>

        </div>
      </div>
      <div class="column">
        <div class="card">
            <div class="center">
                <img src="./img/male.jpg" style="width:150px;height:auto;padding-top:10px;">
            </div>
          <h1>Lolo</h1>
          <p class="title">Aswan</p>
          <p>Lorem ipsum dolor sit amet consect</p>
          <div>
            <i class="fa fa-star mb-5"></i>
            <i class="fa fa-star mb-5"></i>
            <i class="fa fa-star mb-5"></i>
            <i class="fa fa-star mb-5"></i>
        </div>
          <p><button><a href="#">Contact </a></button></p>
        </div>
      </div>
  </div>
</div> --}}


<!-- end card services -->

    <!-- Footer Start -->
    <!-- <div class="fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Our Website</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, cairo, Egypt</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-3">
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">

                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="#">Home</a>
                    <a class="btn btn-link" href="#">About Us</a>
                    <a class="btn btn-link" href="#">Contact Us</a>
                    <a class="btn btn-link" href="#">Services</a>

                </div>

                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Newsletter</h5>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative w-100">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Your email">
                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Footer End -->

    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a> -->

</body>

</html>
@endsection