<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\User;
use App\Models\Service;
use Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class WorkerRegistrationController extends Controller
{
    public function create()
    {
      $services = Service :: all();

        return view('workerReg.create',['services'=>$services]);
    }

    public function store(Request $request)
    {
      $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required','min:8'],
        'conf' => ['required'],
        'street'=>['required', 'string', 'max:255'],
        'country'=>['required', 'string', 'max:255'],
        'city'=>['required', 'string', 'max:255'],
        'img' =>[ 'required'],
        'gender'=> ['required'],

        'national_id'=>['required', 'string', 'max:14'],
        'age'=>['required', 'string', 'max:14'],
        'phone_number'=>['required', 'string', 'max:12'],
        'bio'=>['required', 'string', 'max:255']

    ]);
       $input = $request->all();
      //  $request->img->storeAs("public/img", $request->img->getClientOriginalName());

   
      if ($img = $request->file('img')) {
          $destinationPath = 'img/';
          $profileImage = date('YmdHis') . "." . $img->getClientOriginalExtension();
          $img->move($destinationPath, $profileImage);
          $input['img'] = "$profileImage";
      }

       User::create([
        'name' => $input['name'],
        'email' => $input['email'],
        'street' => $input['street'],
        'country' => $input['country'],
        'city' => $input['city'],
        'img'=>$input['img'],
        'bio' => $input['bio'],
        'password' => Hash::make($input['password']),
        'role' => 'worker',
        'gender' => $input['gender'],
      ]);

      $user_id = DB::getPdo()->lastInsertId();
       Worker::create([
        'user_id' => $user_id,
        'national_id'=> $input['national_id'],
        'age'=> $input['age'],
        'phone_number'=> $input['phone_number'],
      ]);


    //   $watchlist = new worker();

    //     //Select the data from visitor 
    //     $record = Worker::table('users')
    //     ->select('name')
    //     ->select('email')
    //     ->select('city')
    //     ->select('bio')
    //     ->where('id',$id)
    //     ->first();

    //     //Insert data from visitor to watchlist
    //     Worker::table('workers')->insert([

    //         'name' => $record->name,
    //         'email' => $record->email,
    //         'city' => $record->city,
    //         'bio' => $record->bio,


    //     ]);
    //     //Delete the data from visitor after shifted
    //     $record->delete();

      $services = Service :: all();
      return redirect('login');
    }
}