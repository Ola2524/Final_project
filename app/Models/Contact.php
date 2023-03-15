<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Contact extends Model
{
    use HasFactory, SoftDeletes; 

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'user_id'
    ];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
}
