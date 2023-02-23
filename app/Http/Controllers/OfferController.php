<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Worker;

class OfferController extends Controller
{
    public function index(){
        $users = User::all();
        // dd($users);
        $workers = Worker::all();
        return view('admin.offers.index',['users'=>$users,'workers'=>$workers]);
        // return view('admin.offers.index',['users'=>$users]);
    }

    public function removeUser($id){
       $users= User::findOrFail($id);
      
       $users->update([
         'points' => 0,
       ]);
    //    dd($users);
       return redirect('/offers');
    }

    public function removeWorker($id){
        $workers= Worker::findOrFail($id);
        $workers->update([
          'points' => 0,
        ]);
        return redirect('/offers');
     }

   

//   public function update($service, Request $request)
//   {
// $request->img->storeAs("public/img", $request->img->getClientOriginalName());

    // $Service = Service::findOrFail($service);
    // $Service->update([
    //   'name' => $request->name,
    //   'img'=>$request->img->getClientOriginalName(),

    //   'description' => $request->description,
    // ]);
    // return redirect('/services');
    // dd($service);
//   }
}
