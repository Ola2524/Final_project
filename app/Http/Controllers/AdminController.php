<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\Worker;
use App\Charts\UserLineChart;

class AdminController extends Controller
{
    public function index(){
        $users = User::all();
        $users = count($users);

        $workers = Worker::all()->take(5);
        $worker = Worker::all();
        $workers_count = count($worker);

        // $jobs = DB::table('users')
        // ->join('jobs', 'jobs.user_id', '=', 'users.id')
        // ->join('services', 'services.id', '=', 'jobs.service_id')
        // ->join('workers', 'workers.id', '=', 'jobs.worker_id')
        // ->select('jobs.id as id','users.name','services.name as service','jobs.rate','jobs.price','jobs.date','jobs.status')
        // ->get();
        $jobs = Job :: all()->take(5);
        $job = Job :: where('status','Done')->get();

        // dd($jobs);
        $profits = 0;
        foreach ($job as $j) {
            $profits += $j->price;
        }

        $job_count = count($jobs);

        // chart
        $profits_chart = Job::where('status','Done')->get('price');
  
        $chart = new UserLineChart;
  
        $chart->dataset('New User Register Chart', 'line', $profits_chart)->options([
                    'fill' => 'true',
                    'borderColor' => '#51C1C0'
                ]);

        return view("admin.index", ['chart'=>$chart->api(),"jobs" => $jobs,"job_count" => $job_count, "profits" => $profits, 'users' => $users, 'workers' => $workers,'workers_count'=>$workers_count]);
    }
}
