@extends('app.layouts.basic')
@section('title','Products')
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Change product</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('app.products')}}">Products</a></li>
                <li><a href="">Consultation</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">            
            <div style="width:30%; margin-left:auto;margin-right:auto;">
                @component('app.products._components.formCreateEdit',['product'=>$product, 'units'=>$units,'providers'=>$providers])
                    
                @endcomponent
            </div>
        </div>
    </div>    


@endsection