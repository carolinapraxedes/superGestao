@if (isset($client->id))
    <form action="{{ route('clients.update', ['client' => $client->id]) }}" method="post">
        @csrf
        @method('PUT')
    @else
        <form action="{{ route('clients.store') }}" method="post">
            @csrf
@endif

        <input type="text" name="name" value="{{ $client->name ?? old('name') }}"  placeholder="name's product"
            class="borda-preta">
        {{ $errors->has('name') ? $errors->first('name') : '' }}


        <button type="submit">Register</button>
</form>
