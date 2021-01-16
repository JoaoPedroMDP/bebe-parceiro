<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Baby;

class BabyController extends Controller
{
    public static function store($request, $guardian){
        $newbabyData = [
            'name' => $request->name,
            'isBorn' => $request->isBorn,
            'birthday' => $request->birthday,
            'weight' => $request->weight,
            'sex' => $request->sex,
            'clothing_size' => $request->clothing_size
        ];

        $baby = new Baby;
        $baby->fill($newbabyData);
        $baby->guardian()->associate($guardian);
        $baby->save();

        return $baby;
    }
}
