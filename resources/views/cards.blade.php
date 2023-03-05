@extends('layout.user')
@section('content')	
	<style>
		body {
		  font-family: Arial, Helvetica, sans-serif;
		}
		
		.flip-card {
		  background-color: transparent;
		  width: 500px;
		  height: 500px;
		  perspective: 1000px;
		}
		
		.flip-card-inner {
		  position: relative;
		  width: 100%;
		  height: 100%;
		  text-align: center;
		  transition: transform 0.6s;
		  transform-style: preserve-3d;
		  box-shadow: 0 10px 10px 0 rgba(0,0,0,0.2);
		}
		
		.flip-card:hover .flip-card-inner {
		  transform: rotateY(180deg);
		}
		
		.flip-card-front, .flip-card-back {
		  position: absolute;
		  width: 100%;
		  height: 100%;
		  -webkit-backface-visibility: hidden;
		  backface-visibility: hidden;
		}
		
		.flip-card-front {
		  background-color: #bbb;
		  color: black;
		}
		
		.flip-card-back {
		  background-color: #80adcc;
		  color: white;
		  transform: rotateY(180deg);
		}
		</style>
		</head>
		<body>
		
		<h1 style="text-align: center; font-family:sans-serif" class="m-3">REGISTERATION FORM</h1>
		
		<div class="row " style="place-content: center ;">
			
			
			
		<div class="flip-card col-lg-6 m-5 p-5">
			<a href="{{route('worker.registeration')}}">
		  <div class="flip-card-inner">
			<div class="flip-card-front">
			 <img src="https://th.bing.com/th/id/OIP.peOEBCOmfrI05_nCvw_kaAHaHa?w=201&h=201&c=7&r=0&o=5&pid=1.7" alt="Avatar" style="width:500px;height:500px;">
			</div>
			<div class="flip-card-back">
				<BR><BR><BR>
			  <h1>WORKER</h1> 
			  
			  

			</div>
			 
		</div>
	</a>
		</div>
			<div class="flip-card col-lg-6 m-5 p-5">
				<a href="{{route('createUser')}}">
				
				<div class="flip-card-inner">
				  <div class="flip-card-front">
					<img src="https://image.freepik.com/free-vector/user-avatars-pack_23-2147502629.jpg" alt="Avatar" style="width:500px;height:500px;">
				  </div>
				  <div class="flip-card-back">
					  <BR><BR><BR>
					<h1>USER</h1> 
		  		  </div>
		</div>
	</a>

		</div>
	</div>
@endsection
