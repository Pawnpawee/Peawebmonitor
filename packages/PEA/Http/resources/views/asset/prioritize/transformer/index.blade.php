@extends('http::layouts.base')

@section('content')

    <div class="container-list">

        @include('http::asset.layouts.header', ['header' => 'Prioritize Equipment', 'sub_header' => null, 'sub_header_type' => null])

        @include('http::asset.layouts.header-menu', ['active' => 'prioritize'])

        @include('http::commons.header-break')

        <div class="flex flex-row">
            <div class="w-1/6">
                @include('http::asset.layouts.prioritize.aside', ['active' => 'transformer'])
            </div>
            <div class="w-5/6">
                @include('http::asset.prioritize.transformer._table')
            </div>
        </div>
    </div>

@stop