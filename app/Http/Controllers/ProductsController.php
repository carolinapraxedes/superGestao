<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Provider;
use App\Models\testeProducts;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Products::paginate(10);
        

        return view('app.products.index',['products'=>$products,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::all();
        //estou recuperando as unidades registradas no banco 

        $providers = Provider::all();

        return view('app.products.create',['units'=>$units, 'providers'=>$providers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //regras de validação
        $rules =[
            'name'=>'required|min:3|max:40',
            'description'=>'required|min:3|max:2000',
            'weight'=>'required|integer',
            /*o unit id so vai existir se dado 
            encaminhado existir na tabela unidades.
            para isso, usamos: exists:<tabela>,<coluna>
            */
            'unitId'=>'exists:units,id',
            'providerID'=>'exists:providers,id'           
        ];
        $feedback=[
            'required'=> 'O campo :attribute deve ser preenchido',
            'name.min'=> 'O campo nome deve ter no mínimo 3 caracteres',
            'name.max'=> 'O campo nome deve ter no máximo 40 caracteres',
            'description.min'=> 'O campo descrição deve ter no mínimo 3 caracteres',
            'description.max'=> 'O campo descrição deve ter no máximo 2000 caracteres',
            'weight.integer' => 'O campo peso deve ser um número inteiro',
            'unitId.exists' => 'A unidade de medida informada não existe',
            'providerID.exists' => 'O fornecedor informado não existe'
        ];

        $request->validate($rules,$feedback);
        /*
        * É possível registrar desse jeito pois
        * o model está com os campos no fillable
        * além que o form ja esta com os names dos campos
        */

        //dd($request->all());
        Products::create($request->all());
       return redirect()->route('app.products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {
   
        return view('app.products.show',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        $units = Unit::all();
        $providers = Provider::all();
         return view('app.products.edit',['product'=>$product, 
         'units'=>$units,
         'providers' => $providers
        ]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        /*$product = instancia do objeto antes de mandar os novos dados
        * eu recupero a instancia do objeto, utilizo o metodo update e recebo os 
        * os dados requisição irão atualizar os atributos habilitados
        */

        //regras de validação
        $rules =[
            'name'=>'required|min:3|max:40',
            'description'=>'required|min:3|max:2000',
            'weight'=>'required|integer',
            'unitId'=>'exists:units,id',   
            'providerID'=>'exists:providers,id'     
        ];
        $feedback=[
            'required'=> 'O campo :attribute deve ser preenchido',
            'name.min'=> 'O campo nome deve ter no mínimo 3 caracteres',
            'name.max'=> 'O campo nome deve ter no máximo 40 caracteres',
            'description.min'=> 'O campo descrição deve ter no mínimo 3 caracteres',
            'description.max'=> 'O campo descrição deve ter no máximo 2000 caracteres',
            'weight.integer' => 'O campo peso deve ser um número inteiro',
            'unitId.exists' => 'A unidade de medida informada não existe',
            'providerID.exists' => 'O fornecedor informado não existe'
        ];

        $request->validate($rules,$feedback);
        
        $product->update($request->all());
        return redirect()->route('app.products.show',['product'=>$product->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $product->delete();
        return redirect()->route('app.products');
    }
}
