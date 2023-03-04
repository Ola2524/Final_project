<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ContactController extends Controller
{
    public function index(){
        $services = Service :: all();
        return view('user.contact Us',['services'=>$services]);
    }
}
