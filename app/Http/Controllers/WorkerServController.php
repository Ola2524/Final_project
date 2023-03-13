<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\WorkerService;

class WorkerServController extends Controller
{
    public function index(){
      $worker_services = WorkerService::all();
      
        return view('admin.worker-services.index',['worker_services'=>$worker_services]);
    }

    public function delete($id){
        WorkerService::findOrFail($id)->delete();
        return redirect('/AdminWorkerserv');
    }

    

}
