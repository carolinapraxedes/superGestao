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
        $request->validate([
            /*o validate espera como parametro um array.
            nele informamos os campos que precisam ser validados e
            a chave que valida o tipo de validação vai ser
            o nome do input*/  
            'name'=>'required|min:3|max:40',
            'phoneNumber'=>'required',
            'email'=>'email',
            'reasonContactId'=>'required',
            'message'=>'required|max:20000'

            /*quando a validação não passa, o laravel faz um
            redirect para a rota anterior através a variavel 
            $errors preenchida */ 
        ]);
        //dd($request->all());
         ContactSite::create($request->all());
         return redirect()->route('site.index');
    }
}
