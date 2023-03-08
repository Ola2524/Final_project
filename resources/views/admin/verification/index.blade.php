@extends('layout.admin') 
@section('content')
    <!-- start main content -->
    <div class="main">
        <div class="container">
          <h1>Users Requests</h1>
          <div class="row my-4 align-items-center">
            <div class="col-auto">
              {{-- <form class="row g-3">
                <div class="input-group">
                  <label for="" class="input-group-text">Show</label>

                  <select name="" id="" class="form-select px-5">
                    <option value="0">...</option>
                    <option value="10">10</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                  </select>
                </div>
              </form> --}}
              <div class="search-container">
                <div align="left">
                <ul class="pagination justify-content-center" >
                   <input type="text" placeholder="Search.." name="search" id="search" class="form-control">
                 </ul>
               </div>
            </div>
            </div>
            <br><br>
            <br><br>

          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">National ID</th>
                <th scope="col">Criminal Record</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <tr>
              @foreach ($workers as $worker )
              <tr>
                <th scope="row">{{$worker['id']}}</th>
                <td>{{$worker->users ['name']}}</td>
                <td>{{$worker ['national_id']}}</td>
                <td>{{$worker ['criminal_record_certificate']}}</td>
               <td> <a href="{{route('workerreq.add',['worker'=>$worker->id])}}" class="btn btn-success">Accept</a>
                      <a href="{{route('workerreq.remove',['worker'=>$worker->id])}}" class="btn btn-danger ms-3">Reject</a> </td>
                      @endforeach
              </tr>

            </tbody>
          </table>
        </div>
    </div>
    <!-- end main contnet -->

    </div>
</body>
</html>
@endsection   
