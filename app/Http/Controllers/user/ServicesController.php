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
    // public function mount($worker_services){
    //     $this->worker_services=$worker_services;
    // }
//     public $priceInput;
//     protected $queryString=[
//         'priceInput' => ['except' => '', 'as'=>'price'],
//     ];
//     public function render(){
//         $services=WorkerService::where('fixed_price',$this->worker_services->fixed_price)
//         ->when($this->priceInput,function($q){
// $q->when($this->priceInput== 'high-to-low',function($q2){
//     $q2->orderBy('fixed_price');
//         })
//         ->when($this->priceInput== 'low-to-high',function($q2){
//             $q2->orderBy('fixed_price');
//         });
//         })->get();
public function desc(){
    $worker_services = WorkerService::all()->orderBy('fixed_price','DESC')->get();
    $output="";
    foreach($worker_services as $item)
             {
                $output.=
                '<tr>
                <td> '.$item->id.' </td>
                <td> '.$item->workers->users->name.' </td>
                <td> '.$item->users->name.' </td>
                <td> '.$item->services->name.' </td>
                <td> '.$item->rate.' </td>
                <td> '.$item->price.' </td>
                <td> '.$item->date.' </td>';
               if($item->status  == "In progress")
                $output .='<td><div class="badge bg-warning">'.$item->status.'</div></td>';
               
                elseif($item->status  == "Pending")
                $output .='<td><div class="badge bg-secondary">'.$item->status.'</div></td>';
                
                elseif($item->status  == "Done")
                $output .='<td><div class="badge bg-success ms-1 me-1 ps-2 pe-2">'.$item->status.'</div></td>';
                $output .="</tr>";
    
              
             }
    
             return response($output);
}

public function asc(){
    $worker_services = WorkerService::all()->orderBy('fixed_price','ASC')->get();
     $output="";
    foreach($worker_services as $item)
             {
                $output.=
                '<tr>
                <td> '.$item->id.' </td>
                <td> '.$item->workers->users->name.' </td>
                <td> '.$item->users->name.' </td>
                <td> '.$item->services->name.' </td>
                <td> '.$item->rate.' </td>
                <td> '.$item->price.' </td>
                <td> '.$item->date.' </td>';
               if($item->status  == "In progress")
                $output .='<td><div class="badge bg-warning">'.$item->status.'</div></td>';
               
                elseif($item->status  == "Pending")
                $output .='<td><div class="badge bg-secondary">'.$item->status.'</div></td>';
                
                elseif($item->status  == "Done")
                $output .='<td><div class="badge bg-success ms-1 me-1 ps-2 pe-2">'.$item->status.'</div></td>';
                $output .="</tr>";
    
              
             }
    
             return response($output);
}
        
    // }
    public function index(){
        $services = Service :: all();
        $service = Service::findOrFail(1);

        // $users = DB::table('users')
        // ->join('jobs', 'jobs.user_id', '=', 'users.id')
        // ->join('services', 'services.id', '=', 'jobs.service_id')
        // ->join('Worker_Service', 'Worker_Service.id', '=', 'jobs.worker_id')
        // ->select('users.name' ,'users.city','jobs.rate','jobs.date','services.description')
        // ->get();

        // $users = DB::table('workers')
        // ->join('worker_service', 'worker_service.worker_id', '=', 'workers.id')
        // ->join('users', 'users.id', '=', 'workers.user_id')
        // ->join('services', 'services.id', '=', 'worker_service.service_id')
        // ->select('worker_service.id as id','worker_service.rate as rate','worker_service.fixed_price','worker_id','users.img as img','users.name as name','services.name as service_name','services.description')
        // ->get();
        $users=$service->worker_service;
        foreach($users as $item){
            $price=WorkerService::where("service_id",$id)->where("worker_id",$item->id)->first();
            // $item =$item->users;
            $item->fixed_price=$price;
        }
        // $users = WorkerService :: all();

        return view("user.services",['services'=>$services,'user' => $users,'service'=>$service]);
    }

    public function show($id){
        $services = Service :: all();
        $service = Service::findOrFail($id);

        $worker_id=0;
        $role = User::where('id',Auth::user()->id)->first();

        if($role->role=='worker'){
            $worker_id = Auth::user()->workers->id;
        }
        // $users = DB::table('workers')
        // ->join('worker_service', 'worker_service.worker_id', '=', 'workers.id')
        // ->join('users', 'users.id', '=', 'workers.user_id')
        // ->join('services', 'services.id', '=', 'worker_service.service_id')
        // ->where('worker_service.service_id','=',$id)
        // ->where('worker_service.worker_id','!=',$worker_id)
        // ->select('worker_service.id as id','worker_service.rate as rate','worker_service.worker_id as worker_id','users.img as img','worker_service.fixed_price','users.name as name','services.name as service_name','services.description')
        // ->get();
        $users=$service->worker_service;
        foreach($users as $item){
            $price=WorkerService::where("service_id",$id)->where("worker_id",$item->id)->first();
            // $item =$item->users;
            $item->fixed_price=$price;
        }

    //    dd($users);
        // $users = WorkerService::where('service_id',$id)->get();
        return view("user.services",['services'=>$services,'user' => $users,'service'=>$service,'id'=>$id]);
    }




}