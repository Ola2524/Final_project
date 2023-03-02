<?php

namespace App\Http\Controllers\worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WorkerService;
use App\Models\Worker;
use App\Models\User;
use App\Models\Job;
class WorkerProfileController extends Controller
{
    public function index(){
        $worker = Auth :: User();
        $verified = $worker->workers->criminal_record_certificate!=NULL?$worker->workers->criminal_record_certificate:0;
        $job = Job :: where('worker_id',$worker->workers->id)->get();
        $job_count = count($job); 
        $services = WorkerService :: where('worker_id',$worker->id)->get();
        return view("worker.profile.index",['services' => $services,'verified'=>$verified,'job_count'=>$job_count]);
    }
    
    public function edit($id)
  {
    $worker = User::findOrFail($id);
    return view('worker.profile.edit', ['worker' => $worker]);
  }

  public function update($id, Request $request)
  {
    $request->img->storeAs("public/img", $request->img->getClientOriginalName());

    $worker = User::findOrFail($id);
    $worker->update([
      'bio' => $request->bio,
      'img'=>$request->img->getClientOriginalName(),

    //   'description' => $request->description,
    ]);
    return redirect('/worker-profile');
  }

    public function verify(){
        return view("worker.profile.verify");
    }

    public function verified($worker,Request $request){
        $request->criminal_record_certificate->storeAs("public/files", $request->criminal_record_certificate->getClientOriginalName());
        
        $Worker = Worker::findOrFail($worker);
        $Worker->update([
        'criminal_record_certificate'=>$request->criminal_record_certificate->getClientOriginalName(),
        ]);
        return redirect('/worker-profile');
        }
}
