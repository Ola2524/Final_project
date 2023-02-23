<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class OfferController extends Controller
{
    public function index(){
        $users = User::all();
        // dd($users);
        // $workers = Worker::all();
        // return view('offers.index',['users'=>$users,'workers'=>$workers]);
        return view('admin.offers.index',['users'=>$users]);
    }

    public function remove($id){
       $users= User::findOrFail($id);
      
       $users->update([
         'points' => 0,
        //  'img'=>$request->img->getClientOriginalName(),
   
        //  'description' => $request->description,
       ]);
    //    dd($users);
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
