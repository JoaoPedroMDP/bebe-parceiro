<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\{Login, Store};
use App\Library\Arrays;
use App\{User, Code};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private function userScopes(User $user){
        switch($user->role){
            case 'Administrator':
                return 'admin';
                break;
            case 'Secretary':
                return 'secre';
                break;
            default:
                break;
        }
    }

    public function login(Login $request){
        if(auth()->attempt($request->validated())){
            $user = auth()->user();
            if($user->token() == ''){
                $token = $user->createToken('Access Token', $this->userScopes($user))->accessToken;
            }else{
                $token = $user->token();
            }
            return $this->response(['Token' => $token], 200, 'Autenticado');
        }
        return $this->response(null, 400, 'Credenciais inválidas');
    }

    public function store(Store $request)
    {
        $newUserData = $request->validated();
        $newUserData['password'] = bcrypt($newUserData['password']);

        $user = User::create($newUserData);
        if($user){
            return $this->response($user, 201, 'Usuário criado!');
        }else{
            //TODO Criar função de logging
            return $this->response(null, 500, 'Erro interno');
        }
    }

    public function createCode(Request $request){
        $codes = $this->generateCodes($request->user(), $request->amount());

        return $this->response(Wrapper::wrapUserCodes($codes), 200, $request->amount .' codigos gerados');
    }
    
    private function generateCodes(User $user, int $amount){
        for( $i = 0 ; $i < $amount ; $i++ ){
            $code = new Code;
            $code->fill([
                'code' => $this->hashCode($user->name, $user->id),
                'available' => true
            ]);
        
            $code->associate($user);
            $code->save();
            $codes[] = $code;
        }

        return $codes;
    }

    private function hashCode(string $name, int $id){
        $upChar  = Arrays::getUpChar();
        $number  = Arrays::getNumber();

        $splittedName = str_split($name);
        $uppercasedSplittedName = strtoupper($splittedName);

        $maskedUid = $id + Codefy::integerFromString(env('HASH_WORD'));

        $firstTrio = rand(0, count($upChar) - 1) . rand(0, count($upChar) - 1) . rand(0, count($number) - 1);
        $secondTrio = rand(0, count($upChar) - 1) . rand(0, count($upChar) - 1) . rand(0, count($number) - 1);

        $newCode = $maskedUid . '-' . $firstTrio . '-' . $secondTrio;

        return $newCode;
    }
}
