<?php

namespace App\Models;
use App\Models\Worker;
use App\Models\Payment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    protected $fillable = ['service_id', 'worker_id' , 'user_id','status','rate','date','price','desc','review'];

    public function services()
    {
        return $this->belongsTo(Service::class,'service_id');
    }

    public function workers(){
        return $this->belongsTo(Worker::class,'worker_id');
    }

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function payments()
    {
        return $this->hasOne(Payment::class);
    }
}