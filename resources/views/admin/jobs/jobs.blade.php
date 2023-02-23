@extends('layout.app')
@section('content')   
        <!-- start main content -->
        <div class="main">
            <div class="container">
              <h1>Jobs</h1>
              <div class="row my-4 align-items-center">
                <div class="col-auto">
                  <form class="row g-3">
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
                  </form>
                </div>
                
                <div class="col-auto ms-auto me-5">
                  {{-- <a href="" class="btn btn-primary px-4">Add</a> --}}
                </div>
              </div>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Worker Name</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Service Name</th>
                    <th scope="col">Rate</th>
                    <th scope="col">Price</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                  @foreach ($jobs as $job)
                    <tr>
                      <th scope="row">{{ $job->id}}</th>
                      <td>{{$job->worker}}</td>
                      <td>{{$job->user}}</td>
                      <td>{{$job->service}}</td>
                      <td>{{$job->price}}</td>
                      <td>{{$job->rate}}</td>
                      <td>{{$job->date}}</td>
                      <td><div class="bg-success status text-center py-1">{{$job->status}}</div></td>
                    </tr>
                  @endforeach
                </tbody>

              </table>
            </div>
          </div>
        </div>
        <!-- end main contnet -->
    </div>
</body>
</html>
@endsection