<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class Cep{
    private static $baseUrl = 'https://viacep.com.br/ws/?/json/';

    private static function request($cep){
        $url = str_replace('?', $cep, self::$baseUrl);

        $rawResponse = Http::get($url);
        $decoded = json_decode($rawResponse);

        return $decoded;
    }

    public static function get($cep){
        $response = self::request($cep);

        if(isset($response) && !isset($response->erro)){
            $usefulData = [
                'street' => $response->logradouro,
                'neighborhood' => $response->bairro
            ];
            return $usefulData;
        }else{
            return null;
        }

    }
}