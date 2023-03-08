@extends('layout.admin')
@section('content')
 <!-- start main content -->
 <section class="main">
    <div class="info-card">
      <div class="cards">
        <div class="card-icon">
          <i class="fa-solid fa-money-check-dollar"></i>
        </div>
        <div class="card-detail">
          <h4>Total profit</h4>
          <h2>{{ $profits }}</h2>
        </div>
      </div>
    </div>
    <div class="info-card">
      <div class="cards">
        <div class="card-icon">
          <i class="fa-solid fa-users-gear"></i>
        </div>
        <div class="card-detail">
          <h4>Total workers</h4>
          <h2>{{ $workers_count }}</h2>
        </div>
      </div>
    </div>
    <div class="info-card">
      <div class="cards">
        <div class="card-icon">
          <i class="fa-solid fa-users"></i>
        </div>
        <div class="card-detail">
          <h4>Total customer</h4>
          <h2>{{ $users }}</h2>
        </div>
      </div>
    </div>
    <div class="info-card">
      <div class="cards">
        <div class="card-icon">
          <i class="fa-solid fa-briefcase"></i>
        </div>
        <div class="card-detail">
          <h4>Total Jobs</h4>
          <h2>{{ $job_count }}</h2>
        </div>
      </div>
    </div>
  </section>
  <!-- end main contnet -->
  <!-- start table -->
  <div class="container">
    <div class="row">
      <div class="col-8">
        <section class="services">
          <h2>Jobs</h2>
          <div class="table-responsive">
            <table class="table table-bordered text-center">
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
            <tbody class="table-group-divider">
                @foreach ($jobs as $job)
                <tr>
                    <th scope="row">{{ $job->id }}</th>
                    <td>{{$job->workers->users->name}}</td>
                    <td>{{$job->users->name}}</td>
                    <td>{{$job->services->name}}</td>
                    <td>{{$job->price}}</td>
                    <td>{{$job->rate}}</td>
                    <td>{{$job->date}}</td>
                    <td><div class="badge bg-success status px-2 ps-1">{{$job->status}}</div></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>              
      </section>
    </div>
    <div class="col-4">
      <section class="top-worker">
        <h2>Last Workers</h2>
        @foreach ($workers as $worker)
        <div class="worker">
          <div class="row align-items-center">
            <div class="col-3">
              <div class="worker-img">
                <img src="{{ asset('images/' . $worker->img) }}" alt="" width="30px">
              </div>
            </div>
            <div class="col-6">
              <div class="worker-name">
                <span>{{ $worker['name'] }}</span>
              </div>
            </div>
            <div class="col-3">
              <div class="worker-profit">
                <span>{{ $worker['points'] }} pts</span>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </section>
    </div>
  </div>
</div>

  
  <!-- end table -->
</div>

<script src="js/script.js"></script>
</body>
</html>
@endsection