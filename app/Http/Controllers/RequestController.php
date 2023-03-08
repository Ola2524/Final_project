<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\WorkerService;
use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index(){
        $services = Service :: all();
        // $users = DB::table('users')
        // ->join('jobs', 'jobs.user_id', '=', 'users.id')
        // ->join('services', 'services.id', '=', 'jobs.service_id')
        // ->join('Worker_Service', 'Worker_Service.id', '=', 'jobs.worker_id')
        // ->select('users.name' ,'users.city','jobs.rate','jobs.date','services.description','services.name as service_name','worker_service.fixed_price as fixed_price','users.id','jobs.status')
        // ->get('');

        $users = Job:: where('user_id',Auth::user()->id)->get();
        // $users = DB::table('workers')
        // ->join('worker_service', 'worker_service.worker_id', '=', 'workers.id')
        // ->join('users', 'users.id', '=', 'workers.user_id')
        // ->join('services', 'services.id', '=', 'worker_service.service_id')
        // ->where('users.role','=','worker')
        // ->select('worker_service.id as id' ,'worker_service.fixed_price','worker_id' ,'users.name as name','services.name as service_name','services.description')
        // ->get();

        // $users = WorkerService :: all();

        return view("user.request",['services'=>$services,'user' => $users]);
    }

    public function show($id){
        $services = Service :: all();
        $users = Job:: where('user_id',Auth::user()->id)->get();
        // $users = WorkerService::where('service_id',$id)->get();
        return view("user.request",['services'=>$services,'user' => $users]);
    }
}
