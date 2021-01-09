<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\House;

class Address extends Model
{
    protected $fillable = [
        'street', 'number', 'complement',
        'neighborhood', 'cep'
    ];

    public function house(){
        return $this->hasOne(House::class);
    }
}
