<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkerService;
use App\Models\Service;
use App\Models\Job;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\DB;


class ReviewController extends Controller{

public function index()
  {
    $services = Service::all();
    // $jobs = DB::table('users')
    //   ->join('jobs', 'jobs.user_id', '=', 'users.id')
    //   ->join('services', 'services.id', '=', 'jobs.service_id')
    //   ->join('workers', 'workers.id', '=', 'jobs.worker_id')
    //   ->select('users.name' ,'services.name as service','jobs.rate','jobs.price','jobs.date','jobs.status')
    //   ->get();

    $jobs = Job::all();
      // dd($users);

      return view('user.index', ['jobs' => $jobs,'services'=>$services]);
  }

  public function edit($id){
    $services = Service::all();
    $job = Job::findOrFail($id);
    return view('user.Review',['services'=>$services,'job'=>$job]);
  }

  public function update(Request $request,$id)
  {
    $review = $request->review;
    $rate = $request->rate;
    $job = Job::findOrFail($id);
    $jobs = Job::where('worker_id',$job->worker_id)->where('service_id',$job->service_id)->where('status','Done')->get();
    $jobs_num = count($jobs);

    $worker_service = WorkerService::where('worker_id',$job->worker_id)->where('service_id',$job->service_id)->first();
    $job->update([
      'review'=> $review,
      'rate'=> $rate,
    ]);

    $rate = ($worker_service->rate+$rate)/$jobs_num;

    $worker_service->update([
      'rate'=> $rate,
    ]);

    return redirect('homepage')->with('success','Reviewing has been successfully');
  }
}