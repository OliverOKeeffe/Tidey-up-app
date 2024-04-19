@extends('layouts.admin') 

@section('header') 
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Clean-ups
    </h2>
@endsection
@section('create-button')
    <div style="display: flex; justify-content: center; margin: opx 0;"> 
        <a href="{{ route('admin.cleanups.create') }}" class="btn btn-success"
            style="background-color: #28a745; color: white; padding: 20px 40px; border-radius: 5px; position: relative; z-index: 1; text-align: center;">
            &#9997; Create Clean-Up 
        </a>
    </div>
@endsection
@section('content') 
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
                        Decscription
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Group Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Group Name
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
                        <td class="px-6 py-4 text-gray-500 dark:text-gray-400">
                            {{ $cleanup->time }}
                        </td>
                        <td class="px-6 py-4 text-gray-500 dark:text-gray-400">
                            {{ $cleanup->date }}
                        </td>
                        <td class="px-6 py-4 text-gray-500 dark:text-gray-400">
                            {{ $cleanup->description }}
                        </td>
                        <td class="px-6 py-4 text-gray-500 dark:text-gray-400">
                            {{ $cleanup->group_id }}
                        </td>
                        <td class="px-6 py-4 text-gray-500 dark:text-gray-400">
                            {{ $cleanup->group->name }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.cleanups.show', $cleanup->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                        </td>
                    </tr>

                @empty
                    <h4>No Clean-ups Found!</h4>
                @endforelse
            </tbody>
        </table>
    @endsection
