@extends('app.layouts.basic')
@section('title','Providers')
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Providers</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('app.providers.add')}}">New</a></li>
                <li><a href="{{route('app.providers')}}">Consultation</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:30%; margin-left:auto;margin-right:auto;">
                <form action="{{route('app.providers.list')}}" method="post">
                    @csrf
                    <input type="text" name="name" placeholder="Put your name" class="borda-preta">
                    <input type="text" name="site" placeholder="Put your site" class="borda-preta">
                    <input type="text" name="uf" placeholder="UF" class="borda-preta">
                    <input type="email" name="email" placeholder="Put your email" class="borda-preta">
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>    


@endsection