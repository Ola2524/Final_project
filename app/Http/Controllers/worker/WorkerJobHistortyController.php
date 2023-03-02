<?php

namespace App\Http\Controllers\worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class WorkerJobHistortyController extends Controller
{
    public function index()
    {
    //   $users = User::all();
    //   return view('worker.jobHistory', ['user' => $users]);
      $users = DB::table('users')
      ->join('jobs', 'jobs.user_id', '=', 'users.id')
      ->join('services', 'services.id', '=', 'jobs.service_id')
      ->join('workers', 'workers.id', '=', 'jobs.worker_id')
      ->select('users.name' ,'services.name as service','jobs.rate','jobs.price','jobs.date','jobs.status')
      ->get();
    //   dd($user);

      return view('worker.jobHistory', ['user' => $users]);
    }

}
