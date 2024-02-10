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
        
        @auth('admin')
            @include('admin.templates.nav')
        @endauth
        
        @yield('content')

        @if($errors->any())
            <div class="m-3 my-5 position-fixed bottom-0 start-0">
                @foreach ($errors->all() as $error)
                    <div class="toast align-items-center text-bg-danger border-0 mt-3" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                        <div class="toast-body">
                            {{ $error }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </body>
</html>
