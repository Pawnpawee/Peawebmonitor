@extends('http::layouts.base')

@section('title', 'Admin - Account')

@section('content')
    <div class="-mx-4">
        <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="w-full">
                @include("http::commons.breadcrumb", [
                    'items' => [
                        [
                            'text' => 'Accounts',
                            'url' => '#'
                        ]
                    ]
                ])

                <div class="mb-4">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Account</h1>
                </div>

                @include('admin::account.partials._filter')
            </div>
        </div>

        @include('admin::account.partials._table')
    </div>
@stop
