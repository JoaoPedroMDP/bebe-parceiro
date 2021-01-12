<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'name'     => ['required', 'string', 'regex:#^(([a-zA-Zà-ùÀ-Ù]+)(\ )?){0,7}$#'],
            'email'    => ['required', 'email'],
            'role'     => ['required', 'string', 'max:100'],
            'password' => ['required', 'string', 'confirmed']
        ];
    }
}
