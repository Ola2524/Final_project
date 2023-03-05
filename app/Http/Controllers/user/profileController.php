<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkerService;
use App\Models\Service;
use App\Models\User;
use App\Models\Worker;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    public function index(){
        $role = Auth::User()->role;
        $jobs = Job :: where('user_id',auth()->user()->id)->get();
        $services = Service::all();
        $workers = WorkerService :: find(1);
        if($role == 'worker'){
            $worker_id = Auth :: user()->workers->id;
            $workers = WorkerService :: where('worker_id',$worker_id)->get();
            $worker_services = WorkerService :: where('worker_id',$worker_id)->where('status','Done')->get();
            $job_counts = count($worker_services);
            $user = 0;
            return view("user.pages-profile",['workers'=>$workers,'job_count'=>$job_counts,'services'=>$services,'user'=>$user]);
        }

        $job_counts = count($jobs);
        $user = 1;
        return view("user.pages-profile",['services'=>$services,'workers'=>$workers,'job_count'=>$job_counts,'user'=>$user]);
    }

    public function show($id){
        $services = Service::all();
        $jobs = Job :: where('worker_id',$id)->where('status','Done')->get();
        $workers = WorkerService :: where('id',$id)->firstOrFail();
        $job_counts = count($jobs);
        $user = 0;
        return view("user.pages-profile",['services'=>$services,'workers'=>$workers,'job_count'=>$job_counts,'user'=>$user]);
    }
}
