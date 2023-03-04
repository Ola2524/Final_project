@extends('layout.worker')
@section('content')    
  <!-- howe content -->
  {{-- <div class="contanier"> --}}
  {{-- <div class="content"> --}}
    <!-- start navbar -->
    
    <!-- start main content -->
    {{-- <div class="container"> --}}
        <table class="table w-75  p-3 m-5">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name Of User</th>
            <th scope="col">Name Of Service</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        <tr>
                    @foreach ($jobs as $job)
                    <tr>
                      <th scope="row">{{$job['id']}}</th>
                      <td>{{$job->users ['name']}}</td>
                      <td>{{$job->services ['name']}}</td>
        
                      
                      <td>
                      <a href="{{route('reg.add',['add'=>$job->id])}}" class="btn btn-success">Accept</a>
                      <a href="{{route('reg.remove',['job'=>$job->id])}}" class="btn btn-danger ms-3">Reject</a>
                      <a href="{{ route('order.show',['id'=>$job->id]) }}" class="btn btn-secondary ms-3">Show details</a></td>
                      
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
