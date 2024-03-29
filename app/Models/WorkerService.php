<?php

namespace App\Models;
use App\Models\Worker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkerService extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'worker_service';
    protected $fillable = ['service_id', 'worker_id','fixed_price','rate'];

    public function services()
    {
        return $this->belongsTo(Service::class,'service_id');
    }

    public function workers(){
        return $this->belongsTo(Worker::class,'worker_id');
    }
}
