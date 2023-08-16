<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDeposit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $hidden = [];

    public function deposits(){
        return $this->hasMany(Deposit::class);
    }    
}
