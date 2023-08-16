<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Matcher\Type;

class Installment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $hidden = [];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function loans(){
        return $this->belongsTo(Loan::class,'loan_id');
    }

    public function type_installments(){
        return $this->belongsTo(TypeInstallment::class,'type_installment_id');
    }
}
