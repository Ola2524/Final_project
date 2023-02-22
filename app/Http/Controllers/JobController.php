<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Job;


class JobController extends Controller
{
    public function index()
    {
        $jobs = DB::table('users')
        ->join('jobs', 'jobs.user_id', '=', 'users.id')
        ->join('services', 'services.id', '=', 'jobs.service_id')
        ->join('workers', 'workers.id', '=', 'jobs.worker_id')
        ->select('jobs.id as id','workers.name as worker','users.name as user','services.name as service','services.rate','services.price','services.date','jobs.status')
        ->get();

        return view('jobs.jobs', ['jobs' => $jobs]);
    }
}
