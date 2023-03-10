@extends('layout.admin')
@section('content')   
        <!-- start main content -->
        <div class="main">
            <div class="container">
              <h1>Jobs</h1>
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
                <tbody class="table-group-divider" id="Content" >
                  @foreach ($jobs as $job)
                    <tr>
                      <th scope="row">{{ $job->id}}</th>
                      <td>{{$job->workers->users->name}}</td>
                      <td>{{$job->users->name}}</td>
                      <td>{{$job->services->name}}</td>
                      <td>{{$job->rate}}</td>
                      <td>{{$job->price}}</td>
                    
                      <td>{{$job->date}}</td>
                      @if($job->status == 'Rejected')
                      <td><span class="badge bg-danger ">{{$job->status}}</span></td>
        
        @elseif($job->status  == 'In progress')
        <td><div class="badge bg-warning">{{$job->status}}</div></td>

        @elseif($job->status  == 'Pending')
        <td><div class="badge bg-secondary">{{$job->status}}</div></td>
        
        @elseif($job->status  == 'Done')
        <td><div class="badge bg-success ms-1 me-1 ps-2 pe-2">{{$job->status}}</div></td>
    
        @endif
                      {{-- <td><div class="bg-success status text-center py-1">{{$job->status}}</div></td> --}}
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
<script>
  $('#search').on('keyup',function(){
 
$value=$(this).val();
  // if($value){
  // $('.alldata').hide();
  // $('.searchdata').show();
  
  // }
  // else{
  //   $('.alldata').show();
  // $('.searchdata').hide();
  // }
$.ajax({
type:'get',
url:'{{URL::to('search/job')}}',
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
