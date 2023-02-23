@extends('app.layouts.basic')
@section('title','Providers')
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Products - List</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('app.products.create')}}">New</a></li>
                <li><a href="">Consultation</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto;margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Weight</th>
                            <th>ID Unit</th>
                            <th>Details</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        {{-- Para cada indice do array, iremos criar uma linha (tr) --}}
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->weight}}</td>
                                <td>{{$product->unitId}}</td>
                                <td><a href="{{route('app.products.show',$product->id)}}">More Details</a></td>
                                <td><a href="">Edit</a></td>
                                <td><a href="">Delete</a></td>
                            </tr>
                           
                        @endforeach
                    </tbody>
                </table>
                {{$products->appends($request)->links()}}
                <br>
                Exibindo {{$products->count()}} fornecedores de {{$products->total()}} de {{$products->firstItem()}} a {{$products->lastItem()}}

            </div>
        </div>
    </div>    


@endsection