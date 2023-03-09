@extends('layout.admin')
@section('content')    
        <!-- start main content -->
        <div class="main">
            <div class="container">
              <h1>Workers</h1>
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
                
                <div class="col-auto ms-auto me-5">
                  <a href="{{ url('workers/create') }}" class="btn btn-primary px-4">Add</a>
                </div>
              </div>
              @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Img</th>
                    <th scope="col">Phone_Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Age</th>
                    <th scope="col">City</th>
                  <th scope="col">Country</th>
                  <th scope="col">Street</th>
                  <th scope="col">points</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                  @foreach ($workers as $worker)
                                    <tr>
                                      <td>{{ $worker->id }}</td>
                                        <td>{{ $worker->users->name }}</td>
                                        <td><img src="{{ asset('img/' . $worker->users->img) }}" width="75" /></td>
                                        <td>{{ $worker->phone_number }}</td>
                                        <td>{{ $worker->users->email }}</td>
                                        <td>{{ $worker->age }}</td>
                                        <td>{{ $worker->users->city }}</td>
                                        <td>{{ $worker->users->country }}</td>
                                        <td>{{ $worker->users->street }}</td>
                                        <td>{{ $worker->points }}</td>
                                        <td>
                                          @if ($worker->points > 0)
                                          <a href="#" class="btn btn-outline-danger">Remove points</a> 
                                        @endif
                      
                    <form method="POST" action="{{ route('workers.destroy',$worker->id) }}" accept-charset="UTF-8" style="display:inline">
                      <a href="{{ route('workers.edit',$worker->id) }}" class="btn btn-outline-success">Edit</a>
                      @csrf
                    @method('delete')
                      <button type="submit" class="btn btn-outline-danger" title="Delete Worker"> Delete</button>
                  </form>
                      @endforeach
                </tbody>
              </table>
            </div>
        </div>
        <!-- end main contnet -->
    </div>
    
  </body>
  </html>
  @endsection