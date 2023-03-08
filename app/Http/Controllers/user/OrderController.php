<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\WorkerService;
use App\Models\Job;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function create($id){
        $services = Service :: all();
        $worker_services = WorkerService :: findOrFail($id);
        return view('user.order',['services'=>$services,'worker_services'=>$worker_services]);
    }

    public function store(Request $request){

        // $request->validate([
        //     'price' => 'required',
        //     'desc' => 'required|min:10',
        //     'date' => 'required',
        // ]);

        $user_id = $request->user_id;
        $worker_id = $request->worker_id;
        $service_id = $request->service_id;
        $price = $request->price;
        $date = $request->date;
        $status = $request->status;
        $desc = $request->desc;

        $job = Job::create([
        'user_id' => $user_id,
        'worker_id' => $worker_id,
        'service_id' => $service_id,
        'price' => $price,
        'date' => $date,
        'status' => $status,
        'desc' => $desc,
        ]);

        $services = Service :: all();
        $users = DB::table('workers')
        ->join('worker_service', 'worker_service.worker_id', '=', 'workers.id')
        ->join('users', 'users.id', '=', 'workers.user_id')
        ->join('services', 'services.id', '=', 'worker_service.service_id')
        ->select('worker_service.id as id','worker_service.worker_id','worker_service.fixed_price','users.name as name','services.name as service_name','services.description')
        ->get();

        $success = 1;
        return redirect('homepage')->with('success',$success);
    }

    public function show($id){
        $job = Job :: findOrFail($id);
        return view('worker.order-details',['job'=>$job]);
    }
}
