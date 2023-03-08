<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkerService;

class AdminWorkerServController extends Controller
{
    public function index(){
        $worker_services = WorkerService::all();
          return view('worker.worker-services.index',['worker_services'=>$worker_services]);
      }
  
      public function delete($id){
          WorkerService::findOrFail($id)->delete();
          return redirect('/workers-services');
      }
  
}
