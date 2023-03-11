<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable= [
        'job_id',
        'date',
        'profit',
        'worker_profit',
      
    ];
 
    public function jobs()
    {
        return $this->belongsTo(Job::class,'job_id');
    }

}