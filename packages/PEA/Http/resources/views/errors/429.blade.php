@extends('http::layouts.error')

@section('icon')
<div class="inline-flex rounded-full bg-red-100 p-4">
    <div class="rounded-full stroke-red-600 bg-red-200 p-4">
        <svg class="w-16 h-16" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M6 8H6.01M6 16H6.01M6 12H18C20.2091 12 22 10.2091 22 8C22 5.79086 20.2091 4 18 4H6C3.79086 4 2 5.79086 2 8C2 10.2091 3.79086 12 6 12ZM6 12C3.79086 12 2 13.7909 2 16C2 18.2091 3.79086 20 6 20H14"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M17 16L22 21M22 16L17 21" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    </div>
</div>
@stop

@section('code', '429')

@section('title', __('Too Many Requests'))

@section('message', __('Sorry, you have sent too many requests to us recently. Please try again later.'))
