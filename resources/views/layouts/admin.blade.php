<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title', 'Admin') | {{ config('app.name') }}</title>


        @vite(['resources/sass/admin.scss', 'resources/js/admin.js'])

        
    </head>
    <body class="bg-body-secondary">
        
        @auth
            @include('admin.templates.nav')
        @endauth
        
        @yield('content')

    </body>
</html>
