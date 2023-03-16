@extends('app.layouts.basic')
@section('title','Details Product')
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">                
            <p>New detail product</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('app.products')}}">Products</a></li>
               
            </ul>
        </div>
        <div class="informacao-pagina">
            {{$msg ?? ''}}
            <div style="width:30%; margin-left:auto;margin-right:auto;">
                @component('app.productDetail._components.formCreateEdit',['units'=>$units])
                    
                @endcomponent
               
            </div>
        </div>
    </div>    


@endsection
