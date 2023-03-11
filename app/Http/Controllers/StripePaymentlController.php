<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Worker;
use App\Models\Service;
use App\Models\User;
use App\Models\Payment;
use Carbon\Carbon;
use Session;
use Stripe;
use Stripe\Stripe as StripeStripe;

class StripePaymentlController extends Controller
{
    public function stripe($id)
    {
        $services = Service::all();
        $job = Job :: findOrFail($id);
        return view('stripe',['job'=>$job,'services'=>$services]);
    }

    public function stripePost(Request $request,$id)
    {
        $services = Service::all();

        $job = Job::findOrFail($id);
        $profit = ($job->price*20)/100;
        $user = User::findOrFail($job->users->id);
        $worker = Worker::findOrFail($job->workers->id);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            'amount' => ($job->price*100)-($profit*100),
            'currency'=>"usd",
            'source'=> $request->stripeToken,
            'description' =>$job->users->name .' payment for ' . $job->workers->name
        ]);

        Payment::create([
            'profit' => $profit,
            'worker_profit' => ($job->price)-($profit),
            'job_id'=> $job->id,
            'date'=> Carbon::now(),
        ]);

        $user->update([
            'points' => $user->points+1,
          ]);

        $worker->update([
        'points' => $worker->points+1,
        ]);

        $job->update([
        'status' => 'Done',
        ]);

     Session::flash('success','Payment has been successfully');
        return redirect("review-edit/".$id)->with('success','Payment has been successfully');
    }
}