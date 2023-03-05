<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Worker;



class WorkerreqController extends Controller
{
    public function index(){
        $workers = Worker::where('verify',0)->where('criminal_record_certificate','!=','Null')->get();
        
        return view('admin.verification.index',['workers'=>$workers]);
    }

    public function remove($id){
       $workers= Worker::findOrFail($id);


       $workers->update([
        'verify' => -1,
        'criminal_record_certificate' => NULL
      ])

      
      ;


       return redirect('/workerreq');
    }

    public function add($id){
        $add= Worker::findOrFail($id);
  
        $add->update([
            'verify' => 1,
           
          ]);

        return redirect('/workerreq');
     }
 
}
