<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Address;
use App\Helpers\Cep;

class AddressController extends Controller
{
    /** Função interna, acessada apenas pelo back-end */
    public static function store($request){
        $newAddressData = [
            'number'       => $request->number,
            'complement'   => $request->complement
        ];

        if($request->has('cep')){
            $newAddressData['cep'] = $request->cep;
            $cepData = Cep::get($request->cep);
            if(isset($cepData)){
                $newAddressData['street'] = $cepData['street'];
                $newAddressData['neighborhood'] = $cepData['neighborhood'];
            }else{
                // Como a pessoa não envia rua e bairro se enviar cep, nao podemos completar a criação do endereço
                return null;
            }
        }else{
            $newAddressData['street'] = $request->street;
            $newAddressData['neighborhood'] = $request->neighborhood;
        }
        $address = new Address;
        $address->fill($newAddressData);
        $address->save();
        
        return $address;
    }
}
