@extends('layout.app')
@section('content')    
    <!-- start main content -->
        <div class="main">
            <div class="container">
              <h1>Offers</h1>
              <div class="row my-4 align-items-center">
                <div class="col-auto">
                  <form class="row g-3">
                    <div class="input-group">
                      <label for="" class="input-group-text">Show</label>

                      <select name="" id="" class="form-select px-5">
                      <option value=" ">...</option>
                        <option value="0">USER</option>
                        <option value="1">WORKER</option>
                      </select>
                    </div>
                  </form>
                </div>
                
                <!-- <div class="col-auto ms-auto me-5">
                  <a href="" class="btn btn-primary px-4">Add</a>
                </div> -->

              </div>
              <div class="table-container">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Role</th>
                      <th scope="col">Points</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divider">
                    
                    <tr>
                    @foreach ($users as $user )
                      {{-- @dd($user) --}}
                    <tr>
                      <th scope="row">{{$user['id']}}</th>
                      <td>{{$user ['name']}}</td>
                      
                      <td> USER </td>
                      <td>{{$user ['points']}} </td>

                          
                      <td>
                        @if ($user ['points'] > 0)
                          <a href="{{route('offers.remove',['user'=>$user->id])}}" class="btn btn-outline-danger">Remove discount</a> 
                        @endif
                      
                      </td>
                    @endforeach
                    </tr>
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