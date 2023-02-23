<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\WorkerController;
class Worker extends Model
{
    use HasFactory;
    protected $fillable = ['national_id','name', 'img', 'phone_number', 'email','age','city','country','street','points'];
}
