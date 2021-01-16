<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FormValidationRequest;

//TODO ESTADO CIVIL NÃO É USADO
//TODO NUMERO DE FILHOS NÃO É USADO
//TODO INVALIDEZ NÃO É USADO
//TODO EMAIL NÃO É USADO


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
        return $this->response($baby, 201);
    }

    public function kitData(){
        //TODO RESPONSÁVEL                  (FORM)
        //TODO ID_CADASTRO                  (FORM)
        //TODO BENEFICIÁRIO                 (FORM) (SE É GESTANTE OU BEBE JÁ NASCIDO)
        //TODO DATA DE NASCIMENTO DO BEBE   (FORM) (PODE SER PREVISÃO)
        //TODO NOME DO BEBÊ                 (FORM)
        //TODO SEXO                         (FORM)
        //TODO TAMANHO DA ROUPA             (FORM) (CASO NÃO TENHA NASCIDO AINDA, OS ADMINS PREENCHEM COM 'RN' OU 'P')
        //TODO NUMERO DE DEVOLVIDAS         (FORM)

        //TODO LIMITE DE ENTREGA        (PREENCHIDO PELOS ADMINISTRADORES)
        //TODO DATA DE ENTREGA          (PREENCHIDO PELOS ADMINISTRADORES)
    }

    public function visitData(){
        //TODO RESPONSÁVEL                  (FORM)
        //TODO CADASTRO                     (FORM) (FK)
        //TODO BENEFICIÁRIO                 (FORM) (SE É GESTANTE OU BEBE JÁ NASCIDO)
        //TODO DATA DE NASCIMENTO DO BEBE   (FORM) (PODE SER PREVISÃO)
        //TODO NOME DO BEBÊ                 (FORM)
        //TODO SEXO                         (FORM)
        //TODO ENDEREÇO                     (FORM)
        //TODO CONTATO                      (FORM) (WHATSAPP...)
        //TODO PONTO DE REFERÊNCIA          (FORM)
        
        //TODO DATA DA VISITA               (PREENCHIDO PELOS ADMINISTRADORES)
        //TODO VISITANTE                    (PREENCHIDO PELOS ADMINISTRADORES) (POUCO USADOS, TALVEZ APENAS MAIS PRA FRENTE)
        //TODO PRÓXIMA VISITA               (PREENCHIDO PELOS ADMINISTRADORES) (POUCO USADOS, TALVEZ APENAS MAIS PRA FRENTE)
    }
}
