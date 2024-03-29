@extends('layout.worker')
@section('content')
<script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js')}}" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

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
    
    {{-- <div class="info-card">
      <div class="card">
        <div class="card-icon">
          <i class="fa-solid fa-users"></i>
        </div>
        <div class="card-detail">
          <h4>Total customer</h4>
          <h2>{{ $users }}</h2>
        </div>
      </div>
    </div> --}}
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
  {{-- <div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
    <div class="cards flex-fill">
        <div class="card-header">

            <h5 class="card-title mb-0">Calendar</h5>
        </div>
        <div class="card-body d-flex">
            <div class="align-self-center w-100">
                <div class="chart">
                    <div id="datetimepicker-dashboard"></div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- </div> --}}
<div class="container">
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



      
      {{-- <script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
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
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new jsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				},
				zoomOnScroll: false
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
			var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
				defaultDate: defaultDate
			});
		});
	</script> --}}


	<div class="container mt-4">
        <section class="services">
          <h2>Latest Jobs</h2>
          <div class="table-responsive">
            <table class="table table-bordered text-center">
              <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Service Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                </tr>
              </thead>
            <tbody class="table-group-divider">
                @foreach ($jobs as $job)
                <tr>
                    <th scope="row">{{ $job->id }}</th>
                    <td>{{$job->users->name}}</td>
                    <td>{{$job->services->name}}</td>
                    <td>$ {{$job->price}}</td>
                    <td>{{$job->date}}</td>
                    {{-- <td><div class="badge bg-success status px-2 ps-1">{{$job->status}}</div></td> --}}
                    @if($job->status == 'Rejected')
                    <td><span class="badge bg-danger ">{{$job->status}}</span></td>
      
      @elseif($job->status  == 'In progress')
      <td><div class="badge bg-warning">{{$job->status}}</div></td>

      @elseif($job->status  == 'Pending')
      <td><div class="badge bg-secondary">{{$job->status}}</div></td>
      
      @elseif($job->status  == 'Done')
      <td><div class="badge bg-success ms-1 me-1 ps-2 pe-2">{{$job->status}}</div></td>
  
      @endif



                </tr>
              @endforeach
            </tbody>
          </table>
        </div>              
      </section>
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