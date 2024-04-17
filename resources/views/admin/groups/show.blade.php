@extends('layouts.admin')

@section('header')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Groups') }}
    </h2>
    @endsection

    @section('content')
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 w-1/2 mx-auto space-y-4">
        <p class="font-bold text-lg">Location: <span class="font-normal">{{ $group->location }}</span></p>
        <p class="font-bold text-lg">Number of Users: <span class="font-normal">{{ $group->users->count() }}</span></p>
        <p class="font-bold text-lg">Number of Clean Ups: <span class="font-normal">{{ $group->cleanups->count() }}</span></p>
        <h3 class="text-2xl font-bold mb-4 text-center">Cleanups associated with this group:</h3>
        @if($group->cleanups->isEmpty())
            <p>No cleanups associated with this group.</p>
        @else
            @foreach($group->cleanups as $cleanup)
                <p class="font-bold text-lg">
                    Cleanup Location: 
                    <a href="{{ route('admin.cleanups.show', $cleanup->id) }}" class="text-blue-500 hover:underline">
                        <span class="font-normal">{{ $cleanup->location }}</span>
                    </a>
                </p>
            @endforeach
        @endif
        <div class="flex justify-between">
            <a href="{{ route('admin.cleanups.create') }}" class="bg-green-700 text-white font-bold py-2 px-4 rounded">Create Clean-Up</a>
            <a href="{{ route('admin.groups.edit', $group->id) }}" class="bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
        </div>
        @unless(auth()->user()->groups->contains($group->id))
            <form method="POST" action="{{ route('admin.groups.join', $group->id) }}" onsubmit="console.log('Form submitted')">
                @csrf
                <button type="submit" class="bg-green-700 text-white font-bold py-2 px-4 rounded">Join</button>
            </form>
        @endunless
        @if(auth()->user()->groups->contains($group->id))
            <form method="POST" action="{{ route('admin.groups.leave', $group->id) }}">
                @csrf
                <button type="submit" class="bg-red-700 text-white font-bold py-2 px-4 rounded">Leave</button>
            </form>
        @endif
    </div>
                    @endsection