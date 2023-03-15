
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>project</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
   

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="{{asset('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap')}}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer')}}" />

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
    <link
    rel="stylesheet"
    href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css')}}"
  />
  

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css')}}" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     {{-- search --}}
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border position-relative text-primary" style="width: 6rem; height: 6rem;" role="status"></div>
        <i class="fa-solid fa-house fa-2x text-primary position-absolute top-50 start-50 translate-middle"></i>
    </div>
    <!-- Spinner End -->
<div style="height: 20px; background-color:#008dde" class="position-relative z-1 sticky-top wow fadeIn" data-wow-delay="0.1s"></div>
    <!-- Navbar Start -->
    <nav  class="z-5 navbar navbar-expand-lg navbar-dark bg-white sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s" style="background-color: rgb(5, 59, 130)">
        <div>
            <div style="height: 20px; background-color:#008dde" class="position-relative z-1"></div>
            <img src="{{asset('img/logo.png')}}" width="80px" style="top:-15px;left:35px" class="z-1 position-absolute" alt="">
            {{-- <h1 class="fw-bold text-white m-0" style="font-family:Petit Formal Script">Home Care</h1> --}}
        </div>
        <div class="ms-auto">
            <a href="#" class="navbar-brand ms-3 d-lg-none">MENU</a>
            <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav me-auto p-3 p-lg-0">
                    <a href="/" class="nav-item nav-link active text-dark">Home</a>
                    <a href="{{ route('about') }}" class="nav-item nav-link text-dark">About Us</a>
                    @auth
                    <div class="nav-item dropdown">
                        <a href="{{ route('ourservices') }}" class=" text-dark nav-link dropdown-toggle" data-bs-toggle="dropdown">Services</a>
                        <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                            @foreach ($services as $service)
                                <a href="{{ route("services.show",['id'=>$service->id]) }}" class="dropdown-item">{{ $service->name }}</a>   
                            @endforeach
                    </div>
                </div>

                            @else

                        <a href="{{ route('login') }}" class="nav-item nav-link text-dark">Services</a>
                            
                            {{-- <a href="#" class="dropdown-item">Cleaning Services</a>
                            <a href="#" class="dropdown-item">Guest Services</a>
                            <a href="#" class="dropdown-item">Accompaniment and residency Services</a>
                            <a href="#" class="dropdown-item">Labor Supply Services</a>
                            <a href="#" class="dropdown-item">Bride Services</a> --}}
                        @endauth

                    <a href="{{ route('contact') }}" class="nav-item nav-link text-dark">Contact Us</a>
                </div>
                
                    @auth                        
                    <div class="d-flex align-items-center">
                        <div class="btn-group">
                            <button type="button" class="bg-light text-dark btn btn-secondary dropdown-toggle d-flex justify-content-between align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                                <div><img src="{{asset('img/'.auth()->user()->img)}}"class="rounded-circle" width="50"/>                                </div>
                                <span class="ms-2 me-1">{{ auth()->user()->name }}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @if (auth()->user()->role == 'worker')
                                    <li><a href="{{ route('dashbordWorker') }}" class="dropdown-item" type="button">Dashboard</a></li>
                                @endif

                                @if (auth()->user()->role == 'admin')
                                <li><a href="{{ route('admin') }}" class="dropdown-item" type="button">Dashboard</a></li>
                                @endif
                                @if (auth()->user()->role == 'user')
                                <li><a href="{{ route('user.profile') }}" class="dropdown-item" type="button">Profile</a></li>                                
                                 @endif
                                {{-- @if (auth()->user()->role == 'user' || auth()->user()->role == 'worker') --}}
                                    <li><a href="{{ route('requset') }}" class="dropdown-item" type="button">Requests</a></li>                                
                                {{-- @endif --}}
                              <li><form action="{{ route("logout") }}" method="POST">
                                @csrf
                                <input type="submit" class="dropdown-item" value="Logout">
                              </form></li>
                            </ul>
                          </div>
                    </div>
                    @else
                    <a href="{{ route('login') }}" style="background-color: #008dde" class="btn btn-sm btn-light rounded-pill py-2 px-4 d-none d-lg-block me-3 text-white">Login</a>
                    <a href="{{ route('registeration') }}" style="background-color: #008dde" class="btn btn-sm btn-light rounded-pill py-2 px-4 d-none d-lg-block text-white">Register</a>

                    @endauth

                {{-- </li> --}}
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    @yield('content')
<!-- Footer Start -->
<div class="container-fluid bg-dark text-body footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <h5 class="text-light mb-4">Address</h5>
                <p class="mb-2 text-light"><i class="fa fa-phone-alt me-3 text-light"></i>+011 111 11111</p>
                <p class="mb-2 text-light"><i class="fa fa-envelope me-3 text-light"></i>HomeCare@yahoo.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square btn-outline-secondary rounded-circle ms-5" href="https://freewebsitecode.com/"><i class="fab fa-twitter"></i></a>
                    {{-- <a class="btn btn-square btn-outline-secondary rounded-circle me-1" href="https://youtube.com/freewebsitecode/"><i class="fab fa-youtube"></i></a> --}}
                    {{-- <a class="btn btn-square btn-outline-secondary rounded-circle me-0" href="https://freewebsitecode.com/"><i class="fab fa-linkedin-in"></i></a> --}}
                    <a class="btn btn-square btn-outline-secondary rounded-circle ms-3" href="https://facebook.com/freewebsitecode/"><i class="fab fa-facebook-f"></i></a>

                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <h5 class="text-light mb-4">Quick Links</h5>
                <a class="btn btn-link" href="{{ route('about') }}">About Us</a>
                <a class="btn btn-link" href="{{ route('contact') }}">Contact Us</a>
                {{-- <a class="btn btn-link" href="">Our Services</a> --}}
            </div>
            <div class="col-lg-4 col-md-6">
                <h5 class="text-light mb-4">Services</h5>
                <div class="row g-2">
                    @auth                        
                    @foreach ($services as $service)
                    <div class="col-4">
                        <a href="/our-services/{{$service->id}}"><img class="img-fluid rounded" src="{{asset('img/'.$service->img)}}" alt="Image"></a>
                    </div>                        
                    @endforeach
                    @else
                    @foreach ($services as $service)
                    <div class="col-4">
                        <a href="{{ route('login') }}"><img class="img-fluid rounded" src="{{asset('img/'.$service->img)}}" alt="Image"></a>
                    </div>                        
                    @endforeach
                    @endauth

                    {{-- <div class="col-4">
                        <img class="img-fluid rounded" src="{{asset('img/cleaning (2).jpg')}}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded" src="{{asset('img/elder care (2).jpg')}}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded" src="{{('img/Bride Preparing.jpeg')}}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded" src="{{asset('img/waiter (1).jpg')}}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded" src="{{asset('img/security.jpg')}}" alt="Image">
                    </div> --}}
                </div>
            </div>
            {{-- <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Newsletter</h5>
                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control bg-transparent border-secondary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                </div>
            </div> --}}
        </div>
    </div>
    
</div>

<!-- Footer End -->

        <!-- JavaScript Libraries -->
        <script src="{{asset('https://code.jquery.com/jquery-3.4.1.min.js')}}"></script>
        <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('lib/wow/wow.min.js')}}"></script>
        <script src="{{asset('lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
        <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    
        <!-- Template Javascript -->
        <script src="{{asset('js/main.js')}}"></script>
        
    </body>
    
    </html>