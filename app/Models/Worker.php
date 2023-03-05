<?php

namespace App\Models;
use App\Models\User;
use App\Models\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Worker extends Model
{
    use HasFactory;
    protected $fillable = ['national_id','name', 'img', 'phone_number', 'email','age','city','country','street','points','bio','criminal_record_certificate','user_id','verify'];
    
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function worker_service()
    {
        return $this->hasOne(WorkerService::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
