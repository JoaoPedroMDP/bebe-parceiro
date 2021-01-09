<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Guardian;

class Baby extends Model
{
    protected $fillable = [
        'name', 'isBorn', 'birthday',
        'weight', 'sex', 'guardian_id'
    ];

    public function guardian(){
        return $this->belongsTo(Guardian::class);
    }
}