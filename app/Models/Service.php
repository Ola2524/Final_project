<?php

namespace App\Models;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable= [
        'name',
        'description',
        'img',
      
    ];

    // public function workers()
    // {
    //     return $this->hasMany(Worker::class,'worker_service');
    // }

    public function worker_service()
    {
        return $this->belongsToMany(Worker::class,"worker_service");
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
