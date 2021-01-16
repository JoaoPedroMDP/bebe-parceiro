<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Code extends Model
{
    protected $fillable = [
        'code', 'available'
    ];

    public function owner(){
        return $this->belongsTo(User::class);
    }
}
