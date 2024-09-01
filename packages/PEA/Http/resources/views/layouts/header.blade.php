<nav class="l-header">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                {{-- <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar"
                    class="p-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:text-white">
                    <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg id="toggleSidebarMobileClose" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button> --}}
                <ul class="flex flex-row font-bold text-white p-0 border rounded-lg space-x-8 mt-0 border-0">
                  <li>
                      <a href="#" class="block py-2 px-3 text-gray-500 rounded text-white hover:underline hover:decoration-orange-400 hover:decoration-2 md:border-0 md:p-0" aria-current="page">Dashboard</a>
                  </li>
                  <li>
                      <a href="#" class="block py-2 px-3 text-gray-500 rounded text-white hover:underline hover:decoration-orange-400 hover:decoration-2 md:border-0 md:p-0">System</a>
                  </li>
                  <li>
                      <a href="#" class="block py-2 px-3 text-gray-500 rounded text-white hover:underline hover:decoration-orange-400 hover:decoration-2 md:border-0 md:p-0">Network Congestion</a>
                  </li>
                  <li>
                      <a href="{{ route('http::asset.parameter.transformer.list') }}" class="block py-2 px-3 text-gray-500 rounded text-white hover:underline hover:decoration-orange-400 hover:decoration-2 md:border-0 md:p-0">Asset Management</a>
                  </li>
                  <li>
                      <a href="#" class="block py-2 px-3 text-gray-500 rounded text-white hover:underline hover:decoration-orange-400 hover:decoration-2 md:border-0 md:p-0">Event Dispatch</a>
                  </li>
                  <li>
                      <a href="{{route('event::display')}}" class="block py-2 px-3 text-gray-500 rounded hover:text-white hover:underline hover:decoration-orange-400 hover:decoration-2 md:border-0 md:p-0">Event display</a>
                  </li>
                </ul>
            </div>
            <div class="flex items-center">
                <div class="hidden mr-3 -mb-1 sm:block">
                    <span></span>
                </div>

                @persist('layout-header')

                <div class="flex">
                    {{-- <button id="theme-toggle" data-tooltip-target="tooltip-toggle" type="button"
                        class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 ml-3">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div id="tooltip-toggle" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip"
                        style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(1429px, 63px);"
                        data-popper-placement="bottom">
                        Toggle dark mode
                        <div class="tooltip-arrow" data-popper-arrow=""
                            style="position: absolute; left: 0px; transform: translate(69px, 0px);"></div>
                    </div> --}}

                    <div class="flex items-center ml-3">
                        <div>
                            <button type="button"
                                class="flex text-sm rounded-xl focus:ring-2 focus:ring-purple-100 dark:focus:ring-purple-100 p-2"
                                id="user-menu-button-2" aria-expanded="false" data-dropdown-toggle="dropdown-2">
                                <span class="sr-only">Open user menu</span>
                                <p class="font-bold text-gray-500 dark:text-gray-500" role="none">Mr. CXM Team</p>
                                <svg class="w-2.5 h-2.5 ms-2.5 mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" style="color:rgb(107 114 128)"/>
                                </svg>
                            </button>
                        </div>

                        <div class="z-50 hidden my-4 text-sm list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown-2"
                            style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(1549px, 61px);"
                            data-popper-placement="bottom">
                            <ul class="py-1" role="none">
                                {{-- <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:text-white"
                                        role="menuitem">Setting</a>
                                </li> --}}
                                <li>
                                    <a href="{{ route('http::auth.logout') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:text-white"
                                        role="menuitem">Sign out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endpersist()
            </div>
        </div>
    </div>
</nav>
