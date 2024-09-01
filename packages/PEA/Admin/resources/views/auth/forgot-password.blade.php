@extends('http::layouts.auth')

@section('content')
<div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto md:h-screen pt:mt-0 dark:bg-gray-900">
    <a href="https://flowbite-admin-dashboard.vercel.app/"
        class="flex items-center justify-center mb-8 text-2xl font-semibold lg:mb-10 dark:text-white">
        <img src="https://flowbite-admin-dashboard.vercel.app/images/logo.svg" class="mr-4 h-11" alt="FlowBite Logo">
        <span>Flowbite</span>
    </a>

    <div class="card w-full max-w-xl p-6 space-y-8 sm:p-8 ">
       <div>
            <h2 class="mb-3 text-2xl font-bold text-gray-900 dark:text-white">
                Forgot your password?
            </h2>
            <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                Don't fret! Just type in your email and we will send you a code to reset your password!
            </p>
       </div>

       @include('http::commons.errors')
       @include('http::commons.messages')

       {{ Form::open(['url' => route('http::auth.forgot-password'), 'class' => 'mt-8 space-y-6']) }}

            <div class="grid gap-2 !mt-0">
                {{ Form::label('email') }}
                {{ Form::email('email', null, ['class' => 'form-control']) }}
            </div>

            {{ Form::submit('Reset password', ['class' => 'btn btn-primary text-white font-medium w-full sm:w-auto']) }}

        {{ Form::close() }}

    </div>
</div>
@stop
