<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeInstallment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $hidden = [];

    public function intallments(){
        return $this->hasMany(Installment::class);
    }
}
