<?php

namespace App\Http\Controllers\Form;

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
            $address->delete();
            return $this->response(null, 'Houve um erro ao armazenar os dados da sua casa, Por favor, revise-os', 400);
        }
        
        $guardian = GuardianController::store($request, $house);
        if(!$guardian){
            $address->delete();
            return $this->response(null, 'Houve um erro ao armazenar seus dados, Por favor, revise-os', 400);
        }
        
        $baby = BabyController::store($request, $guardian);
        if(!$baby){
            $address->delete();
            return $this->response(null, 'Houve um erro ao armazenar os dados de seu bebê, Por favor, revise-os', 400);
        }
        return $this->response($baby, 'Sucesso', 201);
    }
}
