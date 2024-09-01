
    @extends('http::layouts.base')

    @section('title', 'Dashboard')
    
    @section('content')
    <div class="container-list">

        @include('http::asset.layouts.header', ['header' => 'Area Setting', 'sub_header' => null, 'sub_header_type' => null])

        @include('http::commons.header-break')

        <div class="flex flex-row">
            <div class="w-1/6">
                @include('system::asset.layouts.aside', ['active' => 'area'])
            </div>
            <div class="w-5/6">
                <livewire:list-area />
            </div>
        </div>

    </div>
    @livewire('wire-elements-modal')
    @endsection

