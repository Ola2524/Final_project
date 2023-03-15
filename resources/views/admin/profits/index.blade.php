 @extends('layout.admin')
 @section('content')

        <!-- start main content -->
        <div class="main">
            <div class="container">
              <h1>Profits</h1>
              <div class="row my-4 align-items-center">
                <div class="col-auto">
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
                  {{-- <a href="{{route('services.create')}}" class="btn btn-primary px-4">Add</a> --}}
                </div>
              </div>
              <div class="table-container">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">User name</th>
                      <th scope="col">Worker name</th>
                      <th scope="col">Service name</th>
                      <th scope="col">Profits</th>
                      <th scope="col">Date</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divider"class="alldata" id="Content">
                    @foreach ($payments as $payment)
                      {{-- @dd($services) --}}
                    <tr>
                      <th scope="row">{{$payment['id']}}</th>
                      <td>{{$payment->jobs->users['name']}}</td>
                      <td>{{$payment->jobs->workers->users['name']}}</td>
                      <td>{{$payment->jobs->services['name']}}</td>
                      <td>{{$payment['profit']}}</td>
                      <td>{{$payment['date']}}</td>
                    </tr>
                    @endforeach
                 
                  </tbody>
                  <tbody  class="searchdata"></tbody>
                </table>
              </div>
            </div>
        </div>
<div class="ms-3">{{ $payments->links() }}</div>

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
url:'{{URL::to('search/profits')}}',
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
