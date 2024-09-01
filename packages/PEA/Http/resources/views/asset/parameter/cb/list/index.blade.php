@extends('http::layouts.base')

@section('content')

    <div class="container-list">

        @include('http::asset.layouts.header', ['header' => 'Parameter Setting', 'sub_header' => null, 'sub_header_type' => null])

        @include('http::asset.layouts.header-menu', ['active' => 'parameter'])

        @include('http::commons.header-break')

        <div class="flex flex-row">
            <div class="w-1/6">
                @include('http::asset.layouts.aside', ['active' => 'cb'])
            </div>
            <div class="w-5/6">
                @include('http::asset.parameter.cb.list._table')
            </div>
        </div>
    </div>

@stop