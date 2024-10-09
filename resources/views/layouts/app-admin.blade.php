<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App Name @yield('title')</title>
    @vite('resources/css/app.css')

    @livewireStyles
</head>

<body class="bg-slate-800">
    <div class="h-screen flex flex-col justify-start items-center mt-4">

        @yield('content')

    </div>



    @livewireScripts
    @vite('resources/js/app.js')
</body>

</html>
