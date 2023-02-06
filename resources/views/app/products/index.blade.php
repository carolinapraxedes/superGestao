@extends('app.layouts.basic')
@section('title','Produts')
@section('content')

<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>New provider</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{route('app.providers.add')}}">New</a></li>
            <li><a href="{{route('app.providers')}}">Consultation</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        {{$msg ?? ''}}
        <div style="width:30%; margin-left:auto;margin-right:auto;">
            <form action="{{route('app.produtos.store')}}" method="post">
                <input type="hidden" name="id" value="{{$provider->id ?? ''}}">
                @csrf
                <label for="">Existem produtos?</label>

                <label for="">SIM</label>
                <input type="radio"  name="produtoExiste" value="0">
                <label for="">NÃO</label>
                <input type="radio"  name="produtoExiste" value="1">
                <hr>
                <label for="">Quais produtos?</label>
                <label for="produtoCafe">Café</label>
                <input type="checkbox"  name="produtos[]" id="produtoCafe" value="produtoCafe">

                <label for="produtoUva">Uva</label>
                <input type="checkbox"  name="produtos[]" id="produtoUva" value="produtoUva">

                <label for="produtoSalada">Salada</label>
                <input type="checkbox"  name="produtos[]" id="produtoSalada" value="produtoSalada">

                <label for="">Batata</label>
                <input type="checkbox"  name="produtos[]" id="produtoBatata" value="produtoBatata">
                <hr>
                <label for="comentario">Deixe um comentário:</label>
                <textarea type="text"  name="comentario"></textarea>


                <button type="submit">Register</button>
            </form>
        </div>
    </div>
</div>    
@endsection