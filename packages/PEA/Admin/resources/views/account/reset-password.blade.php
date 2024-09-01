@extends('http::layouts.base')

@section('title', 'Admin - Reset Password')

@section('content')
    <div class="-mx-4">
        <div class="p-4 mb-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="w-full">
                <div class="mb-4">
                    @include("http::commons.breadcrumb", [
                        'items' => [
                            [
                                'text' => 'Accounts',
                                'url' => route('admin::account')
                            ],
                            [
                                'text' => 'Reset password',
                                'url' => '#'
                            ]
                        ]
                    ])

                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        Reset Password</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <div class="card">
            {{ Form::model($account, ['url'=>route('admin::account.update-password', $account->getKey()), 'method'=>'patch']) }}

                <div class="flex flex-col lg:flex-row gap-2 mb-5">
                    <div class="basis-full lg:basis-1/5">
                        {{ Form::label('email') }}
                    </div>
                    <div class="basis-full lg:basis-1/2">
                        {{ Form::text('email', null, ['class' => 'form-control', 'disabled']) }}
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row gap-2 mb-5">
                    <div class="basis-full lg:basis-1/5">
                        {{ Form::label('password') }}
                        <span class="flex mt-2 lg:pr-4 text-xs">* รหัสผ่านต้องประกอบด้วยตัวอักษรภาษาอังกฤษ<br>ตัวพิมพ์เล็ก, ตัวพิมพ์ใหญ่,
                        ตัวเลขและอักขระพิเศษ (!%*?&) และมีความยาวไม่น้อยกว่า 6 ตัวอักษร</span>
                    </div>
                    <div class="basis-full lg:basis-1/2">
{{--                        {{ Form::password('password', ['class' => 'form-control', 'id' => 'password_input']) }}--}}
                        <div class="relative">
                            <input type="password" name="password" id="password_input" class="form-control">
                            <div class="toggle-password absolute inset-y-0 right-0 p-4 flex items-center">
                                <span id="eye-symbol" class="fa fa-eye"></span>
                            </div>
                        </div>
                        {{ Form::error('password') }}
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row gap-2 mb-5">
                    <div class="basis-full lg:basis-1/5">
                        {{ Form::label('password_confirmation') }}
                    </div>
                    <div class="basis-full lg:basis-1/2">
{{--                        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}--}}
                        <div class="relative">
                            <input type="password" name="password_confirmation" id="password_confirmation_input" class="form-control">
                        </div>
                        {{ Form::error('password_confirmation') }}
                    </div>
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('admin::account') }}" class="btn">Cancel</a>
                    <button class="btn btn-primary">Save</button>
                </div>


            {{ Form::close() }}
        </div>
    </div>
@stop

@push('afterContent')
    <script>

        $('.toggle-password').click(function () {
            const password_input = $('#password_input');
            const password_confirmation_input = $('#password_confirmation_input');

            const input_type = password_input.attr('type') == 'password' ? 'text' : 'password';

            password_input.attr('type', input_type);
            password_confirmation_input.attr('type', input_type);

            $('#eye-symbol').toggleClass('fa-eye fa-eye-slash')
        })

    </script>
@endpush