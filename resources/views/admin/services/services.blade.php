 @extends('layout.admin')
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
                  {{-- <a href="{{route('service.create')}}">
                    <button class="btn btn-primary">ADD</button> --}}
                    
                            </a>
                  <a href="{{route('services.create')}}" class="btn btn-primary px-4">Add</a>
                </div>
              </div>
              <div class="table-container">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Img</th>
                      <th scope="col">Description</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divider"class="alldata" id="Content">
                    @foreach ($services as $service )
                      {{-- @dd($services) --}}
                    <tr>
                      <th scope="row">{{$service['id']}}</th>
                      <td>{{$service ['name']}}</td>
                      <td><img src="{{ asset('img/'.$service->img) }}" alt="" class="img-service"></td>
                      <td>{{$service['description']}}</td>                      
                      <td>
                        <a href="{{route('services.edit',['services'=>$service->id])}}" class="btn btn-outline-success">Edit</a>
                        <form style="display: inline" method="POST" action="{{route('services.destroy',['services'=>$service->id])}}" >
                              
                     
                          @method('delete')
                                @csrf

                                <button type="submit" class="btn btn-outline-danger delete" data-confirm="Are you sure to delete this item?">Delete</button>

                        {{-- <button  class="btn btn-outline-danger">Delete</button> --}}
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
url:'{{URL::to('search/service')}}',
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
