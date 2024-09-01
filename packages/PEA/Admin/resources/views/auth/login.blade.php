@extends('admin::layouts.auth')

@section('content')
<div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto md:h-screen pt:mt-0 dark:bg-gray-900">
    <a href="https://flowbite-admin-dashboard.vercel.app/"
        class="flex items-center justify-center mb-8 text-2xl font-semibold lg:mb-10 dark:text-white">
        <img src="https://flowbite-admin-dashboard.vercel.app/images/logo.svg" class="mr-4 h-11" alt="FlowBite Logo">
        <span>Flowbite</span>
    </a>

    <div class="card w-full max-w-xl p-6 space-y-8 sm:p-8">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                Sign in
            </h2>
        </div>

        @include('http::commons.errors')
        @include('http::commons.messages')

{{--        {{ Form::open(['url' => route('http::auth.attempt'), 'class' => 'mt-8 space-y-6']) }}--}}
        {{ html()->form('POST')->route('admin::auth.attempt')->open() }}
            <div class="grid gap-2 !mt-0">
{{--                {{ Form::label('email') }}--}}
{{--                {{ Form::email('email', null, ['class' => 'form-control']) }}--}}

                {{ html()->label('email') }}
                {{ html()->email('email')->class('bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500') }}
            </div>

            <div class="grid gap-2">
{{--                {{ Form::label('password') }}--}}
                {{ html()->label('password') }}
                <div class="relative">
                    <input type="password" name="password" id="password_input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <div class="toggle-password absolute inset-y-0 right-0 p-4 flex items-center">
                        <span id="eye-symbol" class="fa fa-eye"></span>
                    </div>
                </div>
            </div>

            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <label for="remember" class="flex items-center gap-3 cursor-pointer">
{{--                        {{ Form::checkbox('remember', 1, null, ['id' => 'remember', 'class' => 'w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600']) }}--}}
                        {{ html()->checkbox('remember', true, 1) }}
                        <span class="text-sm text-gray-500 dark:text-gray-400">Remember me</span>
                    </label>

                </div>
                <div class="ml-3 text-sm">

                </div>
                <a href="{{ route('admin::auth.forgot-password') }}" class="ml-auto text-sm text-primary-700 hover:underline dark:text-primary-500">Lost
                    Password?</a>
            </div>

{{--            {{ Form::submit('Login to your account', ['class' => 'btn btn-primary']) }}--}}
            {{ html()->submit('Login to your account')->class('text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800') }}

{{--        {{ Form::close() }}--}}
        {{ html()->form()->close() }}
    </div>
</div>
@stop

@push('afterContent')
    <script>

        $('.toggle-password').click(function () {
            const password_input = $('#password_input');
            const input_type = password_input.attr('type') == 'password' ? 'text' : 'password';
            password_input.attr('type', input_type);

            $('#eye-symbol').toggleClass('fa-eye fa-eye-slash')
        })

    </script>
@endpush
