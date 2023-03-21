@extends('app.layouts.basic')
@section('title','Requests')
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">                
            <p>New Request</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('requests.index')}}">Products</a></li>
                <li><a href="">Consultation</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            {{$msg ?? ''}}
            <div style="width:30%; margin-left:auto;margin-right:auto;">
                @component('app.requests._components.formCreateEdit',['clients'=>$clients])
                    
                @endcomponent
            </div>
        </div>
    </div>    


@endsection