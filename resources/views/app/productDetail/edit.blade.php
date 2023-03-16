@extends('app.layouts.basic')
@section('title','Details product')
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Change detail product</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('app.products')}}">Products</a></li>

            </ul>
        </div>
        <div class="informacao-pagina">
            <h4>Product</h4>
            <div>Name:{{ $productsDetail->products->name }}</div>
            <br>
            <div>Description:{{ $productsDetail->products->description }}</div>
            <br>
            
            <div style="width:30%; margin-left:auto;margin-right:auto;">
                @component('app.productDetail._components.formCreateEdit',['productsDetail'=>$productsDetail, 'units'=>$units])
                    
                @endcomponent
            </div>
        </div>
    </div>    


@endsection