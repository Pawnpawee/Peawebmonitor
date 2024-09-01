@extends('http::layouts.base')

@section('aside')

    @livewire('dashboard::event-sidebar', ['microgrids' => $microgrids])
    
@endsection

@section('content')

    @livewire('dashboard::map')
@stop