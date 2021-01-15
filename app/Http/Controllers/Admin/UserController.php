<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\{Login, Store};
use App\Library\Arrays;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function login(Login $request){
        if(auth()->attempt($request->validated())){
            $user = auth()->user();
            if($user->token() == ''){
                $token = $user->createToken('Access Token', ['admin'])->accessToken;
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
}
