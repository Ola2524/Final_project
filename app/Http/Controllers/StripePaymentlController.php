<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Worker;
use App\Models\User;

use Session;
use Stripe;
use Stripe\Stripe as StripeStripe;

class StripePaymentlController extends Controller
{
    public function stripe($id)
    {
        $job = Job :: findOrFail($id);
        return view('stripe',['job'=>$job]);
    }

    public function stripePost(Request $request,$id)
    {

        $job = Job::findOrFail($id);
        $user = User::findOrFail($job->users->id);
        $worker = Worker::findOrFail($job->workers->id);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            'amount' => $job->price*100,
            'currency'=>"usd",
            'source'=> $request->stripeToken,
            'description' =>$job->users->name .' payment for ' . $job->workers->name
        ]);

        $user->update([
            'points' => $user->points+1,
          ]);

          $worker->update([
            'points' => $worker->points+1,
          ]);

     Session::flash('success','Payment has been successfully');
        return back();
    }
}
