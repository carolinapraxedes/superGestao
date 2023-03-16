@if (isset($productsDetail->id))
    <form action="{{ route('productsDetails.update', ['productsDetail' => $productsDetail->id]) }}" method="post">
        @csrf
        @method('PUT')
    @else
        <form action="{{ route('productsDetails.store') }}" method="post">
            @csrf
@endif
        <input type="text" name="productId" value="{{ $productsDetail->productId ?? old('productId') }}"  placeholder="ID product"
            class="borda-preta">
        {{ $errors->has('productId') ? $errors->first('productId') : '' }}

        <input type="text" value="{{ $productsDetail->length ?? old('length') }}" name="length"
            placeholder="length" class="borda-preta">
        {{ $errors->has('length') ? $errors->first('length') : '' }}

        <input type="text" value="{{ $productsDetail->width ?? old('width') }}" name="width"
        placeholder="width" class="borda-preta">
        {{ $errors->has('width') ? $errors->first('width') : '' }}

        <input type="text" value="{{ $productsDetail->height ?? old('height') }}" name="height" placeholder="height"
            class="borda-preta">
        {{ $errors->has('height') ? $errors->first('height') : '' }}

        <select name="unitId" >
            <option>select a unit of measurement</option>
            @foreach ($units as $unit)
                <option value="{{ $unit->id }}" {{ ($productsDetail->unitId ?? old('unitId')) == $unit->id ? 'selected' : '' }}>
                    {{ $unit->description }}</option>
            @endforeach
        </select>
        {{ $errors->has('unitId') ? $errors->first('unitId') : '' }}

        <button type="submit">Register</button>
</form>
