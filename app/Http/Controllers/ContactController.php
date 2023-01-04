<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactSite;
use App\Models\reasonContact;

class ContactController extends Controller
{
    public function contact(Request $request){
        //dd($request->all());

        $reasonContact = reasonContact::all();
        return view('site.contact',['reasonContact'=> $reasonContact]);
    }

    public function saveContact(Request $request){
                    /*
        validação dos dados do formulário recebidos
        pelo o request. no request, quando os dados do usuário
        são recebidos no backend da aplicação os parametros são 
        associados de acordo com os names dos inputs 
        */
                    /*o validate espera como parametro um array.
            nele informamos os campos que precisam ser validados e
            a chave que valida o tipo de validação vai ser
            o nome do input*/  
        
        
            /*quando a validação não passa, o laravel faz um
            redirect para a rota anterior através a variavel 
            $errors preenchida */ 

        $request->validate([
            'name'=>'required|min:3|max:40|unique:contact_sites',
            'phoneNumber'=>'required',
            'email'=>'email',
            'reasonContactId'=>'required',
            'message'=>'required|max:20000'
        ],
        [
            'name.required'=>'O campo nome precisa ser preenchido',
            'name.min'=>'O campo nome precisa ter no mínimo 3 caracteres',
            'name.max'=>'O campo nome precisa no máximo de 40 caracteres',
            'name.unique'=>'Esse nome já foi cadastrado',

            //em caso de uma grande quantidade de validações podemos 
            //criar uma mensagem generica:
            'required'=>'O campo :attribute deve ser preenchido',
            //'required'=>'O campo deve ser preenchido'
            'email.email'=>'O email informado não é valido',
            'mensagem.max'=> 'A mensagem deve ter no max 2000 caracteres',
            
        ]
    );
        //dd($request->all());
         ContactSite::create($request->all());
         return redirect()->route('site.index');
    }


}
