<?php

namespace App\Http\Controllers\Form;

use Illuminate\Http\Request;
use App\House;
class HouseController extends Controller
{
    public static function store($request, $address){
        $newHouseData = [
            'house_condition' => $request->house_condition,
            'number_of_rooms' => $request->number_of_rooms
        ];

        $house = new House;
        $house->fill($newHouseData);
        $house->address()->associate($address);
        $house->save();

        return $house;
    }
}
