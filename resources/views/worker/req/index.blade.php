@extends('layout.worker')
@section('content')    
  <!-- howe content -->
  {{-- <div class="contanier"> --}}
  {{-- <div class="content"> --}}
    <!-- start navbar -->
    
    <!-- start main content -->
    {{-- <div class="container"> --}}
      <div class="row my-4 align-items-center ms-5">
        <div class="col-auto">
      <div class="search-container">
        <div align="left">
        <ul class="pagination justify-content-center" >
           <input type="text" placeholder="Search.." name="search" id="search" class="form-control">
         </ul>
       </div>
    </div>
    </div>
  </div>
        <table class="table w-75  p-3 m-5">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name Of User</th>
            <th scope="col">Name Of Service</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="table-group-divider"class="alldata" id="Content">
        
        {{-- <tbody> --}}
        <tr>
                    @foreach ($jobs->reverse() as $job)
                    <tr>
                      <th scope="row">{{$job['id']}}</th>
                      <td>{{$job->users ['name']}}</td>
                      <td>{{$job->services ['name']}}</td>
                      <td>${{$job['price']}}</td>
        
                      
                      <td>
                      <a href="{{route('reg.add',['add'=>$job->id])}}" class="btn btn-success">Accept</a>
                      <a href="{{route('reg.remove',['job'=>$job->id])}}" class="btn btn-danger ms-3">Reject</a>
                      <a href="{{ route('order.show',['id'=>$job->id]) }}" class="btn btn-secondary ms-3">Show details</a>
                      <a href="/chatify/{{$job->users->id}}" class="btn btn-secondary ms-3">contact</a></td>
                      
                      @endforeach
                    </tr>
        </tbody>
        <tbody  class="searchdata"></tbody>

      </table>
    </div>
    <!-- end main contnet -->
  </div>

  <script src="js/script.js"></script>
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
