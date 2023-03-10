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
        return view('admin.offers.index',['users'=>$users]);
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

     public function search(Request $request){
      {
          $output="";
           
           $users = User::where('name','like', '%' .$request->search. '%')->orWhere('Role','like', '%' .$request->search. '%')->orWhere('points','like', '%' .$request->search. '%')->get();
  
           foreach($users as $users)
           {
              $output.=
              '<tr>
              <td> '.$users->id.' </td>
              <td> '.$users->name.' </td>
              <td> '.$users->Role.' </td>
              <td> '.$users->points.' </td>
             
             
              
              </tr>';
           }
  
           return response($output);
          }
           
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
