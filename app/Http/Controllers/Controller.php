<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /** Para facilitar retornos ao front 
     * @param data array
     * @param message string
     * @param code integer
    */
    protected function response($data, $message, $code){
        return response()->json([
            'Data' => $data,
            'Message' => $message,
            'Code' => $code
        ], $code);
    }
}
