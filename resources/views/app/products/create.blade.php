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
                    <input type="text" value="{{old('name')}}" name="name" placeholder="name's product" class="borda-preta">
                    {{$errors->has('name') ? $errors->first('name') : ''}}
                   
                    <input type="text" value="{{old('description')}}" name="description" placeholder="description" class="borda-preta">
                    {{$errors->has('description') ? $errors->first('description') : ''}}

                    <input type="text" value="{{old('weight')}}" name="weight" placeholder="weight" class="borda-preta">
                    {{$errors->has('weight') ? $errors->first('weight') : ''}}

                    <select name="unitId" id="">
                        <option >select a unit of measurement</option>
                        @foreach ($units as $unit )
                            <option value="{{$unit->id}}" {{old('unitId') == $unit->id ? 'selected' : ''}}>{{$unit->description}}</option>
                        @endforeach                    
                    </select>
                    {{$errors->has('unitId') ? $errors->first('unitId') : ''}}

                    <button type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>    


@endsection