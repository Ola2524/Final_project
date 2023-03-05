@extends('layout.user')
@section('content')
    
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
                            <a href="" class="btn btn-outline-success float-end" style="margin:0 13px">Contact me</a>
                            <a href="{{route('order.create',['id'=>$workers->id])}}" class="btn btn-outline-primary float-end">Order service</a>
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
                                <center class="mt-4"> <img src="../assets/images/users/5.jpg"
                                        class="rounded-circle" width="150" />
                                        @if ($user == 0)
                                            <h4 class="card-title mt-2">{{ $workers->workers->users->name }}</h4>                                            
                                        @endif

                                        @if ($user == 1)
                                            <h4 class="card-title mt-2">{{ auth()->user()->name }}</h4>                                            
                                        @endif
                                    @if (auth()->user()->role == 'worker' && auth()->user()->role != 'user')
                                    <?php $i = 0 ?>
                                    <h6 class="card-subtitle">
                                    @foreach ($workers as $worker)
                                        {{ $worker->services->name }}    
                                        <?php  
                                        if($i < count($workers)-1){
                                            echo '/';
                                        }
                                        $i++;
                                        ?>
                                    @endforeach
                                    </h6>  
                                    @endif
                                    
                                    @if ($user == 0)
                                    <h6 class="card-subtitle">{{$workers->services->name}}</h6>
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

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6>Points</h6>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <h6>( {{ auth()->user()->points }} )</h6>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6>Last seen</h6>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <h6>Today</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (auth()->user()->role == 'worker')
                            
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
                        @endif

                        @if ($user == 0)
                        <div class="card mt-4">
                            <div class="card-body profile-card">
                                <div class="mt-4 mx-5"> 
                                    <h5 class="mb-3">Service price</h5>
                                    <hr>

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6>{{ $workers->services->name }}</h6>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <h6>( ${{ $workers->fixed_price }} )</h6>
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
                        <div class="card">
                            <div class="card-body">
                                <h4>Bio</h4>
                                @if ($user == 0)
                                    {{ $workers->workers->users->bio }}                                    
                                @endif

                                @if ($user == 1)
                                    {{ auth()->user()->bio }}
                                @endif
                            </div>
                        </div>
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
