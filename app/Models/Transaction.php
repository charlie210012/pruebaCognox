<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function account()
    {
        return $this->belongsTo(account::class,'id','account_origin');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_origin','id');
    }



}
