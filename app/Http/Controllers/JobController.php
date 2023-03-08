<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Job;


class JobController extends Controller
{
    public function index()
    {
        $jobs = DB::table('users')
        ->join('jobs', 'jobs.user_id', '=', 'users.id')
        ->join('services', 'services.id', '=', 'jobs.service_id')
        ->join('workers', 'workers.id', '=', 'jobs.worker_id')
        ->select('jobs.id as id', 'users.name' ,'services.name as service','jobs.rate','jobs.price','jobs.date','jobs.status')
        ->get();

        return view('admin.jobs.jobs', ['jobs' => $jobs]);
    }
    public function search(Request $request){
        {
            $output="";
             
             $users = DB::where('service','like', '%' .$request->search. '%')->orWhere('rate','like', '%' .$request->search. '%')->orWhere('status','like', '%' .$request->search. '%')->get();
    
             foreach($users as $users)
             {
                $output.=
                '<tr>
                <td> '.$users->id.' </td>
                <td> '.$users->service.' </td>
                <td> '.$users->rate.' </td>
                <td> '.$users->price.' </td>
                <td> '.$users->date.' </td>
                <td> '.$users->status.' </td>
               
               
                
                </tr>';
             }
    
             return response($output);
            }
             
     }
}
