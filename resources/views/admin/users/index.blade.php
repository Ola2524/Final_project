@extends('layout.admin')
@section('content')
<!-- start main content -->
      <div class="main">
          <div class="container">
            <h1>Users</h1>
            <div class="row my-4 align-items-center">
              <div class="col-auto">
              {{--   <form class="row g-3">
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
                </form>--}}
              <div class="search-container">
                <div align="left">
                <ul class="pagination justify-content-center" >
                   <input type="text" placeholder="Search.." name="search" id="search" class="form-control">
                 </ul>
               </div>
            </div>
          </div>
              <div class="col-auto ms-auto me-5">
                <a href="{{ url('/user/create') }}" class="btn btn-primary px-4">Add</a>
              </div>
          
            </div> 

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Img</th>
                  <th scope="col">City</th>
                  <th scope="col">Country</th>
                  <th scope="col">Street</th>
                  <th scope="col">Email</th>
                  <th scope="col">User role</th>
                  <th scope="col">Points</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody class="table-group-divider"class="alldata" id="Content">

              @foreach ($users as $user)
                                    <tr>
                                      <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td><img src="{{asset('img/'.$user->img )}}" width="75" alt=""></td>
                                        <td>{{ $user->city }}</td>
                                        <td>{{ $user->country }}</td>
                                        <td>{{ $user->street }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->points }}</td>
                                        <td>
              
                        @if ($user->points > 0)
                          <a href="#" class="btn btn-outline-danger">Remove points</a> 
                        @endif
                    <a href="{{ url('/user/' . $user->id . '/edit') }}" class="btn btn-outline-success">Edit</a>
                    <form method="POST" action="{{ url('/user' . '/' . $user->id) }}" accept-charset="UTF-8" style="display:inline">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-outline-danger" title="Delete Student" onclick="return confirm("Confirm delete?")"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                  </form>
                    {{-- <a href="#" class="btn btn-outline-danger">Delete</a> --}}
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tbody  class="searchdata"></tbody>
            </table>
          </div>
      </div>
      <!-- end main contnet -->
    </div>
  
  </body>
  </html>
  <script>
    $('#search').on('keyup',function(){
  
  $value=$(this).val();
  if($value){
  $('.alldata').hide();
  $('.searchdata').show();
  
  }
  else{
    $('.alldata').show();
  $('.searchdata').hide();
  }
  $.ajax({
  type:'get',
  url:'{{URL::to('search')}}',
  data:{'search':$value},
  success:function(data)
  {
    console.log(data);
    $('#Content').html(data)
  }
  });
    })
     </script>
  @endsection
