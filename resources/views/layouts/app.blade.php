<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 12 Task List App</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @yield('styles')
</head>
<body class="container mx-auto mt-10 max-w-lg" >


    @if (session()->has('succes'))
        <div>{{session('succes')}}</div>
    @endif
    <h1 class="mb-4 text-Zxl">@yield('title')</h1>

    <div>
        @yield('content')
    </div>
</body>
</html>
