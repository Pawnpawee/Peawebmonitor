<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&family=Kanit:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    @vite(['resources/css/app.css','resources/js/app.js'])
    @livewireStyles

</head>
<body class="bg-gray-50 dark:bg-gray-800">

    @include('http::layouts.header')

    <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
        @include('http::layouts.aside')
        <div class="fixed inset-0 z-30 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>
        <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
            <main class="px-4">
                @yield('content')
            </main>

            @include('http::layouts.footer')
        </div>
    </div>

    @include('http::commons.notify')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script> -->
    <script src="https://unpkg.com/flowbite-datepicker@1.2.2/dist/js/datepicker-full.js"></script>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @livewireScripts

    @stack('afterContent')

    @stack('scripts')

    <script>
        $('.form-delete').on('click', function (e) {
            if (confirm('This action will delete the selected information, which may not be recoverable. Are you sure?')) {
                return true;
            }
            e.preventDefault();
        });

        function buildFormData(form) {
            $(form).find('select, input[type="radio"], input[type="checkbox"]').each(function(i, el) {
                el.removeAttribute('disabled');
            })

            var formDataArray = $(form).serializeArray();
            var formData = new FormData();
            var index = {};

            for (var i = 0; i < formDataArray.length; i++) {
                var input = formDataArray[i];
                var key = input.name;
                var value = input.value;

                if (key.slice(-2) === '[]') {
                    key = key.slice(0, -2);

                    if (!index.hasOwnProperty(key)) {
                        index[key] = 0;
                    }

                    if (value) {
                        formData.append(key + '[' + index[key] + ']', value);
                        index[key]++;
                    }
                } else {
                    formData.append(key, value);
                }
            }

            // if ($('input[type=file]')){
            //     formData.append('image', $('input[type=file]')[0].files[0]);
            // }
            // // console.log(Object.fromEntries(formData))

            return Object.fromEntries(formData);
        }
    </script>
</body>
</html>
