 @extends('layout.admin')
 @section('content')

        <!-- start main content -->
        <div class="main">
            <div class="container">
              <h1>Contacts</h1>
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
                </div>
              </div>
              <div class="table-container">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Message</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divider"class="alldata" id="Content">

                    @foreach ($contacts as $contact )
                      {{-- @dd($services) --}}
                    <tr>
                      <th scope="row">{{$contact['id']}}</th>
                      <td>{{$contact->name}}</td>
                      <td>{{$contact->email}}</td>
                      <td>{{$contact->subject}}</td>
                      <td>{{$contact->message}}</td>
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
