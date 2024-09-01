@extends('http::layouts.base')

@section('title', 'Admin - Edit Account')

@section('content')
    <div class="-mx-4">
        <div class="p-4 mb-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="w-full">
                @include("http::commons.breadcrumb", [
                    'items' => [
                        [
                            'text' => 'Accounts',
                            'url' => route('admin::account')
                        ],
                        [
                            'text' => 'Edit account',
                            'url' => '#'
                        ]
                    ]
                ])

                <div class="mb-4">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        Account</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <div class="card">
            {{ Form::model($account, ['url'=>route('admin::account.update', $account->getKey()), 'method'=>'patch', 'autocomplete' => 'off']) }}
            @include('admin::account.partials._form')
            {{ Form::close() }}
        </div>
    </div>
@stop
