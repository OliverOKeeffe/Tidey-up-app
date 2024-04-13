@extends('layouts.admin')

@section('header')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Groups') }}
    </h2>
    @endsection

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                        <p><b>Name:</b> {{ $group->name }}</p>
                        <p><b>Location:</b> {{ $group->location }}</p>
                        <p><b>Number of Users:</b> {{ $group->no_of_users }}</p>
                        <p><b>Number of Clean Ups:</b> {{ $group->cleanups->count() }}</p>
                        @foreach ($group->cleanups as $cleanup)
                        <p><b>Cleanup Name:</b> {{ $cleanup->name }}</p>
                        @endforeach
                        <h3>Cleanups associated with this group:</h3>
                        @if($group->cleanups->isEmpty())
                        <p>No cleanups associated with this group.</p>
                        @else
                        @foreach($group->cleanups as $cleanup)
                        <p>
                            <b>Cleanup Location:</b>
                            <a href="{{ route('admin.cleanups.show', $cleanup->id) }}">
                                {{ $cleanup->location }}
                            </a>
                        </p>
                        @endforeach
                        @endif
                        <button type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800"><a href="{{ route('admin.groups.edit', $group->id) }}">Edit</a></button>

                        <form method="POST" action="{{ route('admin.groups.destroy' , $group->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>
                        </form>
                        <button type="submit" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800"><a href="{{ route('admin.groups.index') }}">Back</a></button>

                    </div>
                    @endsection