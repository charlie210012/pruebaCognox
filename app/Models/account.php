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

    public function transactionRemove()
    {
        return $this->hasMany(Transaction::class,'account_origin','number');
    }

    public function transactionAdd()
    {
        return $this->hasMany(Transaction::class,'account_final','number');
    }
}
