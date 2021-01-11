<?php

namespace App\Http\Controllers\Form;

use Illuminate\Http\Request;
use App\Baby;

class BabyController extends Controller
{
    public static function store($request, $guardian){
        $newbabyData = [
            'name' => $request->name ? $request->name : 'unknown',
            'isBorn' => $request->isBorn,
            'birthday' => $request->birthday,
            'weight' => $request->weight,
            'sex' => $request->sex,
        ];

        $baby = new Baby;
        $baby->fill($newbabyData);
        $baby->guardian()->associate($guardian);
        $baby->save();

        return $baby;
    }
}
