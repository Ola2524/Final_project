@extends('layout.user')
@section('content')
  <style>
    .btn:hover{
        transform: scale(1.1)
    }
  </style>
<div class="container my-5">

        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-3 ms-3 p-0">Profile 
                            @if (auth()->user()->role == 'worker')
                            <a href="{{ route('profile.edit',[auth()->user()->workers->id]) }}" class="ms-auto fs-4 me-4 text-dark"><i class="fa-solid fa-pen-to-square"></i></a>    
                            @endif
                        </h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-6 col-4">
                        @if ($user == 0)
                      
                            <a href="/chatify/{{$workers->users->id}}" class="btn  float-end text-white" style="margin:0 13px;background-color:#018cdd">Contact me</a>
                            <a href="{{route('order.create',['id'=>$service->id,"worker_id"=>$workers->id])}}" class="btn float-end text-white" style="background-color:#0b5ba4" >Order service</a>
                  
                            @endif
                    </div>
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body profile-card">
                                <center class="mt-4"> 
                                    @if ($user == 1)    
                                        <img src="{{asset('img/'.auth()->user()->img)}}"class="rounded-circle" width="150"/>
                                    @endif
                                    @if ($user == 0)      
                                        <img src="{{asset('img/'.$workers->users->img)}}"class="rounded-circle" width="150"/>
                                    @endif

                                        
                                        @if ($user == 0)
                                            <h4 class="card-title mt-2">{{ $workers->users->name }}</h4>                                            
                                        @endif

                                        @if ($user == 1)
                                            <h4 class="card-title mt-2">{{ auth()->user()->name }}</h4>                                            
                                        @endif
                                  
 
                                    
                                    @if ($user == 0)
                                    <h6 class="card-subtitle">
                                        {{$service->name}}

                                    </h6>
                                    @endif
                                </center>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-body profile-card">
                                <div class="mt-4 mx-5"> 
                                    <div class="row">
                                        @if (auth()->user()->role == 'worker' || $user == 0)
                                            
                                        <div class="col-md-6">
                                            <h6>Jobs</h6>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <h6>( {{ $job_count }} )</h6>
                                        </div>
                                        @endif
                                    </div>

                                    @if ($user == 0)
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6>Points</h6>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <h6>( {{ $workers->users->points }} )</h6>
                                        </div>
                                    </div>
                                    @endif

                                    @if ($user == 1)
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6>Points</h6>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <h6>( {{ auth()->user()->points }} )</h6>
                                        </div>
                                    </div>
                                    @endif
                                    

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6>Last seen</h6>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <h6>Today</h6>
                                        </div>
                                    </div>
                                    @if ($user==0 && $workers->verify == 1)                                        
                                    <div class="row mt-3">
                                        <div class="col-md-6 mt-3 text-end">
                                            <h6 class="fs-4">Verified</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6><img src="{{asset('img/verified.png')}}" alt="" width="60px"></h6>
                                        </div>
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        {{-- @if (auth()->user()->role == 'worker')
                            
                        <div class="card mt-4">
                            <div class="card-body profile-card">
                                <div class="mt-4 mx-5"> 
                                    <h5 class="mb-3">Services</h5>
                                    <hr>
                                    @foreach ($workers as $worker) 

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6>{{ $worker->services->name }}</h6>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <h6>( ${{ $worker->fixed_price }} )</h6>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif --}}

                        @if ($user == 0)
                        <div class="card mt-4">
                            <div class="card-body profile-card">
                                <div class="mt-4 mx-5"> 
                                    <h5 class="mb-3">Service price</h5>
                                    <hr>

                                    <div class="mt-3 d-flex">
                                        <div class="col-md-4">
                                            <h6>
                                                {{$wservices->services->name}}
                                            </h6>
                                        </div>
                                        <div class="w-50">
                                            <span class="review-stars pb-4" style="color: #fd4;">
                                                <!-- ////////////// STAR RATE CHECKER ////////////// -->
                                                    @if($wservices->rate <= 0.00)
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    @elseif($wservices->rate === 1.00)
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa-regular fa-star"></i>
                                                        <i class="fa-regular fa-star"></i>
                                                        <i class="fa-regular fa-star"></i>
                                                        <i class="fa-regular fa-star"></i>
                                                    @elseif($wservices->rate === 2.00)
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa-regular fa-star"></i>
                                                        <i class="fa-regular fa-star"></i>
                                                        <i class="fa-regular fa-star"></i>
                                                    @elseif($wservices->rate === 3.00)
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa-regular fa-star"></i>
                                                        <i class="fa-regular fa-star"></i>
                                                    @elseif($wservices->rate === 4.00)
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa-regular fa-star"></i>
                                                    @elseif($wservices->rate >= 5.00)
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    @endif
                                                    <!-- ///////////////////////////////////////////// -->
                                                </span>
                                        </div>
                                        <div class="text-end">
                                      
                                            <h6>( ${{ $wservices->fixed_price }} )</h6>
                                        </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        @endif

                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h4>Bio</h4>
                                @if ($user == 0)
                                    {{ $workers->users->bio }}                                    
                                @endif

                                @if ($user == 1)
                                    {{ auth()->user()->bio }}
                                @endif
                            </div>
                        </div>
                        @if ($user == 0)
                            
                       
                        <div class="card">
                        <div class="mx-3 mb-2">
                        <h4 class="pt-3">Reviews</h4>

                        @foreach ($reviews as $review)

                        <div class="card my-2">
                            <div class="card-body">
                                <img src="{{asset('img/'.$review->users->img)}}"class="rounded-circle" width="50"/>
                                <h4>{{$review->users->name}}</h4>
                                <span class="review-stars mb-4" style="color: #fd4;">
                                    <!-- ////////////// STAR RATE CHECKER ////////////// -->
                                        @if($review->rate <= 0.00)
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        @elseif($review->rate === 1.00)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                        @elseif($review->rate === 2.00)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                        @elseif($review->rate === 3.00)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                        @elseif($review->rate === 4.00)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa-regular fa-star"></i>
                                        @elseif($review->rate >= 5.00)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        @endif
                                        <!-- ///////////////////////////////////////////// -->
                                    </span>
                                    
                                                             
                                <p class="mt-2">{{$review->review}}</p>                                
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div>
                    @endif
                    </div>
                    <!-- Column -->
                </div>
                
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
</div>
    @endsection
