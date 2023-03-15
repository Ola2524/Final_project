@extends('layout.admin')
@section('content')    
  <!-- howe content -->
  {{-- <div class="contanier"> --}}
  {{-- <div class="content"> --}}
    <!-- start navbar -->
    
    <!-- start main content -->
    {{-- <div class="container"> --}}
      
        <table class="table w-75 p-3 m-5">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Worker</th>
            <th scope="col">Service</th>
            <th scope="col">Price</th>
            <th scope="col">Rate</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        <tr>
                    @foreach ($worker_services as $worker_service)

                    <tr>
                      <th scope="row">{{$worker_service['id']}}</th>
                      <td>{{$worker_service->workers->users['name']}}</td>
                      <td>{{$worker_service->services['name']}}</td>
                      {{-- <td>{{$worker_service->services['rate']}}</td> --}}
                      <td>
                      <span class="review-stars mb-4" style="color: #fd4;">
                        <!-- ////////////// STAR RATE CHECKER ////////////// -->
                            @if($worker_service['rate'] <= 0.00)
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            @elseif($worker_service['rate'] === 1.00)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            @elseif($worker_service['rate'] === 2.00)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            @elseif($worker_service['rate'] === 3.00)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            @elseif($worker_service['rate'] === 4.00)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa-regular fa-star"></i>
                            @elseif($worker_service['rate'] >= 5.00)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            @endif
                            <!-- ///////////////////////////////////////////// -->
                        </span>
                      </td>
                      <td>${{$worker_service['fixed_price']}}</td>
        
                      
                      <td>
                      <a href="{{route('worker.services.delete',['id'=>$worker_service->id])}}" class="btn btn-danger ms-3">Delete</a> 
                      <td>
                        
                              
                            
                        </td>                  
                      @endforeach
                    </tr>
        </tbody>
      </table>
      <div class="float-end">
        @if(request()->has('trashed'))
            {{-- <a href="{{ route('posts.index') }}" class="btn btn-info">View All posts</a> --}}
            <a href="{{ route('AdminWorkerserv.restoreAll') }}" class="btn btn-success">Restore All</a>
    
            {{-- <a href="{{ route('posts.index', ['trashed' => 'post']) }}" class="btn btn-primary">View Deleted posts</a> --}}
        @endif
    </div>
{{-- {!! $worker_services->links() !!} --}}
    </div>
    <!-- end main contnet -->
  </div>

  <script src="js/script.js"></script>
</body>

</html>
@endsection
