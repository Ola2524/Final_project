@extends('layout.worker')
@section('content')




    <!-- start main content -->
    <div class="col-12  col-xxl-9 mx-5 ">
      <div class="card-header mb-3 ">

        <h5 class="card-title mb-2 mt-3 ">Job History</h5>
      </div>

      {{-- search --}}
      <div class="row my-4 align-items-center ">
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
      <table class="table table-hover my-0 border">
        <thead>
          <tr>
            <th>Name Of User</th>
            <th class="d-none d-xl-table-cell"> Date</th>
            <th class="d-none d-xl-table-cell">Name of service</th>
            <th>Status</th>
            {{-- <th class="d-none d-md-table-cell">Assignee</th> --}}
          </tr>
        </thead>
           <tbody class="table-group-divider"class="alldata" id="Content">

          @foreach ($user as $users )
          {{-- @dd($user) --}}
          <tr>
            <td>{{$users->name}}</td>
            <td class="d-none d-xl-table-cell">{{$users->date}}</td>
            <td class="d-none d-xl-table-cell">{{$users->service}}</td>
            @if($users->status == 'Rejected')
            <td><span class="badge bg-danger ">{{$users->status}}</span></td>

@elseif($users->status  == 'In progress')
<td><div class="badge bg-warning">{{$users->status}}</div></td>

@elseif($users->status == 'Pending')
<td><div class="badge bg-secondary">{{$users->status}}</div></td>

@elseif($users->status  == 'Done')
<td><div class="badge bg-success ms-1 me-1 ps-2 pe-2">{{$users->status}}</div></td>

@endif
            {{-- <td><span class="badge bg-warning">{{$users->status}}</span></td> --}}
            {{-- <td class="d-none d-md-table-cell">Vanessa Tucker</td> --}}
          </tr>
          @endforeach
          {{-- <tr>
            <td>Project Fireball</td>
            <td class="d-none d-xl-table-cell">01/01/2021</td>
            <td class="d-none d-xl-table-cell">31/06/2021</td>
            <td><span class="badge bg-danger">Cancelled</span></td>
            <td class="d-none d-md-table-cell">William Harris</td>
          </tr>
          <tr>
            <td>Project Hades</td>
            <td class="d-none d-xl-table-cell">01/01/2021</td>
            <td class="d-none d-xl-table-cell">31/06/2021</td>
            <td><span class="badge bg-success">Done</span></td>
            <td class="d-none d-md-table-cell">Sharon Lessman</td>
          </tr>
          <tr>
            <td>Project Nitro</td>
            <td class="d-none d-xl-table-cell">01/01/2021</td>
            <td class="d-none d-xl-table-cell">31/06/2021</td>
            <td><span class="badge bg-warning">In progress</span></td>
            <td class="d-none d-md-table-cell">Vanessa Tucker</td>
          </tr>
          <tr>
            <td>Project Phoenix</td>
            <td class="d-none d-xl-table-cell">01/01/2021</td>
            <td class="d-none d-xl-table-cell">31/06/2021</td>
            <td><span class="badge bg-success">Done</span></td>
            <td class="d-none d-md-table-cell">William Harris</td>
          </tr>
          <tr>
            <td>Project X</td>
            <td class="d-none d-xl-table-cell">01/01/2021</td>
            <td class="d-none d-xl-table-cell">31/06/2021</td>
            <td><span class="badge bg-success">Done</span></td>
            <td class="d-none d-md-table-cell">Sharon Lessman</td>
          </tr>
          <tr>
            <td>Project Romeo</td>
            <td class="d-none d-xl-table-cell">01/01/2021</td>
            <td class="d-none d-xl-table-cell">31/06/2021</td>
            <td><span class="badge bg-success">Done</span></td>
            <td class="d-none d-md-table-cell">Christina Mason</td>
          </tr>
          <tr>
            <td>Project Wombat</td>
            <td class="d-none d-xl-table-cell">01/01/2021</td>
            <td class="d-none d-xl-table-cell">31/06/2021</td>
            <td><span class="badge bg-warning">In progress</span></td>
            <td class="d-none d-md-table-cell">William Harris</td>
          </tr> --}}
        </tbody>
        <tbody  class="searchdata"></tbody>

      </table>
    </div>
  </div>
    
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