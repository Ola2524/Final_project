<?php

namespace App\Http\Controllers\worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Worker;
use App\Models\Job;
use Carbon\Carbon;
use App\Models\Payment;
use App\Charts\UserLineChart;
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
        $payments = DB::table('payments')
        ->join('jobs', 'jobs.id', '=', 'payments.job_id')
        ->join('workers', 'jobs.worker_id', '=', 'workers.id')
        ->where('jobs.worker_id',Auth::user()->workers->id)
        ->select('payments.id as id','payments.worker_profit as worker_profit','payments.date as date')
        ->get();
        
        // dd($jobs);
        $profits = 0;
        foreach ($payments as $payment) {
            $profits += $payment->worker_profit;
        }

        $date = new Carbon();
        $month = [
            "Jan"=>0, "Feb"=>0, "Mar"=>0, "Apr"=>0, "May"=>0, "Jun"=>0,
            "Jul"=>0, "Aug"=>0, "Sep"=>0, "Oct"=>0, "Nov"=>0, "Dec"=>0
        ];
        $profits_charts = DB::table('payments')
        ->join('jobs', 'jobs.id', '=', 'payments.job_id')
        ->join('workers', 'jobs.worker_id', '=', 'workers.id')
        ->where('jobs.worker_id',Auth::user()->workers->id)
        ->select('payments.id as id','payments.worker_profit as worker_profit','payments.date as date')
        ->get();
        foreach ($profits_charts as $profits_chart) {
            if ($date->parse($profits_chart->date)->format('M')=='Jan') {
                $month['Jan']+= $profits_chart->worker_profit;
            }else if ($date->parse($profits_chart->date)->format('M')=='Feb') {
                $month['Feb']+= $profits_chart->worker_profit;
            }else if ($date->parse($profits_chart->date)->format('M')=='Mar') {
                $month['Mar']+= $profits_chart->worker_profit;
            }else if ($date->parse($profits_chart->date)->format('M')=='Apr') {
                $month['Apr']+= $profits_chart->worker_profit;
            }else if ($date->parse($profits_chart->date)->format('M')=='May') {
                $month['May']+= $profits_chart->worker_profit;
            }else if ($date->parse($profits_chart->date)->format('M')=='Jun') {
                $month['Jun']+= $profits_chart->worker_profit;
            }else if ($date->parse($profits_chart->date)->format('M')=='Jul') {
                $month['Jul']+= $profits_chart->worker_profit;
            }else if ($date->parse($profits_chart->date)->format('M')=='Aug') {
                $month['Aug']+= $profits_chart->worker_profit;
            }else if ($date->parse($profits_chart->date)->format('M')=='Sep') {
                $month['Sep']+= $profits_chart->worker_profit;
            }else if ($date->parse($profits_chart->date)->format('M')=='Oct') {
                $month['Oct']+= $profits_chart->worker_profit;
            }else if ($date->parse($profits_chart->date)->format('M')=='Nov') {
                $month['Nov']+= $profits_chart->worker_profit;
            }else if ($date->parse($profits_chart->date)->format('M')=='Dec') {
                $month['Dec']+= $profits_chart->worker_profit;
            }
        }

        $chart = new UserLineChart;
  
        $chart->dataset('New User Register Chart', 'line', $month)->options([
                    'fill' => 'true',
                    'borderColor' => '#51C1C0'
                ]);

        return view("worker.index", ['chart'=>$chart->api(),"jobs" => $jobs,"job_count" => $job_count, "profits" => $profits]);
    }

}