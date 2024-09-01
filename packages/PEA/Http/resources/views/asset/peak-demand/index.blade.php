@extends('http::layouts.base')

@section('content')
    @include('http::asset.layouts.layout-full', ['header' => 'Peak Demand', 'active' => 'peak-demand'])
@stop