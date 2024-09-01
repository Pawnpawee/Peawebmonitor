<li>
    <a href="{{ route('http::dashboard') }}"
        class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700">
        <i class="fas fa-chevron-left text-gray-500 group-hover:text-gray-900 w-5"></i>
        <span class="ml-3" sidebar-toggle-item="">Mainboard</span>
    </a>
</li>

<li>
    <a href="{{ route('admin::account') }}"
        class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700">
        <i class="far fa-users-cog text-gray-500 group-hover:text-gray-900"></i>
        <span class="ml-3" sidebar-toggle-item="">Accounts</span>
    </a>
</li>


<li>
    <button type="button"
        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
        aria-controls="dropdown-users-layouts" data-collapse-toggle="dropdown-users-layouts" aria-expanded="true">
        <i class="far fa-archive text-gray-500 group-hover:text-gray-900"></i>
        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Business</span>
        <i class="fas fa-chevron-down"></i>
    </button>
    <ul id="dropdown-users-layouts" class=" py-2 space-y-2">
        <li>
            <a href="{{ route('admin::business') }}"
                class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">
                Business
            </a>
        </li>

        <li>
            <a href="{{ route('admin::adaccount') }}"
                class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">
                Ad accounts
            </a>
        </li>
    </ul>
</li>

<li>
    <button type="button"
        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
        aria-controls="dropdown-master-layouts" data-collapse-toggle="dropdown-master-layout" aria-expanded="false">
        <i class="far fa-cog text-gray-500 group-hover:text-gray-900"></i>
        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Master</span>
        <i class="fas fa-chevron-down"></i>
    </button>
    <ul id="dropdown-master-layout" class="hidden">
        <li>
            <a href="{{ route('admin::master.objective') }}"
                class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">
                Objectives</a>
        </li>
        <li>
            <a href="{{ route('admin::master.type') }}"
                class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">Type</a>
        </li>
        <li><a href="{{ route('admin::master.bidding') }}"
                class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">
                Bidding</a></li>
        <li><a href="{{ route('admin::master.location') }}"
                class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">Location</a>
        </li>
        <li><a href="{{ route('admin::master.tag') }}"
                class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">
                Tag</a>
        </li>
        <li><a href="{{ route('admin::master.placement') }}"
                class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">
                Placement</a>
        </li>
    </ul>
</li>
