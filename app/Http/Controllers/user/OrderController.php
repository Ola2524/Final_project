<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\WorkerService;
use App\Models\Job;
use App\Models\Worker;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function create($id,$worker_id){
    //    dd($worker_id);
    
        $service= Service :: find($id);
        $workers=Worker::find($worker_id);
        $services = Service :: all();
        return view('user.order',['workers'=>$workers,'service'=>$service,'services'=>$services]);
    }

    public function store(Request $request){

        $request->validate([
            'price' => 'required',
            'desc' => 'required|min:10',
            'date' => 'required',
        ]);

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

        return redirect('homepage')->with('success','Your order has been done successfully');
    }

    public function show($id){
        $job = Job :: findOrFail($id);
        return view('worker.order-details',['job'=>$job]);
    }
}