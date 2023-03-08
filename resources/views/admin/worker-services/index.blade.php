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
                      <td>${{$worker_service['fixed_price']}}</td>
        
                      
                      <td>
                      <a href="{{route('worker.services.delete',['id'=>$worker_service->id])}}" class="btn btn-danger ms-3">Delete</a>                      
                      @endforeach
                    </tr>
        </tbody>
      </table>
    </div>
    <!-- end main contnet -->
  </div>

  <script src="js/script.js"></script>
</body>

</html>
@endsection
