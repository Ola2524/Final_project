
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title> User Registration</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
	.divider-text {
   position: relative;
   text-align: center;
   margin-top: 15px;
   margin-bottom: 15px;
}
.divider-text span {
   padding: 7px;
   font-size: 12px;
   position: relative;   
   z-index: 2;
}
.divider-text:after {
   content: "";
   position: absolute;
   width: 100%;
   border-bottom: 1px solid #ddd;
   top: 55%;
   left: 0;
   z-index: 1;
}

.btn-facebook {
   background-color: #405D9D;
   color: #fff;
}
.btn-twitter {
   background-color: #42AEEC;
   color: #fff;
}
   </style>

			   
   </head>
   <body>
 
 <div class="container">
 
 <div class="card bg-light">
 <article class="card-body mx-auto" style="max-width: 400px;">
	 <h4 class="card-title mt-3 text-center">Create Account</h4>
	 <p class="text-center">Get started with your free account</p>
	 <p>
		 <a href="#" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   sign up via Twitter</a>
		 <a href="#" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   sign up via facebook</a>
	 </p>
	 <p class="divider-text">
		 <span class="bg-light">OR</span>
	 </p>
	 <form  method="POST" action="{{ route('user.registration') }}" enctype="multipart/form-data">
		@csrf
	 <div class="form-group input-group">
		 <div class="input-group-prepend">
			 <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		  </div>
		 <input name="name" id="name" class="form-control" placeholder="Full name" type="text">
	 </div> <!-- form-group// -->
	 <div class="form-group input-group">
		 <div class="input-group-prepend">
			 <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		  </div>
		 <input name="email" id="email" class="form-control" placeholder="Email address" type="email">
	 </div> <!-- form-group// -->
	 <div class="form-group input-group">
		<div class="input-group-prepend">
			<span class="input-group-text"><i class="fa-solid fa-city"></i></span>
		 </div>
		<input name="street" id="city" class="form-control" placeholder="street" type="city">
	</div> <!-- form-group// -->	 
	<div class="form-group input-group">
		<div class="input-group-prepend">
			<span class="input-group-text"> <i class="fa-solid fa-city"></i> </span>
		 </div>
		<input name="city" id="city" class="form-control" placeholder="city" type="city">
	</div> <!-- form-group// -->
	<div class="form-group input-group">
		<div class="input-group-prepend">
			<span class="input-group-text"> <i class="fa-solid fa-city"></i> </span>
		 </div>
		<input name="country" id="city" class="form-control" placeholder="country" type="city">
	</div> <!-- form-group// -->
	<div class="form-group input-group">
		<div class="input-group-prepend">
			<span class="input-group-text"> <i class="fa-solid fa-file-image"></i> </span>
		 </div>
		<input name="img" id="img" class="form-control"  type="file">
	</div> <!-- form-group// -->
	 
	 <div class="form-group input-group">
		 <div class="input-group-prepend">
			 <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		 </div>
		 <input class="form-control" placeholder="password" type="password" name="password" id="password">
	 </div> <!-- form-group// -->
	 <div class="form-group input-group">
		 <div class="input-group-prepend">
			 <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		 </div>
		 <input class="form-control" placeholder="Repeat password" type="password" name="password" id="password">
	 </div> <!-- form-group// -->
	 <div class="form-group input-group">
		<div class="input-group-prepend">
			<span class="input-group-text"> <i class="fa-solid fa-book"></i> </span>
		 </div>
		<textarea name="bio" class="form-control" placeholder="Bio" type="text" id="bio"></textarea>
	</div> <!-- form-group// -->                                      
	 <div class="form-group">
		<input type="submit" value="Submit" class="btn btn-primary">
	 </div> <!-- form-group// -->                                                                      
 </form>
 </article>
 </div> <!-- card.// -->
 
 </div> 
 <!--container end.//-->
	   
   </body>
</html>




{{-- <div class="form-group input-group">
		 <div class="input-group-prepend">
			 <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		 </div>
		 <select class="custom-select" style="max-width: 80px;">
			 <option selected="">+91</option>
			 <option value="1">+001</option>
			 <option value="2">+020</option>
			 <option value="3">+011</option>
		 </select>
		 <input name="" class="form-control" placeholder="Phone number" type="text">
	 </div> <!-- form-group// --> --}}
	 {{-- <div class="form-group input-group">
		 <div class="input-group-prepend">
			 <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		 </div>
		 <select class="form-control">
			 <option selected=""> Select job type</option>
			 <option>Web Developer</option>
			 <option>Full Stack Developer</option>
			 <option>Mean Stack</option>
		 </select>
	 </div> <!-- form-group end.// --> --}}