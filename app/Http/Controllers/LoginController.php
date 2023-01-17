<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = $request->get('erro');

        if($request->get('erro')==1){
            $erro = 'USER OR PASSWORD INVALID';
        }

        if($request->get('erro')==2){
            $erro = 'SIGN IN YOUR ACCOUNT';
        }

        return view('site.login',['title'=>'Sign in','erro'=>$erro]);
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

        //recuperando os parametros do formulario
        $email=$request->get('user');
        $password=$request->get('password');

        //echo "user: $email | senha: $password";

        //iniciar o model User
        $user = new User();

        //verifica se a login/senha passada é igual a registrada no banco
        $userForm = $user->where('email',$email)
                    ->where('password',$password)
                    ->get()
                    ->first();

        if(isset($userForm->name)){
            //se o usuario existe, vai começar uma session
            session_start();
            $_SESSION['name']=$userForm->name;
            $_SESSION['email']=$userForm->email;

            return redirect()->route('app.home');
        }else{
            return redirect()->route('site.login',['erro'=>1]);
        }
    }

    public function logout(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
