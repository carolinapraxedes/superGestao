@extends('app.layouts.basic')
@section('title','Clients')
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Clients - List</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('clients.create')}}">New</a></li>
                <li><a href="">Consultation</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto;margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                        {{-- Para cada indice do array, iremos criar uma linha (tr) --}}
                            <tr>
                                <td>{{$client->name}}</td>

                                <td><a href="">More Details</a></td>
                                <td><a href="">Edit</a></td>
                                <td>

                                </td>
                            </tr>
                           
                        @endforeach
                    </tbody>
                </table>
                {{$clients->appends($request)->links()}}
                <br>
                Exibindo {{$clients->count()}} fornecedores de {{$clients->total()}} de {{$clients->firstItem()}} a {{$clients->lastItem()}}

            </div>
        </div>
    </div>    


@endsection