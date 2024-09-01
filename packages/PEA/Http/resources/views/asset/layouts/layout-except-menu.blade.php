<div class="bg-white border border-gray-200 p-6 my-5 rounded-xl">

    @include('http::asset.layouts.header', ['header' => $header])

    <div class="flex">
        <div class="w-1/6">
            @include('http::asset.layouts.aside')
        </div>
        <div class="w-5/6">
            @include('http::asset.layouts.content')
        </div>
    </div>

</div>