<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 12 Task List App</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn{
            @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
        }
        .link{
            @apply font-medium text-gray-700 underline decoration-pink-500
        }
    </style>
    {{-- blade-formatter-disable --}}
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
