@extends('app.layouts.basic')
@section('title','Providers')
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Providers - List</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('app.providers.add')}}">New</a></li>
                <li><a href="{{route('app.providers')}}">Consultation</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto;margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($providers as $provider)
                        {{-- Para cada indice do array, iremos criar uma linha (tr) --}}
                            <tr>
                                <td>{{$provider->name}}</td>
                                <td>{{$provider->site}}</td>
                                <td>{{$provider->uf}}</td>
                                <td>{{$provider->email}}</td>
                                <td><a href="{{route('app.providers.edit',$provider->id)}}">Editar</a></td>
                                <td>Delete</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>    


@endsection