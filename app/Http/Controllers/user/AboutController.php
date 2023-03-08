<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\User;

class AboutController extends Controller
{
    public function index(){
        $services = Service :: all();
        $workers = User :: where('role','worker')->get();
        $users = User :: where('role','user')->get();
        $workers_count = count($workers);
        $users_count = count($users);
        $service_count = count($services);
        return view('user.about Us',['services'=>$services,
        'workers_count'=>$workers_count,
        'users_count' => $users_count,
        'service_count' => $service_count
    ]);
    }
}
