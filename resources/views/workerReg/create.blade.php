<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Registration </title>
    {{-- <link rel="stylesheet" href="Regstyle.css"> --}}
 <link rel="stylesheet" href="{{asset('css/Regstyle.css')}}">

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <h3 class="title">Create Account</h3>
    <div class="content">
	
      <form method="POST" action="{{ route('worker.register') }}">
        @csrf
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <!-- <input type="text" placeholder="Enter your name" name="name" id="name"  required> -->
            <input class="form-control"name="name" id="name" type="text" placeholder="Full Name">
			<x-input-error :messages="$errors->get('name')" class="mt-2" />

          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input  name="email" id="email" class="form-control" type="email" placeholder="Email Address">
			<x-input-error :messages="$errors->get('email')" class="mt-2" />

            <!-- <input type="email" name="password" id="password" name="email" id="email"  placeholder="Enter your email" required> -->
          </div>
        
          <div class="input-box">
            <span class="details">Password</span>
         <input class="form-control" name="password" id="password" type="password" placeholder="Password">
		 <x-input-error :messages="$errors->get('Password')" class="mt-2 danger" />
          </div>
          <div class="input-box">
            <span class="details">country</span>
            <!-- <input type="text" name="country" id="country" placeholder="Enter your country" required> -->
            <input class="form-control" name="country" id="country" type="text" placeholder="country">
			<x-input-error :messages="$errors->get('country')" class="mt-2" />
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input class="form-control" name="conf" id="conf" type="password" placeholder="Confirm Password">
			<x-input-error :messages="$errors->get('conf')" class="mt-2" />
          </div>
          <div class="input-box">
            <span class="details">city</span>
            <!-- <input class="form-control"  name="street" id="street" type="text" placeholder="street"> -->
            <input class="form-control" name="city" id="city" type="text" placeholder="city">
			<x-input-error :messages="$errors->get('city')" class="mt-2" />
          </div>
          
          <div class="input-box">
            <span class="details">img</span>
            <input class="form-control"style="background-color:rgb(255, 255, 255)"  name="img" id="img" type="file" placeholder="file">
			<x-input-error :messages="$errors->get('img')" class="mt-2" />
          </div>
         
          
          <div class="input-box">
            <span class="details">street</span>
            <!-- <input type="text"name="street" id="street" placeholder="Enter your street" required> -->
            <input class="form-control"  name="street" id="street" type="text" placeholder="street">
			<x-input-error :messages="$errors->get('street')" class="mt-2" />
          </div>
          <div class="input-box">
            <span class="details">Age</span>
            <!-- <input class="form-control"  name="street" id="street" type="text" placeholder="street"> -->
            <input class="form-control"  name="age" id="age"type="age" placeholder="Age">
			<x-input-error :messages="$errors->get('age')" class="mt-2" />
            <!-- <input name="age" id="age" class="form-control" placeholder=""  type="age"> -->

          </div>
          <div class="input-box">
            <span class="details">national id</span>
            <!-- <input class="form-control"  name="street" id="street" type="text" placeholder="street"> -->
            <input class="form-control"placeholder="National Code" type="text" name="national_id" id="national_id" max="14">
			<x-input-error :messages="$errors->get('national_id')" class="mt-2" />
        <!-- <input class="form-control" placeholder="National Code" type="national_id" name="national_id" id="national_id" max="14"> -->
          
          </div>
          <div class="input-box">
            <span class="details">phone </span>
        <input name="phone_number" class="form-control" placeholder="Phone Number" type="text" id="phone_number">
		<x-input-error :messages="$errors->get('phone_number')" class="mt-2" />

          
          </div>
          <div class="input-box">
            <!-- <span class="details"> </span> -->
        <!-- <input name="phone_number" class="form-control" placeholder="Phone Number" type="phone_number" id="phone_number"> -->
          </div>

          <div class="input-box">
            <span class="details">bio</span>
            <textarea name="bio" class="form-control "style="width: 640px;height: 100px;" placeholder="Bio" type="text" id="bio"></textarea>
			<x-input-error :messages="$errors->get('bio')" class="mt-2" />
          </div>
          
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" value="male" id="dot-1">
          <input type="radio" name="gender"value="female" id="dot-2">
          <!-- <input type="radio" name="gender" id="dot-3"> -->
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
			<x-input-error :messages="$errors->get('gender')" class="mt-2" />

          <!-- <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label> -->
          </div>
        </div>
        <div class="button">
          <!-- <input type="submit" value="Register"> -->
          <input type="submit" value="Submit" class="btn btn-primary">

        </div>
      </form>
    </div>
  </div>

</body>
</html>
