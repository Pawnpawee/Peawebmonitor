<aside id="sidebar" class="l-aside lg:flex hidden" aria-label="Sidebar">
    <div class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">

        <div class="left-0 justify-center w-full p-4 space-x-4 bg-white flex dark:bg-gray-800"
             sidebar-bottom-menu="">

            @if(Sentinel::getUser()->isAdmin())
                <a href="{{ route('admin::dashboard') }}"
{{--                   data-tooltip-target="tooltip-settings"--}}
                   class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                    <i class="fas fa-cog"></i>
                </a>
{{--                <div id="tooltip-settings" role="tooltip"--}}
{{--                     class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700"--}}
{{--                     style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(1741px, 60px);"--}}
{{--                     data-popper-placement="bottom">--}}
{{--                    Admin Settings--}}
{{--                    <div class="tooltip-arrow" data-popper-arrow=""--}}
{{--                         style="position: absolute; left: 0px; transform: translate(55px, 0px);"></div>--}}
{{--                </div>--}}
            @endif

            <a href="{{ route('http::auth.logout') }}"
{{--               data-tooltip-target="tooltip-sign-out"--}}
               class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                <i class="fas fa-sign-out-alt"></i>
            </a>
{{--            <div id="tooltip-sign-out" role="tooltip"--}}
{{--                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700"--}}
{{--                 style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(71px, -64px);"--}}
{{--                 data-popper-placement="top">--}}
{{--                Sign out--}}
{{--                <div class="tooltip-arrow" data-popper-arrow=""--}}
{{--                     style="position: absolute; left: 0px; transform: translate(55px, 0px);"></div>--}}
{{--            </div>--}}
        </div>

        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                <ul class="pb-2 space-y-2">
                    @if(request()->is('admin*') && Sentinel::getUser()->isAdmin())
                        @include('http::layouts.aside.admin')
                    @else
                        @include('http::layouts.aside.main')
                    @endif
                </ul>
            </div>
        </div>

    </div>
</aside>
