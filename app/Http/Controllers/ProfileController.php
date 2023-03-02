<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(){
        // $worker = Worker::findOrFail($id);
        // return view("worker.profile",['worker' => $worker]);
        // $worker = Auth::User();
        // $worker = User::find(1)->bio;
        // $worker = Auth::User()->workers();
        // dd($worker);
        return view("worker.profile");
    }

    public function create(){
        return view("worker.verify");
    }

    public function store(){
        
    }
}
