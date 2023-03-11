<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WorkerProfitsController extends Controller
{
    public function index(){
        // $jobs = Job :: where('worker_id',Auth::user()->workers->id)->get();
        // $jobs_id = [];
        // foreach ($jobs as $job) {
        //     $pay = Payment :: where('job_id',$job->id)->first();
        //     $payment = $pay?$job['id']:0;
        //     array_push($jobs_id,$payment);

        //     // array_push($payments,Payment::where('job_id',$jobs_id)->get());
            
        // }
        $payments = DB::table('payments')
        ->join('jobs', 'jobs.id', '=', 'payments.job_id')
        ->join('users', 'jobs.user_id', '=', 'users.id')
        ->join('services', 'jobs.service_id', '=', 'services.id')
        ->join('workers', 'jobs.worker_id', '=', 'workers.id')
        ->where('jobs.worker_id',Auth::user()->workers->id)
        ->select('payments.id as id','payments.worker_profit as profit','payments.date as date','users.name as user_name','services.name as service_name')
        ->get();

        
        return view("worker.profits.index",['payments'=>$payments]);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 596334d7d8795aebc4512cda33f42b1fcea2425b
