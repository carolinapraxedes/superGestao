<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('site.login',['title'=>'Sign in']);
    }

    public function auth(Request $request){
        //regras de validação
        $rules = [
            'user'=> 'email',
            'password'=> 'required|min:8'
        ];

        //mensagens de validação
        $feedback = [
            'user.email'=>'O campo usuário(e-mail) é obrigatório',
            'password.required'=>'O campo senha é obrigatório',
            'password.min'=>'Sua senha precisa ser no mínimo 8 dígitos'
        ];
        $request->validate($rules,$feedback);

        print_r($request->all());
    }
}
