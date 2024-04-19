<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4 text-center">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("You're logged in as an User!") }}
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                <x-nav-link :href="route('user.groups.index')" :active="request()->routeIs('admin.groups')" class="text-lg">
                    {{ __('Groups') }}
                </x-nav-link>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                <x-nav-link :href="route('user.cleanups.index')" :active="request()->routeIs('admin.cleanups')" class="text-lg">
                    {{ __('Clean Ups') }}
                </x-nav-link>
            </div>
        </div>
    </div>
</x-app-layout>
