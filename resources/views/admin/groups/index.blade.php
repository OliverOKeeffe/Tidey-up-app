@extends('layouts.admin')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Groups
</h2>
@endsection

@section('content')

<button type="submit" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800"><a href="{{ route('admin.groups.create') }}">Create</a></button>



<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Location
                </th>
                <th scope="col" class="px-6 py-3">
                    Number of Users
                </th>
                <th scope="col" class="px-6 py-3">
                    Number of Clean-ups
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
     @forelse($groups as $group)
        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $group->name }}
            </th>
            <td class="px-6 py-4 text-gray-500 dark:text-gray-400">
                {{ $group->location }}
            </td>
            <td class="px-6 py-4 text-gray-500 dark:text-gray-400">
                {{ $group->no_of_users }}
            </td>
            <td class="px-6 py-4 text-gray-500 dark:text-gray-400">
                {{ $group->no_of_cleanups }}
            </td>
            
            <td class="px-6 py-4">
            <a href="{{ route('admin.groups.show', $group->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
            </td>
        </tr>

        @empty
        <h4>No Groups Found!</h4>
        @endforelse
    </tbody>
</table>
@endsection