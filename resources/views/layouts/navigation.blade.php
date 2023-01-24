<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16">
            <div class="flex sm:gap-2 md:gap-8">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"/>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:flex">
                    <x-nav-link :href="route('client.index')" :active="request()->routeIs('client.index')">
                        Clients
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:flex">
                    <x-nav-link :href="route('delivery-types')" :active="request()->routeIs('delivery-types')">
                        Delivery Types
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:flex">
                    <x-nav-link :href="route('recent-deliveries')" :active="request()->routeIs('recent-deliveries')">
                        Recent Deliveries
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:flex">
                    <x-nav-link :href="route('inactive-clients')" :active="request()->routeIs('inactive-clients')">
                        Inactive Clients
                    </x-nav-link>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden ml-auto mr-4">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('client.index')" :active="request()->routeIs('client.index')">
                    Clients
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('delivery-types')" :active="request()->routeIs('delivery-types')">
                    Delivery Types
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('recent-deliveries')" :active="request()->routeIs('recent-deliveries')">
                    Recent Deliveries
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('inactive-clients')" :active="request()->routeIs('inactive-clients')">
                    Inactive Clients
                </x-responsive-nav-link>
            </div>
        </div>
    </div>
</nav>
