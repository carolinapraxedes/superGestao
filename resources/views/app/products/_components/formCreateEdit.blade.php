@if (isset($product->id))
    <form action="{{ route('app.products.update', ['product' => $product->id]) }}" method="post">
        @csrf
        @method('PUT')
    @else
        <form action="{{ route('app.products.store') }}" method="post">
            @csrf
@endif

        <select name="providerID" id="">
            <option>select a provider</option>
            @foreach ($providers as $provider)
                <option value="{{ $provider->id }}" {{ ($product->providerID ?? old('providerID')) == $provider->id ? 'selected' : '' }}>
                    {{ $provider->name }}</option>
            @endforeach
        </select>
        {{ $errors->has('providerID') ? $errors->first('providerID') : '' }}
        <input type="text" name="name" value="{{ $product->name ?? old('name') }}"  placeholder="name's product"
            class="borda-preta">
        {{ $errors->has('name') ? $errors->first('name') : '' }}

        <input type="text" value="{{ $product->description ?? old('description') }}" name="description"
            placeholder="description" class="borda-preta">
        {{ $errors->has('description') ? $errors->first('description') : '' }}

        <input type="text" value="{{ $product->weight ?? old('weight') }}" name="weight" placeholder="weight"
            class="borda-preta">
        {{ $errors->has('weight') ? $errors->first('weight') : '' }}

        <select name="unitId" id="">
            <option>select a unit of measurement</option>
            @foreach ($units as $unit)
                <option value="{{ $unit->id }}" {{ ($product->unitId ?? old('unitId')) == $unit->id ? 'selected' : '' }}>
                    {{ $unit->description }}</option>
            @endforeach
        </select>
        {{ $errors->has('unitId') ? $errors->first('unitId') : '' }}

        <button type="submit">Register</button>
</form>
