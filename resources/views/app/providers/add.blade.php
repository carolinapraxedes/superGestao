@extends('app.layouts.basic')
@section('title','Providers')
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
                <form action="{{route('app.providers.add')}}" method="post">
                    <input type="hidden" name="id" value="{{$provider->id ?? ''}}">
                    @csrf
                    <input type="text" value="{{$provider->name ?? old('name')}}" name="name" placeholder="Put your name" class="borda-preta">
                    {{$errors->has('name') ? $errors->first('name') : ''}}
                    {{-- verifica se tem mensagem de errro --}}
                    <input type="text" value="{{$provider->site ?? old('site')}}" name="site" placeholder="Put your site" class="borda-preta">
                    {{$errors->has('site') ? $errors->first('site') : ''}}

                    <input type="text" value="{{$provider->uf ?? old('uf')}}" name="uf" placeholder="UF" class="borda-preta">
                    {{$errors->has('uf') ? $errors->first('uf') : ''}}

                    <input type="email" value="{{$provider->email ?? old('email')}}" name="email" placeholder="Put your email" class="borda-preta">
                    {{$errors->has('email') ? $errors->first('email') : ''}}

                    <button type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>    


@endsection