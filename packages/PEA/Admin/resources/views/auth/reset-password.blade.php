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
                Reset your password
            </h2>
       </div>

       @include('http::commons.errors')
       @include('http::commons.messages')

       {{ Form::open(['url' => route('http::auth.reset-password.reset'), 'class' => 'mt-8 space-y-6']) }}

            <div class="grid gap-2 !mt-0">
                {{ Form::label('email') }}
                {{ Form::email('email', null, ['class' => 'form-control']) }}
                {{ Form::hidden('token', $token, ['class' => 'form-control']) }}
            </div>

            <div class="grid gap-2">
                {{ Form::label('password', 'New password') }}
                {{ Form::password('password', ['class' => 'form-control']) }}
            </div>

            <div class="grid gap-2">
                {{ Form::label('password_confirmation', 'Confirm new password') }}
                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
            </div>

            {{ Form::submit('Reset password', ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}
    </div>
</div>
@stop
