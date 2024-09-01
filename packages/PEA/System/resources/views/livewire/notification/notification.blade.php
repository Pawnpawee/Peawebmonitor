@extends('http::layouts.base')


{{-- <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script> --}}

@section('title', 'Notification')

@section('content')
    <div class="mt-10">

        <livewire:list-noti />
    </div>

    @livewire('wire-elements-modal')
@endsection
