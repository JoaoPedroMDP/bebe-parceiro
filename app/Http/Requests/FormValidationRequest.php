<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // Guardian data
            'first_name'        => ['required', 'string', 'max:100', 'regex:#^([a-zA-Zà-ù]+\s?)+$#'],
            'last_name'         => ['required', 'string', 'max:200', 'regex:#^([a-zA-Zà-ù]+\s?)+$#'],
            'marital_status'    => ['required', 'in:single,married,divorced,widowed,separated'],
            'child_number'      => ['required', 'integer', 'between:1,30'],
            'deaf'              => ['required', 'boolean'],
            'email'             => ['required', 'email', 'unique:guardians,email', 'max:150'],
            'social_benefits'   => ['required', 'in:cadunico,mcasa_mvida,bolsa_familia,cadastro_emprego,cartao_alimentacao,vale_leite,aposentado'],
            'birthday'          => ['required', 'date_format:d/m/Y'],
            'phone_number'      => ['required', 'string', 'regex:#^(\(?\d{2}\)?\s?)?(\d{4,5}\-?\d{4})$#'],
            'healthcare_plan'   => ['nullable', 'in:cartao_sus,posto_de_saude'],
            'donated'           => ['required', 'integer', 'max:1000'],
            // Baby data
            'name'              => ['nullable', 'regex:#^([a-zA-Zà-ù]+\s?)+$#'],
            'isBorn'            => ['required', 'boolean'],
            'birthday'          => ['required', 'date_format:d/m/Y'],
            'weight'            => ['required', 'numeric', 'max:10'],
            'sex'               => ['required', 'in:male,female,unknown'],
            // Address data
            'cep'               => ['nullable', 'string', 'max:15'],
            'street'            => ['required_without:cep', 'string', 'max:200'],
            'neighborhood'      => ['required_without:cep', 'string', 'max:50'],
            'number'            => ['required', 'integer', 'max:10000'],
            'complement'        => ['required', 'string', 'max:50'],
            // Housing data
            'housing_condition' => ['required', 'in:financed,owner,rented,granted,inherited,social_program,invasion'],
            'number_of_rooms'   => ['required', 'integer', 'max:15'],
        ];
    }
}
