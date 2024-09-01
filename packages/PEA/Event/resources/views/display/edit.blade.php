@extends('http::layouts.base')

@section('aside')
    @include('event::livewire.display.aside.detail')
@endsection
@section('title', ' Event Display')
@section('content')
    <div class="mx-4">
        <div
            class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="w-full">
                <div class="mb-4">
                    @include("http::commons.breadcrumb", [
                      'items' => [
                          [
                              'text' => 'Event Display',
                                'url' => route('event::display')
                          ]
                      ]
                  ])

                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Event Display</h1>
                </div>
            </div>
        </div>
        @livewire('livewire::display.event-detail',['event'=>$event])
    </div>
@stop
