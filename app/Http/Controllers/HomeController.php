<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Job;
use App\Models\User;
use App\Models\Worker;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request){
        // $user = User::where('email',$request['email'])->first();
        // $request->session()->put('user', $user);

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        $credentials = array('email'=>$request->get('email'),'password'=>$request->get('password'));

        if (Auth::attempt($credentials)) {
            $request->session()->put('user', $credentials);
            $role = Auth::User()->role;


            return redirect()->intended('homepage');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

        
        $role = Auth::User()->role;
        $services = Service::all();
        if ($role == 'admin'){
            $users = User::all();
        $users = count($users);

        $workers = Worker::all();
        $workers_count = count($workers);

        // $jobs = DB::table('users')
        // ->join('jobs', 'jobs.user_id', '=', 'users.id')
        // ->join('services', 'services.id', '=', 'jobs.service_id')
        // ->join('workers', 'workers.id', '=', 'jobs.worker_id')
        // ->select('jobs.id as id','users.name','services.name as service','jobs.rate','jobs.price','jobs.date','jobs.status')
        // ->get();
        $jobs = Job :: all();

        // dd($jobs);

        // dd($jobs);
        $profits = 0;
        foreach ($jobs as $job) {
            $profits += $job->price;
        }

        $job_count = count($jobs);
                // chart
                $profits_chart = Job::where('status','Done')->get('price');
  
                $chart = new UserLineChart;
          
                $chart->dataset('New User Register Chart', 'line', $profits_chart)->options([
                            'fill' => 'true',
                            'borderColor' => '#51C1C0'
                        ]);

        return view("admin.index", ['chart'=>$chart->api(),"jobs" => $jobs,"job_count" => $job_count, "profits" => $profits, 'users' => $users, 'workers' => $workers,'workers_count'=>$workers_count]);
        }
        elseif($role == 'worker'){
            
            
        $worker = Auth :: User()->workers;
        $worker_jobs = Job :: where('worker_id',$worker->id)->get();
        $job_count  = count($worker_jobs);

        // $users = 0;
        // for($i=0; $i < count($worker_jobs);$i++){
        //     if($worker_jobs["id"] != $worker_jobs["id"]){
        //         $users++;
        //     }
        // }
        // foreach ($worker_jobs as $job) {
        //     if($job->id != $job)
        //     $users++;
        // }
        $jobs = DB::table('users')
        ->join('jobs', 'jobs.user_id', '=', 'users.id')
        ->join('services', 'services.id', '=', 'jobs.service_id')
        ->join('workers', 'workers.id', '=', 'jobs.worker_id')
        ->select('jobs.id as id','users.name','services.name as service','jobs.rate','jobs.price','jobs.date','jobs.status')
        ->get();

        // dd($jobs);
        $profits = 0;
        foreach ($worker_jobs as $job) {
            $profits += $job->price;
        }
            return view('worker.index', ["jobs" => $jobs,"job_count" => $job_count, "profits" => $profits]);
        }
        else{
            $jobs = Job::all();
            return view('user.index',['services'=>$services,'jobs'=>$jobs]);
        }  
        // $services = Service::all();
        // return view('user.index',['services'=>$services]);
    }

    // public function homePage(){
    //     $services = Service :: all();
    //     return view('user.index',['services'=>$services]);
    // }


}