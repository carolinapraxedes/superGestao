@extends('app.layouts.basic')
@section('title','Products')
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Details</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('app.products')}}">Products</a></li>
                <li><a href="">Consultation</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            {{$msg ?? ''}}
            <div style="width:30%; margin-left:auto;margin-right:auto;">
                <table border="1" style="text-align:left">
                    <tr>
                        <td>ID:</td>
                        <td>{{$product->id}}</td>
                    </tr>
                    <tr>
                        <td>Name:</td>
                        <td>{{$product->name}}</td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td>{{$product->description}}</td>
                    </tr>
                    <tr>
                        <td>Weight:</td>
                        <td>{{$product->weight}}</td>
                    </tr>
                    <tr>
                        <td>unitId:</td>
                        <td>{{$product->unitId}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>    


@endsection