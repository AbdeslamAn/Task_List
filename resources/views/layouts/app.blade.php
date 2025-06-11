<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 12 Task List App</title>
    @yield('styles')
</head>
<body>

    @if (session()->has('succes'))
        <div>{{session('succes')}}</div>
    @endif
    <h1>@yield('title')</h1>

    <div>
        @yield('content')
    </div>
</body>
</html>