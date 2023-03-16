@extends('layout.user')
@section('content')

<style>
    /* New Card */

  
  
.column
{
    width:25%;
    float:left;
    padding:100px 10px;
}

.row:after{
    content:"";
    display:table;
    clear:both;
}



@media screen and (max-width:600px)
{
    .column
    {
        width:100%;
        display:block;
        margin-bottom: 20px;
    }
}

.card
{
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width:300px;
    margin:auto;
    background-color:white;
    text-align:center;
    border-radius:40px;
    padding-bottom:15px;
}

.title
{
    color:gray;
    font-size:18px;
}

button
{
    border:none;
    padding:8px;
    display: inline-block;
    color:white;
    background-color:rgb(35, 46, 125);
    cursor:pointer;
    width:70%;
    border-radius:20px;
    font-size:18px;
    text-align:center;
}

a{
    text-decoration: none;
    /* font-size:22px; */
    color:rgb(255, 239, 239);
}

a:hover,button:hover{
    opacity: 0.6;
}
/* .card:hover
{
  opacity: 0.8;
  box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);
  width:300px;
  margin:auto;
  background-color:white;
  text-align:center;
  border-radius:40px;
  padding-bottom:15px;
  
} */
i{
    font-size: 22px;
}

/* .center{
  border-radius:100x;
} */

/* #pic{
  border-radius: 100px;
} */
</style>
            <!-- Carousel Start -->

            <div class="container-fluid page-header py-5 mb-5 wow fadeIn text-white" data-wow-delay="0.1s" style="height:60vh;background-image: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url('{{asset('img/'.$service->img)}}')">
                <div class="container text-center py-5">
                    <h1 class="display-4  animated slideInDown mb-3">services</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="{{route('homepage')}}">Home</a></li>
                            <li class="breadcrumb-item text-primary active" aria-current="#"><a class="text-white" href="/our-services/{{$id}}">Services</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            
                                
            {{-- <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> --}}
                
                <!-- Carousel End -->
    <!-- Service Start -->


    <section class="services">
        <div class="container">
            <header class="services__header text-center">
                <div class="text-center mx-auto mb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-center text-primary px-3" style="font-size: 20px;height:100px">{{ $service->name }}</h6>
                    <h1 class="mb-4" style="font-size: 30px">{{ $service->description }}</h1>
                </div>


                {{-- <div class="card mt-3">
                    <div class="card-header">
                        <h4>Price</h4>
                    </div>
                    <div class="card-body">
                        <label class="d-block">
                            <input type="radio" id="high" name="priceSort" wire:model="priceInput" value="high-to-low"/>High to Low
                        </label>
                        <label class="d-block">
                            <input type="radio" id="low" name="priceSort" wire:model="priceInput" value="low-to-high"/>Low to High
                        </label>
                    </div>
                </div> --}}
            </header>
        </section>


         
        {{-- @if (session()->has('success'))
            <div class="alert alert success">
                {{ session()->get('success') }}                
            </div>
        @endif --}}
<!-- start card services -->
<div class="container">
<div class="row" id="Content">
   
@foreach ($user as $worker )
{{-- @dd($users) --}}
    <div class="column">
      <div class="card">
                {{-- <img src="{{asset('img/babysitter.jpg')}}"> --}}
        <div class="center">
            <img src="{{asset('img/'.$worker->users->img)}}" style="width:150px;height:auto;padding-top:10px; border-radius: 100px;">
        </div>
        <h1>{{$worker->users->name}}</h1>
        <p class="title">{{$service->name}}</p>
        <p class="title">${{$worker->fixed_price->fixed_price}}</p>
          {{-- <p></p> --}}
       
<span class="review-stars mb-4" style="color: #fd4;">
    <!-- ////////////// STAR RATE CHECKER ////////////// -->
        @if($worker->fixed_price->rate <= 0.00)
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
        @elseif($worker->fixed_price->rate === 1.00)
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
        @elseif($worker->fixed_price->rate === 2.00)
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
        @elseif($worker->fixed_price->rate === 3.00)
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
        @elseif($worker->fixed_price->rate === 4.00)
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa-regular fa-star"></i>
        @elseif($worker->fixed_price->rate >= 5.00)
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
        @endif
        <!-- ///////////////////////////////////////////// -->
    </span>
    

        <p><a href="{{route('profile.show',['id'=>$worker->id,'service_id'=>$service->id])}}" class="btn text-white" style="background-color: #008dde">Show More</a></p>

      </div>
    </div>
    @endforeach
</div>
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

            @include('sweetalert::alert')
<script>
    $('#high').on('checked',function(){
 
 $value=$(this).val();
   // if($value){
   // $('.alldata').hide();
   // $('.searchdata').show();
   
   // }
   // else{
   //   $('.alldata').show();
   // $('.searchdata').hide();
   // }
 $.ajax({
 type:'get',
 url:'{{URL::to('filter/services/desc')}}',
 data:{'search':$value},
 success:function(data)
 {
   console.log(data);
   $('#Content').html(data)
 }
 });
   })

   $('#low').on('checked',function(){
 
 $value=$(this).val();
   // if($value){
   // $('.alldata').hide();
   // $('.searchdata').show();
   
   // }
   // else{
   //   $('.alldata').show();
   // $('.searchdata').hide();
   // }
 $.ajax({
 type:'get',
 url:'{{URL::to('filter/services/asc')}}',
 data:{'search':$value},
 success:function(data)
 {
   console.log(data);
   $('#Content').html(data)
 }
 });
   })
</script>
@endsection