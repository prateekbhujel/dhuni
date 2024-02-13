<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin | @yield('title', 'Admin') ~{{ config('app.name') }}</title>


        @vite(['resources/sass/admin.scss', 'resources/js/admin.js'])

        
    </head>
    <body class="bg-body-secondary">
        
        @auth('admin')
            @include('admin.templates.nav')
        @endauth
        
        @yield('content')

        @if(session()->has('success') || session()->has('info') || session()->has('warning') || $errors->any())
        <div class="m-3 my-5 position-fixed bottom-0 start-0">
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="toast align-items-center text-bg-danger border-0 mt-3" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                <i class="fas fa-times-circle me-2"></i> {{ $error }}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
    
            @foreach(['success' => 'check', 'info' => 'info-circle', 'warning' => 'exclamation-circle'] as $type => $icon)
                @if (session()->has($type))
                    <div class="toast align-items-center bg-{{ $type }} text-{{ ($type == 'success' || 'info') ? 'light' : 'dark' }} border-0 mt-3" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                <i class="fas fa-{{ $icon }} me-2"></i> {{ session()->get($type) }}
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif
    
    

    </body>
</html>
