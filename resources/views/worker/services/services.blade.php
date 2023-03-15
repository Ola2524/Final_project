@extends('layout.worker')
@section('content')

       <!-- start main content -->
       <div class="main">
           <div class="container">
             <h1>Services</h1>
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
                 <a href="{{route('worker.services.create')}}" class="btn btn-primary px-4">Add</a>
               </div>
             </div>
             <div class="table-container">
               <table class="table table-bordered">
                 <thead>
                   <tr>
                     <th scope="col">#</th>
                     <th scope="col">Service name</th>
                     <th scope="col">Fixed price</th>
                     <th scope="col">Actions</th>
                   </tr>
                 </thead>
                  <tbody class="table-group-divider"class="alldata" id="Content">

                   @foreach ($services as $service )
                   <tr>
                     <th scope="row">{{$service->id}}</th>
                     <td>{{ $service->services->name }}</td>                     
                     <td>{{ $service->fixed_price }}</td>                     
                     <td>
                       <a href="{{route('worker.services.edit',['service'=>$service->id])}}" class="btn btn-outline-success"><i class="fa-solid fa-pen-to-square"></i></a>
                       <form style="display: inline" method="POST" action="{{route('worker.services.destroy',['service'=>$service->id])}}" >
                             
                    
                         @method('delete')
                               @csrf

                               <button type="submit" class="btn btn-outline-light delete" data-confirm="Are you sure to delete this item?"><i class="fa-solid fa-trash-can " style="color: red;font-size:30px"></i></button>

                     </form>
                     </td>
                   </tr>
                   @endforeach
                
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
