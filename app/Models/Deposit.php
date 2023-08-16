<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function type_deposits(){
        return $this->belongsTo(TypeDeposit::class,'type_deposit_id');
    }
}
