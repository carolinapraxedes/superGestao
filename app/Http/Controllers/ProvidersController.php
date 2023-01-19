<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProvidersController extends Controller
{
    public function index(){
        return view('app.providers.index');
    }

    public function list(Request $request){
        $providers = Provider::where('name','like','%'.$request->input('name').'%')
            ->where('site','like','%'.$request->input('site').'%')
            ->where('uf','like','%'.$request->input('uf').'%')
            ->where('email','like','%'.$request->input('email').'%')
            //estou dizendo que procure que procure 
            //no banco oq foi passado no request
            ->get();
            
        return view('app.providers.list',['providers'=>$providers]);
    }

    public function add(Request $request){
        $msg='';
        

        //INSERÇÃO
        //se tiver token, vai acontecer um novo cadastro do dado
            //se nao tiver, nao vai rolar
        if($request->input('_token') != '' && $request->input('id')==''){
            //regras de validação
            $rules = [
                'name'=>'required|min:3|max:40',
                'site'=>'required|min:5',
                'uf'=>'required|min:2|max:2',
                'email'=>'email'
            ];

            //mensagens caso as validações não derem certo
            $feedback=[
                'required'=>'O campo :attribute deve ser preenchido',
                'name.min' => 'O campo :attribute deve ter no mínimo 3 digitos',
                'name.max' => 'O campo :attribute deve ter no máximo 40 digitos',
                'site.min' => 'O campo :attribute deve ter no mínimo 5 digitos',

                'uf.min' => 'O campo :attribute deve ter no mínimo 2 digitos',
                'uf.max' => 'O campo :attribute deve ter no máximo 2 digitos',

                'email.email'=> 'O campo e-mail não foi preenchido corretamente'
            ];
            $request->validate($rules,$feedback);
            //se a validar dar errado, o laravel dá redirect
            //back com os dados inseridos no formulario

            
            $provider = new Provider();
            //registrando no banco de dados
            $provider->create($request->all());

            $msg = 'Cadastro feito com sucesso';
        }

        //ALTERAÇÃO
        //caso o id esteja preenchido, então vai acontecer uma alteração no registro
        if($request->input('_token') != '' && $request->input('id') !=''){
            $provider = Provider::find($request->input('id'));
            $update = $provider->update($request->all()); // aqui vao passar os dados alterados

            if($update){
                $msg = 'Atualização realizada com sucesso!';
            }else{
                $msg = 'Erro ao tentar atualizar o registro!';
            }

            return redirect()->route('app.providers.edit',['id'=>$request->input('id'),'msg'=>$msg]);
        }
        return view('app.providers.add',['msg'=>$msg]);
    }

    public function edit($id, $msg = ''){
        //peço para achar os dados do id
        //passo e retorno esses dados para view de registro
        $provider = Provider::find($id);
        return view('app.providers.add',['provider'=>$provider,'msg' => $msg]);
    }
}
