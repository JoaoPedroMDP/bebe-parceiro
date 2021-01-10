<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormValidationRequest;
class FormController extends Controller
{
    public function store(FormValidationRequest $request){
        $address = AddressController::store($request);
        if(!$address){
            return $this->response(null, 'Houve um erro ao armazenar o endereço, Por favor, revise os dados inseridos', 400);
        }

        $house = HouseController::store($request, $address);
        if(!$house){
            return $this->response(null, 'Houve um erro ao armazenar os dados da sua casa, Por favor, revise-os', 400);
        }

        $guardian = GuardianController::store($request, $house);
        if(!$guardian){
            return $this->response(null, 'Houve um erro ao armazenar seus dadis, Por favor, revise-os', 400);
        }

        // $baby = BabyController::store($request);
        // if(!$baby){
        //     return $this->response(null, 'Houve um erro ao armazenar os dados de seu bebê, Por favor, revise-os', 400);
        // }

        return $this->response(null, 'Sucesso', 201);
    }
}
