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
            <th scope="col">Rate</th>
            <th scope="col">Price</th>
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
                      <a href="{{route('worker.services.delete',['id'=>$worker_service->id])}}" class="btn btn-light ms-3"><i class="fa-solid fa-trash-can " style="color: red;font-size:30px"></i></a> 
                      <td>
                        
                              
                            
                        </td>        
                                  
                      @endforeach
                    </tr>
        </tbody>
      </table>
      
<div class="ms-5">{{ $worker_services->links() }}</div>
    </div>
    <!-- end main contnet -->
  </div>

  <script src="js/script.js"></script>
</body>

</html>
@endsection
