@extends('layout.worker')
@section('content')
    <!-- start main content -->
    <div class="col-12  col-xxl-9 mx-5 ">
      <div class="card-header mb-3 ">

        <h5 class="card-title mb-2 mt-3 ">Job History</h5>
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
        <tbody>
          @foreach ($user as $users )
          {{-- @dd($user) --}}
          <tr>
            <td>{{$users->name}}</td>
            <td class="d-none d-xl-table-cell">{{$users->date}}</td>
            <td class="d-none d-xl-table-cell">{{$users->service}}</td>
            <td><span class="badge bg-warning">{{$users->status}}</span></td>
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
      </table>
    </div>
  </div>
    
    </div>
    <!-- end main contnet -->
  </div>

  <script src="js/script.js"></script>
</body>

</html>
@endsection