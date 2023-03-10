<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\User;
use App\Models\WorkerService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ServicesController extends Controller
{
    public function index(){
        $services = Service :: all();
        // $users = DB::table('users')
        // ->join('jobs', 'jobs.user_id', '=', 'users.id')
        // ->join('services', 'services.id', '=', 'jobs.service_id')
        // ->join('Worker_Service', 'Worker_Service.id', '=', 'jobs.worker_id')
        // ->select('users.name' ,'users.city','jobs.rate','jobs.date','services.description')
        // ->get();

        $users = DB::table('workers')
        ->join('worker_service', 'worker_service.worker_id', '=', 'workers.id')
        ->join('users', 'users.id', '=', 'workers.user_id')
        ->join('services', 'services.id', '=', 'worker_service.service_id')
        ->select('worker_service.id as id' ,'worker_service.fixed_price','worker_id' ,'users.name as name','services.name as service_name','services.description')
        ->get();

        // $users = WorkerService :: all();

        return view("user.services",['services'=>$services,'user' => $users]);
    }

    public function show($id){
        $services = Service :: all();
        $worker_id=0;
        $role = User::where('id',Auth::user()->id)->first();

        if($role->role=='worker'){
            $worker_id = Auth::user()->workers->id;
        }
        $users = DB::table('workers')
        ->join('worker_service', 'worker_service.worker_id', '=', 'workers.id')
        ->join('users', 'users.id', '=', 'workers.user_id')
        ->join('services', 'services.id', '=', 'worker_service.service_id')
        ->where('worker_service.service_id','=',$id)
        ->where('worker_service.worker_id','!=',$worker_id)
        ->select('worker_service.id as id','worker_service.worker_id as worker_id','users.img as img','worker_service.fixed_price','users.name as name','services.name as service_name','services.description')
        ->get();

        // $users = WorkerService::where('service_id',$id)->get();
        return view("user.services",['services'=>$services,'user' => $users]);
    }




}
