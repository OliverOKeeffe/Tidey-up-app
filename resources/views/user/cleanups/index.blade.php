<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Clean Ups') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Location
                </th>
                <th scope="col" class="px-6 py-3">
                    Time
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Group Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Group Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>

            @forelse($cleanups as $cleanup)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $cleanup->location }}
                </th>
                <td class="px-6 py-4">
                    {{ $cleanup->time }}
                </td>
                <td class="px-6 py-4">
                    {{ $cleanup->date}}
                </td>
                <td class="px-6 py-4">
                    {{ $cleanup->description }}
                </td>
                <td class="px-6 py-4">
                    {{ $cleanup->group_id }}
                </td>
                <td class="px-6 py-4">
                    {{ $cleanup->group->name }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('user.cleanups.show', $cleanup->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                </td>
            </tr>
            @empty
                <h4>No Clean Ups found!</h4>
            @endforelse
        </tbody>
    </table>
</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>