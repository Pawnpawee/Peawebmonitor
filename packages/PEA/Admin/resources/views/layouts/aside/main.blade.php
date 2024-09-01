<li>
    <a href="{{ route('http::dashboard') }}"
        class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700">
        <i class="far fa-desktop text-gray-500 group-hover:text-gray-900"></i>
        <span class="ml-3" sidebar-toggle-item="">Dashboard</span>
    </a>
</li>

@if(!empty(Adapter::getBusiness() && (Sentinel::inRole('BUSINESS_ADMIN') || Sentinel::inRole('BUSINESS_OWNER'))))
<li>
    <button type="button"
        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
        aria-controls="dropdown-crud" data-collapse-toggle="dropdown-accounts" aria-expanded="{{ request()->is('business/accounts*') ? 'true' : 'false' }}">
        <i class="far fa-users-cog text-gray-500 group-hover:text-gray-900"></i>
        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item="">Accounts</span>
        <svg sidebar-toggle-item="" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
    </button>
    <ul id="dropdown-accounts" class="{{ request()->is('business/accounts*') ? '' : 'hidden' }} space-y-2 py-2">
        <li>
            <a href="{{ route('business::account') }}"
                class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700 ">Accounts</a>
        </li>
        <li>
            <a href="{{ route('business::account.invite') }}"
                class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700 ">Invites</a>
        </li>
    </ul>
</li>

<li>
    <a href="{{ route('business::adaccount') }}"
        class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 ">
        <i class="far fa-archive text-gray-500 group-hover:text-gray-900"></i>
        <span class="ml-3" sidebar-toggle-item="">Ad accounts</span>
    </a>
</li>
@endif
<li>
    <a href="{{ route('adsmanager::campaigns') }}"
        class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 ">
        <i class="far fa-rocket text-gray-500 group-hover:text-gray-900"></i>
        <span class="ml-3" sidebar-toggle-item="">Campaigns</span>
    </a>
</li>

<li>
    <a href="{{ route('adsmanager::audience') }}"
        class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 ">
        <i class="far fa-bullseye-pointer text-gray-500 group-hover:text-gray-900"></i>
        <span class="ml-3" sidebar-toggle-item="">Audiences</span>
    </a>
</li>

<li>
    <a href="#"
        class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 ">
        <i class="far fa-list-alt text-gray-500 group-hover:text-gray-900"></i>
        <span class="ml-3" sidebar-toggle-item="">Report</span>
    </a>
</li>
