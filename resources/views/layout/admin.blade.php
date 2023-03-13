<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <!-- custom link -->
    <link rel="stylesheet" href="{{asset('css/dashboard_style.css')}}">
    <!-- bootstarp -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- box icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Mulish:wght@300;400;700;800&family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@100;200;300;400;600;700" rel="stylesheet">
    {{-- search --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body> 

  <!-- start sidebar -->
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxs-home-smile'></i>
      <span class="logo-name">Home Care</span>
    </div>

        <ul class="nav-links">
            <li class="active"><a href="{{ route('admin') }}"><i class='bx bx-grid-small'></i><span>Dashboard</span></a></li>
            <li><a href="{{ route('services') }}"><i class="fa-solid fa-briefcase"></i><span>Services</span></a></li>
            <li><a href="{{ route('profits') }}"><i class="fa-solid fa-sack-dollar"></i><span>Profits</span></a></li>
            <li><a href="{{ route('jobs') }}"><i class="fa-solid fa-list-ul"></i><span>Job list</span></a></li>
            <li><a href="/user"><i class="fa-solid fa-users"></i><span>Users</span></a></li>
            <li><a href="{{ route('workers') }}"><i class="fa-solid fa-users-gear"></i><span>Workers</span></a></li>
            <li><a href="{{ route('workerreq') }}"><i class="fa-solid fa-check-to-slot"></i><span>Verification</span></a></li>
            <li><a href="{{ route('offers') }}"><i class="fa-solid fa-gift"></i><span>Offers</span></a></li>
            <li><a href="{{ route('AdminWorkerserv') }}"><i class="fa-solid fa-person-digging"></i><span>worker services</span></a></li>
            <li><a href="{{ route('contact.us') }}"><i class="fa-solid fa-envelope"></i><span>Contact Us</span></a></li>
            <li><a href="#"><i class='bx bx-log-out'></i><span>
                <form action="{{ route("logout") }}" method="POST">
                    @csrf
                <input type="submit" class="dropdown-item" value="logout">
                 </form></span></a></li>
        </ul>
    </div>
    <!-- end sidebar -->

    <!-- home content -->
  <div class="content">
    <!-- start navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container mx-2">
        <div class="sidebar-btn">
            <i class="fa-solid fa-bars"></i>
            <span>Dashboard</span>
        </div>
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
            {{-- <li class="nav-item mt-2">
                <a href="#"><i class="fa-solid fa-bell"></i></a>
            </li> --}}
            <li class="nav-item">
                <div class="d-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn bg-light text-dark dropdown-toggle d-flex justify-content-between align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                            <div><img src="{{asset('img/'.auth()->user()->img)}}"class="rounded-circle" width="40"/></div>
                            <span class="ms-2 me-1">{{ auth()->user()->name }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                          <li><a href="{{ route('homepage') }}" class="dropdown-item" type="button">Visit site</a></li>
                          <li><a href="{{ route('worker.profile') }}" class="dropdown-item" type="button">Profile</a></li>
                          <li><form action="{{ route("logout") }}" method="POST">
                            @csrf
                            <input type="submit" class="dropdown-item" value="logout">
                          </form></li>
                        </ul>
                      </div>
                </div>
            </li>
            </ul>
        </div>
        </div>
    </nav>
    
    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarbtn = document.querySelector(".sidebar-btn");
    
        sidebarbtn.onclick = function(){
            sidebar.classList.toggle("active");
        }
        </script>
     <!-- end navbar -->

    @yield('content')

