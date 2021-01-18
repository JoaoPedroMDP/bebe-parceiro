<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Wrapper\Wrapper;
use App\Http\Controllers\Controller;
use App\Http\Requests\{Login, Store};
use App\Library\{Enumerables, Codefy};
use App\{User, Code};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private function userScopes(User $user){
        return $user->role;
    }

    public function login(Login $request){
        if(auth()->attempt($request->validated())){
            $user = auth()->user();
            if($user->token() == ''){
                $token = $user->createToken('Access Token', [$this->userScopes($user)])->accessToken;
            }else{
                $token = $user->token();
            }
            return $this->response(['Token' => $token], 200, 'Autenticado');
        }
        return $this->response(null, 400, 'Credenciais inválidas');
    }

    public function store(Store $request){
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

    public function createCode(Request $request, int $amount){
        $codes = $this->generateCodes($request->user(), $amount);

        return $this->response(Wrapper::wrapUserCodes($codes), 200, $amount .' codigos gerados');
    }

    private function generateCodes(User $user, int $amount){
        for( $i = 0 ; $i < $amount ; $i++ ){
            $code = new Code;
            $code->fill([
                'code' => $this->hashCode($user->name, $user->id),
                'available' => true
            ]);
        
            $code->user()->associate($user);
            $code->save();
            $codes[] = $code;
        }

        return $codes;
    }

    private function hashCode(string $name, int $id){
        $codefy = new Codefy;

        $uppercasedSplittedName = str_split(strtoupper($name));

        $firstTrio = $uppercasedSplittedName[0] . $codefy->getRandomUppercase() . $codefy->getRandomInteger();
        $secondTrio = $codefy->getRandomUppercase() . $uppercasedSplittedName[1] . $codefy->getRandomInteger();
        $quadra = $codefy->getRandomInteger() . $uppercasedSplittedName[2] . $uppercasedSplittedName[3] . $codefy->getRandomInteger();

        $newCode = $firstTrio . '-' . $secondTrio . '-' . $quadra;

        return $newCode;
    }
}
