<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//...
use Chatify\Facades\ChatifyMessenger as Chatify; // instead of this (remove it)

class MessagesController extends Controller
{
    public function index(){
        return view('/chatify');
    }
}
