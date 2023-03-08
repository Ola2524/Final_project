<?php

namespace App\Http\Controllers\worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\WorkerService;

class WorkerServiceController extends Controller
{
    public function index(){
        $services = WorkerService::all();
        return view("worker.services.services",['services'=>$services]);
    }

    public function create(){
        $services = Service::all();
        return view("worker.services.create",['services'=>$services]);
    }

    

  public function store(Request $request)
  {
    $service_id = $request->service_id;
    $worker_id = $request->worker_id;
    $price = $request->price;
    $service = WorkerService::create([
      'service_id' => $service_id,
      'worker_id' => $worker_id,
      'fixed_price'=> $price
    ]);
    return redirect('/worker-services');
  }

  public function edit($service)
  {
    $services = Service::all();
    $Service = WorkerService::findOrFail($service);
    return view('worker.services.edit', ['service' => $Service,'services' => $services]);
  }

  public function update($service, Request $request)
  {
    $Service = WorkerService::findOrFail($service);
    $Service->update([
      'service_id' => $request->service_id,
      'fixed_price' => $request->price,
    ]);
    return redirect('/worker-services');
  }


  public function destroy($service)
  {
    WorkerService::findOrFail($service)->delete();
    return redirect('/worker-services');
  }

  public function search(Request $request){
    {
        $output="";
         
         $users = Service::where('name','like', '%' .$request->search. '%')->orWhere('description','like', '%' .$request->search. '%')->get();

         foreach($users as $users)
         {
            $output.=
            '<tr>
            <td> '.$users->id.' </td>
            <td> '.$users->name.' </td>
            <td> '.$users->description.' </td>
          
            <td>
             '.' 
            <a href="" class="btn btn-outline-success">'.'Edit</a>
            '.'
            <a href="" class="btn btn-outline-success">'.'Delete</a>
            '.' </td>
            
            </tr>';
         }

         return response($output);
        }
         
 }



}
