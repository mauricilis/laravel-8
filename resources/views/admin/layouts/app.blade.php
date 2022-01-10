<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} - @yield('title')</title>
</head>

<body>
    <header>
        @yield('header')
    </header>
    <div class="content">
        @yield('content')
    </div>
    <footer>
        @yield('footer')
    </footer>
</body>

</html>
