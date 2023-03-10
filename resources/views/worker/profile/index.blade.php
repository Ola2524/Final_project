@extends('layout.worker')
@section('content')
<div class="container-fluid mt-5">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="d-flex">
    <h3 class="mb-4">Profile</h3>
    <a href="{{ route('profile.edit',[auth()->user()->workers->id]) }}" class="ms-auto fs-4 me-4 text-dark"><i class="fa-solid fa-pen-to-square"></i></a>
    </div>
        <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body profile-card">
                    <center class="mt-4"> 
                        {{-- <img src="../assets/images/users/5.jpg" class="rounded-circle" width="150" /> --}}
                        <i class="fa-solid fa-user" style="font-size: 50px"></i>
                        {{-- <img src="Storage/img/{{auth()->user()->img}}" alt=""> --}}
                        <h4 class="card-title mt-2">{{ auth()->user()->name }}</h4>
                        <h6 class="card-subtitle">
                            <?php $i = 0 ?>
                            @foreach ($services as $service)
                                {{ $service->services->name }} 
                                <?php  
                                    if($i < count($services)-1){
                                        echo '/';
                                    }
                                    $i++;
                                ?>
                            @endforeach
                    </h6>                  
                    </center>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body profile-card">
                    <div class="mt-4 mx-5"> 
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Jobs</h6>
                            </div>
                            <div class="col-md-6 text-end">
                                <h6>( {{ $job_count }} )</h6>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <h6>Points</h6>
                            </div>
                            <div class="col-md-6 text-end">
                                <h6>( {{auth()->user()->workers->points}} )</h6>
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
                        @if ($verified == 0)
                        <div class="row mt-3">
                            <a href="{{ route('verify') }}" class="btn btn-primary">Verify Identity</a>
                        </div>
                        @else
                        <div class="row mt-4 text-center">
                           <div class="col-9"> Verification is pending</div> <div class="col-1"><i class="fa-solid fa-check"></i></div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <h4>Bio</h4>
                    {{ auth()->user()->bio }}
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h4>Reviews</h4>
                    @foreach ($reviews as $review)
                        {{ $review->rate }}                        
                        {{ $review->review }}                        
                        {{ $review->users->name }}                        
                    @endforeach
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
    {{-- <div class="card" style="margin:20px;">
        <div class="card-header">
            <h3>Worker Name</h3>
            <p>Job description</p>
        </div>
      <div class="row">
        <div class="col-md-3">
            <div class="card-body">
                body
            </div>
        </div>

        <div class="col-md-9">
            <div class="card-body">
                body
            </div>
        </div>
      </div> --}}

</div>
</body>
</html>
@endsection