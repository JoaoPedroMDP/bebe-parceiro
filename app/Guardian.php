<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Baby;
use App\House;

class Guardian extends Model
{
    protected $fillabe = [
        'first_name', 'last_name',
        'needs_contact', 'marital_status', 'child_number',
        'deaf', 'email', 'housing_id',
        'social_benefits', 'birthday', 'phone_number',
        'healthcare_plan', 'donated','received'
    ];

    public function babies(){
        return $this->hasMany(Baby::class);
    }

    public function house(){
        return $this->belongsTo(House::class);
    }
}
