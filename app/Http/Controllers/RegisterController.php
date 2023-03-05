<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\Models\Service;
class RegisterController extends Controller
{
    public function index(){
        $services = Service :: all();
        return view('user.index',['services'=>$services]);
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
       $request->img->storeAs("public/img", $request->img->getClientOriginalName());

       User::create([
        'name' => $input['name'],
        'email' => $input['email'],
        'city' => $input['city'],
        'street' => $input['street'],
        'country' => $input['country'],
        'bio' => $input['bio'],
        'img'=>$request->img->getClientOriginalName(),
        'password' => Hash::make($input['password'])
      ]);
       return view('login');
    }
        

}
