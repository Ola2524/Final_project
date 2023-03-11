<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\Worker;
use App\Models\Payment;
use Carbon\Carbon;
use App\Charts\UserLineChart;

class AdminController extends Controller
{
    public function index(){
        $users = User::where('role','!=','worker')->get();
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

        $payments = Payment :: all("profit");
        // dd($jobs);
        $profits = 0;
        foreach ($payments as $payment) {
            $profits += $payment->profit;
        }

        $job_count = count($job);

        // chart
        $date = new Carbon();
        $month = [
            "Jan"=>0, "Feb"=>0, "Mar"=>0, "Apr"=>0, "May"=>0, "Jun"=>0,
            "Jul"=>0, "Aug"=>0, "Sep"=>0, "Oct"=>0, "Nov"=>0, "Dec"=>0
        ];
        $profits_charts = Payment :: all();
        foreach ($profits_charts as $profits_chart) {
            if ($date->parse($profits_chart->date)->format('M')=='Jan') {
                $month['Jan']+= $profits_chart->profit;
            }else if ($date->parse($profits_chart->date)->format('M')=='Feb') {
                $month['Feb']+= $profits_chart->profit;
            }else if ($date->parse($profits_chart->date)->format('M')=='Mar') {
                $month['Mar']+= $profits_chart->profit;
            }else if ($date->parse($profits_chart->date)->format('M')=='Apr') {
                $month['Apr']+= $profits_chart->profit;
            }else if ($date->parse($profits_chart->date)->format('M')=='May') {
                $month['May']+= $profits_chart->profit;
            }else if ($date->parse($profits_chart->date)->format('M')=='Jun') {
                $month['Jun']+= $profits_chart->profit;
            }else if ($date->parse($profits_chart->date)->format('M')=='Jul') {
                $month['Jul']+= $profits_chart->profit;
            }else if ($date->parse($profits_chart->date)->format('M')=='Aug') {
                $month['Aug']+= $profits_chart->profit;
            }else if ($date->parse($profits_chart->date)->format('M')=='Sep') {
                $month['Sep']+= $profits_chart->profit;
            }else if ($date->parse($profits_chart->date)->format('M')=='Oct') {
                $month['Oct']+= $profits_chart->profit;
            }else if ($date->parse($profits_chart->date)->format('M')=='Nov') {
                $month['Nov']+= $profits_chart->profit;
            }else if ($date->parse($profits_chart->date)->format('M')=='Dec') {
                $month['Dec']+= $profits_chart->profit;
            }
        }

        $chart = new UserLineChart;
  
        $chart->dataset('New User Register Chart', 'line', $month)->options([
                    'fill' => 'true',
                    'borderColor' => '#51C1C0'
                ]);

        return view("admin.index", ['chart'=>$chart->api(),"jobs" => $jobs,"job_count" => $job_count, "profits" => $profits, 'users' => $users, 'workers' => $workers,'workers_count'=>$workers_count]);
    }
}