@extends('http::layouts.base')

@section('content')

    <div class="container-list">

        @include('http::asset.layouts.header', ['header' => 'Parameter Setting', 'sub_header' => 'Transformer', 'sub_header_type' => 'Edit'])

        @include('http::commons.header-break')

        @include('http::asset.parameter.transformer.form._form', ['sub_header' => 'Transformer'])

    </div>
@stop