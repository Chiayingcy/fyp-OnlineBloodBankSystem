<nav x-data="{ open: false }" class="border-b border-gray-100" style="background-color:#ff5c5c;">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-20 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('hospitals_list')" :active="request()->routeIs('hospitals_list')">
                        {{ __('Hospitals List') }}
                    </x-nav-link>

                    <x-nav-link :href="route('hospitals_list')" :active="request()->routeIs('#')">
                        {{ __('About Us') }}
                    </x-nav-link>

                    <x-nav-link :href="route('hospitals_list')" :active="request()->routeIs('#')">
                        {{ __('Contact Us') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
    </nav>

