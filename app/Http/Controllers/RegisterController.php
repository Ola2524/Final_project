<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\Models\Service;
class RegisterController extends Controller
{
    public function index(){
        $services = Service :: all();
        $jobs = Job::all();
        return view('user.index',['services'=>$services,'jobs'=>$jobs]);
    }

    public function show(){
        $services = Service :: all();
        return view('cards',['services'=>$services]);
    }

    public function create()
    {
        $services = Service :: all();
        return view('contact.create',['services'=>$services]);
    }

    public function store(Request $request)
    {
       $input = $request->all();
       if ($img = $request->file('img')) {
        $destinationPath = 'img/';
        $profileImage = date('YmdHis') . "." . $img->getClientOriginalExtension();
        $img->move($destinationPath, $profileImage);
        $input['img'] = "$profileImage";
    }

       User::create([
        'name' => $input['name'],
        'email' => $input['email'],
        'city' => $input['city'],
        'street' => $input['street'],
        'country' => $input['country'],
        'bio' => $input['bio'],
        'img'=>$input['img'],
        'role'=>'user',
        'password' => Hash::make($input['password'])
      ]);
       $services = Service :: all();
<<<<<<< HEAD
       return redirect('login');
=======
       return redirect('homepage');
>>>>>>> 596334d7d8795aebc4512cda33f42b1fcea2425b
    }
        
    public function login(){
        $services = Service :: all();
        return view('login',['services'=>$services]);
    }
}