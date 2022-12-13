<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Schrute - @yield('title')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{asset('css/basicStyle.css')}}">
    </head>

    <body>
        @include('site.layouts._partials.top')
        @yield('content')
    </body>
</html>