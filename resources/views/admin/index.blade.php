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
          <h4>Total profits</h4>
          <h2>${{ $profits }}</h2>
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
  <div class="container my-5">
    <div class="card flex-fill w-100">
      <div class="card-header">

        <h5 class="card-title mb-0">Monthly Profits</h5>
      </div>
      <div class="card-body py-3">
        <div class="chart chart-sm">
          <canvas id="chartjs-dashboard-line"></canvas>
        </div>
      </div>
    </div>
  </div>
  <!-- start table -->
  <div class="container">
    <div class="row">
      <div class="col-8">
        <section class="services">
          <h2>Latest Jobs</h2>
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
                @foreach ($jobs->reverse() as $job)
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
        <h2>Latest Workers</h2>
        @foreach ($workers->reverse() as $worker)
        <div class="worker">
          <div class="row align-items-center">
            <div class="col-3">
              <div class="worker-img">
                <img src="{{ asset('img/' . $worker->users->img) }}" alt="" width="30px">
              </div>
            </div>
            <div class="col-6">
              <div class="worker-name">
                <span>{{ $worker->users['name'] }}</span>
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
</div>



<script src="js/app.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
    var gradient = ctx.createLinearGradient(0, 0, 0, 225);
    gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
    gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
    // Line chart
    var chart =  <?php echo $chart ?>;
    console.log(chart);
    console.log(chart[0]['data']['Jan']);
    console.log(chart[0]['data'].length);
    
    var price = [chart[0]['data']['Jan'],chart[0]['data']['Feb'],chart[0]['data']['Mar'],chart[0]['data']['Apr'],
    chart[0]['data']['May'],chart[0]['data']['Jun'],chart[0]['data']['Jul'],chart[0]['data']['Aug'],
    chart[0]['data']['Sep'],chart[0]['data']['Oct'],chart[0]['data']['Nov'],chart[0]['data']['Dec']]

    console.log(price);
    new Chart(document.getElementById("chartjs-dashboard-line"), {
      type: "line",
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales ($)",
          fill: true,
          backgroundColor: gradient,
          borderColor: window.theme.primary,
          data: price
        }]
      },
      options: {
        maintainAspectRatio: false,
        legend: {
          display: false
        },
        tooltips: {
          intersect: false
        },
        hover: {
          intersect: true
        },
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            reverse: true,
            gridLines: {
              color: "rgba(0,0,0,0.0)"
            }
          }],
          yAxes: [{
            ticks: {
              stepSize: 1000
            },
            display: true,
            borderDash: [3, 3],
            gridLines: {
              color: "rgba(0,0,0,0.0)"
            }
          }]
        }
      }
    });
  });
</script>



<script src="js/script.js"></script>
</body>
</html>
@endsection