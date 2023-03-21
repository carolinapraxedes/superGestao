@extends('app.layouts.basic')
@section('title','Request')
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Request - List</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('requests.create')}}">New</a></li>
                <li><a href="">Consultation</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto;margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID Request</th>
                            <th>Client</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requestsProduct as $requestsProdu)
                        {{-- Para cada indice do array, iremos criar uma linha (tr) --}}
                            <tr>
                                <td>{{$requestsProdu->id}}</td>
                                <td>{{$requestsProdu->clientID}}</td>
                                <td><a href="">More Details</a></td>
                                <td><a href="">Edit</a></td>
                                <td>

                                </td>
                            </tr>
                           
                        @endforeach
                    </tbody>
                </table>
                {{$requestsProduct->appends($request)->links()}}
                <br>
                Exibindo {{$requestsProduct->count()}} fornecedores de {{$requestsProduct->total()}} de {{$requestsProduct->firstItem()}} a {{$requestsProduct->lastItem()}}

            </div>
        </div>
    </div>    


@endsection