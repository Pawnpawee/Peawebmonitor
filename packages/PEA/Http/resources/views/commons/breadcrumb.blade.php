<nav class="flex mb-5" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
        @if(request()->is('admin*'))
            <li class="inline-flex items-center">
                <a href="{{ route('admin::dashboard') }}"
                    class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                    Admin
                </a>
            </li>
        @else
{{--            @if($type = Adapter::getAccessType())--}}
{{--                <li class="inline-flex items-center">--}}
{{--                    <a href="#"--}}
{{--                        class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">--}}
{{--                        {{ object_get(Adapter::getBusiness(), 'name') }}</a>--}}
{{--                </li>--}}
{{--            @endif--}}
        @endif

        @foreach($items as $key => $item)
        <li>
            <div class="flex items-center">
                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
                @if($key < count($items) - 1)
                    <a wire:navigate href="{{ $item['url'] }}" class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white max-w-[150px] whitespace-nowrap overflow-hidden text-ellipsis" title="{{ $item['text'] }}">{{ $item['text'] }}</a>
                @else
                    <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500 max-w-[150px] whitespace-nowrap overflow-hidden text-ellipsis" aria-current="page">{{ $item['text'] }}</span>
                @endif
            </div>
        </li>
        @endforeach
    </ol>
</nav>
