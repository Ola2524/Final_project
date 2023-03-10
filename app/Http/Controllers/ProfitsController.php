<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use App\Models\Worker;
use App\Models\Job;
use App\Models\Service;

class ProfitsController extends Controller
{
    public function index(){
        $payments = Payment :: all();
        return view("admin.profits.index",['payments'=>$payments]);
    }

    public function search(Request $request){
        {
            $output="";
            $user=User::where("name",$request->search)->first();
            $user_id= $user?$user['id']:0;
            $worker=User::where("name",$request->search)->where("role","worker")->first();
            $worker_id= $worker?$worker->workers['id']:0;
            $service = Service::where("name",$request->search)->first();
            $service_id= $service?$service['id']:0;

            $users = Payment::Where('profit','like', '%' .$request->search. '%')->get();

             foreach($users as $users)
             {
                $output.=
                '<tr>
                <td> '.$users->id.' </td>
                <td> '.$users->users->name.' </td>
                <td> <img src="img/'.$users->workers->users['name'] .'" width="75"> </td>
    
                <td> '.$users->services['name'].' </td>
                <td> '.$users['price'].' </td>
                <td> '.$users['date'].' </td>
                
                </tr>';
             }
    
             return response($output);
            }
             return redirect("profits");
     }
}
