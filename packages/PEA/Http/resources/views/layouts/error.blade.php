<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&family=Kanit:wght@300;400;500;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-50 dark:bg-gray-800">

    <div class="flex h-[calc(100vh-80px)] items-center justify-center p-5 w-full">
        <div class="text-center">
            @hasSection('icon')
                @yield('icon')
            @else
                <div class="inline-flex rounded-full bg-yellow-100 p-4">
                    <div class="rounded-full stroke-yellow-600 bg-yellow-200 p-4">
                        <svg class="w-16 h-16" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.0002 9.33337V14M14.0002 18.6667H14.0118M25.6668 14C25.6668 20.4434 20.4435 25.6667 14.0002 25.6667C7.55684 25.6667 2.3335 20.4434 2.3335 14C2.3335 7.55672 7.55684 2.33337 14.0002 2.33337C20.4435 2.33337 25.6668 7.55672 25.6668 14Z"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                </div>
            @endif
            <h1 class="mt-5 text-[32px] font-bold text-slate-800 lg:text-[44px]">@yield('code') - @yield('title')</h1>
            <p class="text-slate-600 mt-5 lg:text-lg">@yield('message')</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
