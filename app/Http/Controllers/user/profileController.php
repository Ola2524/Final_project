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

        $reviews = [];

        $workers = WorkerService :: find(1);
        if($role == 'worker'){
            $reviews = Job :: where('worker_id',Auth::user()->workers->id)->get();
            $worker_id = Auth :: user()->workers->id;
            $workers = WorkerService :: where('worker_id',$worker_id)->firstOrFail();
            // $worker_services = WorkerService :: where('worker_id',$worker_id)->get();
            $jobs = Job :: where('worker_id',$worker_id)->where('status','Done')->get();

            $job_counts = count($jobs);
            $user = 0;
            return view("user.pages-profile",['workers'=>$workers,'job_count'=>$job_counts,'services'=>$services,'user'=>$user,'reviews'=>$reviews]);
        }

        $job_counts = count($jobs);
        $user = 1;
        return view("user.pages-profile",['services'=>$services,'workers'=>$workers,'job_count'=>$job_counts,'user'=>$user,'reviews'=>$reviews]);
    }

    public function show($id){
        $services = Service::all();
        $reviews = Job :: where('worker_id',$id)->where('status','Done')->get();

        $jobs = Job :: where('worker_id',$id)->where('status','Done')->get();
        $workers = Worker :: find($id);
        // dd($workers);
        $job_counts = count($jobs);
        $user = 0;
        return view("user.pages-profile",['services'=>$services,'workers'=>$workers,'job_count'=>$job_counts,'user'=>$user,'reviews'=>$reviews]);
    }
}
