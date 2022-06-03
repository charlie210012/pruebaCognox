<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactionsRemove()
    {
        return $this->hasMany(Transaction::class,'account_origin','id');
    }

    public function transactionsAdd()
    {
        return $this->hasMany(Transaction::class,'account_final','id');
    }

    public function otherAccount(){
        return $this->hasOne(registerOther::class);
    }
}
