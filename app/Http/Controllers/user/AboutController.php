<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class AboutController extends Controller
{
    public function index(){
        $services = Service :: all();
        return view('user.about Us',['services'=>$services]);
    }
}
