<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Guardian;

class Baby extends Model
{
    protected $fillable = [
        'name', 'isBorn', 'birthday',
        'weight', 'sex', 'parent_id'
    ];

    public function parent(){
        return $this->belongsTo(Guardian::class);
    }
}
