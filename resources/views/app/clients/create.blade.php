@extends('app.layouts.basic')
@section('title','Clients')
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
  
                
                <p>New Client</p>

        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('clients.index')}}">Products</a></li>
                <li><a href="">Consultation</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            {{$msg ?? ''}}
            <div style="width:30%; margin-left:auto;margin-right:auto;">
                @component('app.clients._components.formCreateEdit')
                    
                @endcomponent
            </div>
        </div>
    </div>    


@endsection