@extends('layout.user')
@section('content')
     <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="index.html">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="#">About Us</li>
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
                        <img class="img-fluid" src="img/waiter.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                        <h1 class="display-6 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad veritatis inventore iure ipsam laboriosam nemo, aspernatur totam ducimus adipisci, mollitia hic quod, officia aliquam. Necessitatibus quaerat dolore unde quos repellendus?</p>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi iure hic fugiat aperiam, minima delectus. Odit laboriosam similique adipisci ratione facere corrupti veniam aliquam magni, excepturi placeat! Iusto, quod cum!</p>
                        
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="">Read More</a>
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
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-certificate fa-4x text-primary mb-4"></i>
                        <h5 class="mb-3">Years Experience</h5>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">1234</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-users-cog fa-4x text-primary mb-4"></i>
                        <h5 class="mb-3">Team Members</h5>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">1234</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-users fa-4x text-primary mb-4"></i>
                        <h5 class="mb-3">Satisfied Clients</h5>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">1234</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-check fa-4x text-primary mb-4"></i>
                        <h5 class="mb-3">Available Services</h5>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">6</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-body footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Address</h5>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-1" href="https://freewebsitecode.com/"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-1" href="https://facebook.com/freewebsitecode/"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-1" href="https://youtube.com/freewebsitecode/"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-0" href="https://freewebsitecode.com/"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Gallery</h5>
                    <div class="row g-2">
                        <div class="col-4">
                            <img class="img-fluid rounded" src="img/babysitter (2).jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="img/cleaning (2).jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="img/elder care (2).jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="img/Bride Preparing.jpeg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="img/waiter (1).jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="img/security.jpg" alt="Image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Newsletter</h5>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control bg-transparent border-secondary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- Footer End -->
@endsection