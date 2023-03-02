<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\Worker;

class AdminController extends Controller
{
    public function index(){
        $users = User::all();
        $users = count($users);

        $workers = Worker::all();
        $workers_count = count($workers);

        $jobs = DB::table('users')
        ->join('jobs', 'jobs.user_id', '=', 'users.id')
        ->join('services', 'services.id', '=', 'jobs.service_id')
        ->join('workers', 'workers.id', '=', 'jobs.worker_id')
        ->select('jobs.id as id','users.name','services.name as service','jobs.rate','jobs.price','jobs.date','jobs.status')
        ->get();

        // dd($jobs);
        $profits = 0;
        foreach ($jobs as $job) {
            $profits += $job->price;
        }

        $job_count = count($jobs);
        return view("admin.index", ["jobs" => $jobs,"job_count" => $job_count, "profits" => $profits, 'users' => $users, 'workers' => $workers,'workers_count'=>$workers_count]);
    }
}
