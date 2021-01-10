<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Address;
use App\Guardian;

class House extends Model
{
    protected $fillable = [
        'housing_condition', 'number_of_rooms'
    ];

    public function address(){
        return $this->belongsTo(Address::class);
    }

    public function dweller(){
        return $this->hasOne(Guardian::class);
    }
}
