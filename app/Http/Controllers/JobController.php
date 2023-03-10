<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->paginate(5);

        return view('admin.jobs.jobs', ['jobs' => $jobs]);
    }
    public function search(Request $request){
        {
            $output="";
             $user=User::where("name",$request->search)->first();
             $user_id= $user?$user['id']:0;
             $worker=User::where("name",$request->search)->where("role","worker")->first();
             $worker_id= $worker?$worker->workers['id']:0;
            //   dd($user_id);
             $data = Job::where('status','like', '%' .$request->search. '%')->orWhere('rate','like', '%' .$request->search. '%')->orWhere('user_id',$user_id)->orWhere('worker_id',$worker_id)->get();
    // dd($data);
             foreach($data as $item)
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
             
     }
}
