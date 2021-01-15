<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Guardian;
use App\Helpers\Wrapper\Wrapper;

class GuardianController extends Controller
{
    /** Fiz separado pra não poluir a função principal */
    private static function usefulData($request){
        return [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'marital_status' => $request->marital_status,
            'child_number' => $request->child_number,
            'deaf' => $request->deaf,
            'email' => $request->email,
            'social_benefits' => $request->social_benefits,
            'birthday' => $request->birthday,
            'phone_number' => $request->phone_number,
            'healthcare_plan' => $request->healthcare_plan,
            'donated' => $request->donated,
        ];
    }
    
    /** (Fiz separado pra não poluir a função principal) x 2 */
    private static function additionalData($newGuardianData){
        $newGuardianData['needs_contact'] = true;
        $newGuardianData['received'] = 0;
        return $newGuardianData;
    }

    public static function store($request, $house){
        $newGuardianData = self::usefulData($request);
        $newGuardianData = self::additionalData($newGuardianData);

        
        $guardian = new Guardian;
        $guardian->fill($newGuardianData);
        $guardian->house()->associate($house);
        $guardian->save();

        return $guardian; 
    }

    public function index($entries){
        if(is_numeric($entries)){
            $entries = intval($entries);
            $guardians = Guardian::paginate($entries);

            return $this->response(Wrapper::wrapGuardianPagination($guardians), 200);
        }
        // Não desejo expor as verificações para o front. Prefiro fingir que algo deu errado
        return $this->response(null, 500, 'Something went wrong');
    }
}
