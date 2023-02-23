<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;

class ProfileController extends Controller
{
    public function index(){
        // $worker = Worker::findOrFail($id);
        // return view("worker.profile",['worker' => $worker]);
        return view("worker.profile");
    }
}
