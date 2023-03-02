<?php

namespace App\Http\Controllers\worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Worker;
use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WorkerdashbordController extends Controller
{
    public function index(){

        $worker = Auth :: User()->workers;
        $worker_jobs = Job :: where('worker_id',$worker->id)->get();
        $job_count  = count($worker_jobs);

        // $users = 0;
        // for($i=0; $i < count($worker_jobs);$i++){
        //     if($worker_jobs["id"] != $worker_jobs["id"]){
        //         $users++;
        //     }
        // }
        // foreach ($worker_jobs as $job) {
        //     if($job->id != $job)
        //     $users++;
        // }
        $jobs = DB::table('users')
        ->join('jobs', 'jobs.user_id', '=', 'users.id')
        ->join('services', 'services.id', '=', 'jobs.service_id')
        ->join('workers', 'workers.id', '=', 'jobs.worker_id')
        ->select('jobs.id as id','users.name','services.name as service','jobs.rate','jobs.price','jobs.date','jobs.status')
        ->get();

        // dd($jobs);
        $profits = 0;
        foreach ($worker_jobs as $job) {
            $profits += $job->price;
        }
        return view("worker.index", ["jobs" => $jobs,"job_count" => $job_count, "profits" => $profits]);
    }

}
