<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title> Login </title>
      <link rel="stylesheet" href="{{asset('css/loginStyle.css')}}">
     
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <div class="center">
         <!-- <input type="checkbox" id="show"> -->
         <!-- <label for="show" class="show-btn">View Form</label> -->
         <div class="container">
            <!-- <label for="show" class="close-btn fas fa-times" title="close"></label> -->
            <div class="text"> Login </div>
            <form   action="{{ route('login') }}" class="form-horizontal" method="POST">
                @csrf
               <div class="data">
                  <label>Email</label>
                  <input input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" id="email" class="" type="email" placeholder="Username":value="__('Email')">
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />

                  <!-- <input type="text" required> -->
               </div>
               <div class="data">
                  <label>Password</label>
                  <input id="password" class="form-control"
                                                        type="password"
                                                        name="password"
                                                        required autocomplete="current-password">
                                        <input-label for="password" :value="__('Password')" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
               </div>
               {{-- <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label> --}}
            <span class="forgot-pass">
                  @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            </span>
               <div class="btn">
                  <div class="inner"></div>
                  <button class="">     {{ __('Log in') }}</button>
               </div>
               <div class="signup-link">
                <span class="user-signup">Don't Have an Account? <a href="{{ route('createUser') }}">Create Now !</a></span>

               </div>
            </form>
         </div>
      </div>
   </body>
</html>