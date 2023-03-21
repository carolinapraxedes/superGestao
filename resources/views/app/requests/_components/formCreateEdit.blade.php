@if (isset($requestsProduct->id))
    <form action="{{ route('requests.update', ['requestsProduct' => $requestsProduct->id]) }}" method="post">
        @csrf
        @method('PUT')
    @else
        <form action="{{ route('requests.store') }}" method="post">
            @csrf
@endif

        <select name="clientID" id="">
            <option>select a client</option>
            @foreach ($clients as $client)
                <option value="{{ $client->id }}" {{ ($product->clientID ?? old('clientID')) == $client->id ? 'selected' : '' }}>
                    {{ $client->name }}</option>
            @endforeach
        </select>
        {{ $errors->has('clientID') ? $errors->first('clientID') : '' }}

        <input type="text" name="name" value="{{ $requestsProduct->name ?? old('name') }}"  placeholder="name's product"
            class="borda-preta">
        {{ $errors->has('name') ? $errors->first('name') : '' }}


        <button type="submit">Register</button>
</form>
