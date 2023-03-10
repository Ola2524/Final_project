@extends('layout.admin')
@section('content')    
    <!-- start main content -->
        <div class="main">
            <div class="container">
              <h1>Offers</h1>
              <div class="row my-4 align-items-center">
                <div class="col-auto">
                  {{-- <form class="row g-3">
                    <div class="input-group">
                      <label for="" class="input-group-text">Show</label>

                      <select name="" id="" class="form-select px-5">
                      <option value=" ">...</option>
                        <option value="0">USER</option>
                        <option value="1">WORKER</option>
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
                  <tbody class="table-group-divider"class="alldata" id="Content">
                    
                    <tr>
                    @foreach ($users as $user )
                      {{-- @dd($user) --}}
                    <tr>
                      <th scope="row">{{$user['id']}}</th>
                      <td>{{$user ['name']}}</td>
                      
                      <td> {{$user['role']}} </td>
                      <td>{{$user ['points']}} </td>

                          
                      <td>
                        @if ($user ['points'] > 0)
                          <a href="{{route('offers.removeUser',['user'=>$user->id])}}" class="btn btn-outline-danger">Remove Points</a> 
                        @endif
                      
                      </td>
                    @endforeach
                    </tr>
                  </tbody>
                  <tbody  class="searchdata"></tbody>
                </table>
              </div>
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