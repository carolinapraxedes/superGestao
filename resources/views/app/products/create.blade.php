@extends('app.layouts.basic')
@section('title','Products')
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>New product</p>
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
                <form action="{{route('app.products.store')}}" method="post">
                  
                    @csrf
                    <input type="text" value="" name="name" placeholder="name's product" class="borda-preta">
                    
                   
                    <input type="text" value="" name="description" placeholder="description" class="borda-preta">
                    

                    <input type="text" value="" name="weight" placeholder="weight" class="borda-preta">
                    

                    <select name="unitId" id="">
                        <option value="">select a unit of measurement</option>
                        @foreach ($units as $unit )
                            <option value="{{$unit->id}}">{{$unit->description}}</option>
                        @endforeach
                        <option value="1">Unit</option>
                    </select>
                    

                    <button type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>    


@endsection