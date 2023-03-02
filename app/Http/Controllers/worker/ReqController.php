<?php

namespace App\Http\Controllers\worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class ReqController extends Controller
{
    public function index(){
        $jobs = Job::where('status','pending')->get();
        return view('worker.req.index',['jobs'=>$jobs]);
    }

    public function remove($id){
        $jobs= Job::findOrFail($id);
  
        $jobs->update([
            'status' => 'rejected',
           
          ]);

        return redirect('/req');
     }


     public function add($id){
        $add= Job::findOrFail($id);
  
        $add->update([
            'status' => 'In progress',
           
          ]);

        return redirect('/req');
     }

}
