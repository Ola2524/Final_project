<?php

namespace App\Http\Controllers\worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class ReqController extends Controller
{
    public function index(){
        $jobs = Job::where('status','pending')->get();
        return view('worker.req.index',['jobs'=>$jobs]);
    }

    public function remove($id){
        $jobs= Job::findOrFail($id);
  
        $jobs->update([
            'status' => 'rejected',
           
          ]);

        return redirect('/req');
     }


     public function add($id){
        $add= Job::findOrFail($id);
  
        $add->update([
            'status' => 'In progress',
           
          ]);

        return redirect('/req');
     }


     public function search(Request $request){
      {
          $output="";
           
           $users = Job::where('service_id','like', '%' .$request->search. '%')->orWhere('price','like', '%' .$request->search. '%')->get();
  
           foreach($users as $users)
           {
              $output.=
              '<tr>
              <td> '.$users->id.' </td>
              <td> '.$users->name.' </td>
              <td> '.$users->price.' </td>
            
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
