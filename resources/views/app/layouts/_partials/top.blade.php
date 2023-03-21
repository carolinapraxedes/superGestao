<div class="topo">
    <div class="logo">
        <img src="{{asset('img/logo.png')}}">
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.home') }}">Home</a></li>
            <li><a href="{{ route('clients.index') }}">Clients</a></li>
            <li><a href="{{ route('requests.index') }}">Requests</a></li>
            <li><a href="{{ route('app.providers') }}">Providers</a></li>
            <li><a href="{{ route('app.products') }}">Products</a></li>
            <li><a href="{{ route('app.logout') }}">Logout</a></li>
        </ul>
    </div>
</div>
