<div class="mb-5">
    @if($sub_header)
        <div class="flex flex-row">
            <div class="border-solid border-l-4 border-primary">
                <span class="px-2 text-2xl font-bold text-gray-400">
                    {{ $header }}
                </span>
            </div>
            <div>
                <span class="text-2xl font-bold">
                / {{ $sub_header_type }} {{ $sub_header }}
                </span>
            </div>
        </div>
    @else
        <div class="border-solid border-l-4 border-primary">
            <span class="px-2 text-2xl font-bold">
                {{ $header }}
            </span>
        </div>
    @endif
</div>