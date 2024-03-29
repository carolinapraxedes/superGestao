@extends('app.layouts.basic')
@section('title', 'Providers')
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Providers - List</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.providers.add') }}">New</a></li>
                <li><a href="{{ route('app.providers') }}">Consultation</a></li>
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
                                <td>{{ $provider->name }}</td>

                                <td>{{ $provider->site }}</td>
                                <td>{{ $provider->uf }}</td>
                                <td>{{ $provider->email }}</td>
                                <td><a href="{{ route('app.providers.edit', $provider->id) }}">Edit</a></td>
                                <td><a href="{{ route('app.providers.delete', $provider->id) }}">Delete</a></td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <p>List</p>
                                    <table border="1" style="margin: 20px">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAME</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($provider->products as $key => $product)
                                                <tr>
                                                    <td>{{$product->id}}</td>
                                                    <td>{{$product->name}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $providers->appends($request)->links() }}
                <br>
                Exibindo {{ $providers->count() }} fornecedores de {{ $providers->total() }} de
                {{ $providers->firstItem() }} a {{ $providers->lastItem() }}

            </div>
        </div>
    </div>


@endsection
