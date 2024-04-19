@extends('layouts.admin')

@section('header')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Groups') }}
        </h2>
@endsection


@section('content')
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold">Group Details</h3>
                        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                            <div class="px-4 py-5 sm:px-6">
                                <p><b>Name:</b> {{ $group->name}}</p>
                                <p><b>Location:</b> {{ $group->location }}</p>
                                <p><b>Number of Users:</b> {{ $group->users->count() }}</p>
                                <p><b>Number of Clean Ups:</b> {{ $group->cleanups->count() }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-semibold">Cleanups associated with this group:</h3>
                        @if ($group->cleanups->isEmpty())
                            <p>No cleanups associated with this group.</p>
                        @else
                            @foreach ($group->cleanups as $cleanup)
                                <p class="font-bold text-lg">
                                    Cleanup Location:
                                    <a href="{{ route('admin.cleanups.show', $cleanup->id) }}"
                                        class="text-blue-500 hover:underline">
                                        <span class="font-normal">{{ $cleanup->location }}</span>
                                    </a>
                                </p>
                            @endforeach
                        @endif
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-semibold">Actions</h3>
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.groups.edit', $group->id) }}" class="btn btn-primary"
                                style="background-color: #007bff; color: white; padding: 10px 20px; border-radius: 5px;">
                                &#9998; Edit
                            </a>
                    
                            <form method="POST" action="{{ route('admin.groups.destroy', $group->id) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    style="background-color: #dc3545; color: white; padding: 10px 20px; border-radius: 5px;">
                                    &#128465; Delete
                                </button>
                            </form>
                    
                            <form method="POST"
                                action="{{ auth()->user()->groups->contains($group->id)? route('admin.groups.leave', $group->id): route('admin.groups.join', $group->id) }}"
                                onsubmit="console.log('Form submitted')">
                                @csrf
                                <button type="submit"
                                    class="{{ auth()->user()->groups->contains($group->id)? 'btn btn-warning': 'btn btn-success' }}"
                                    style="background-color: {{ auth()->user()->groups->contains($group->id)? '#ff0000': '#28a745' }}; color: white; padding: 10px 20px; border-radius: 5px;">
                                    {!! auth()->user()->groups->contains($group->id)
                                        ? 'Leave &#x1F44E;'
                                        : 'Join &#x1F44D;' !!}
                                </button>
                            </form>
                    
                            <a href="{{ route('admin.cleanups.create', $group->id) }}" class="btn btn-success"
                                style="background-color: #28a745; color: white; padding: 10px 20px; border-radius: 5px;">
                                &#9997; Create Cleanup
                            </a>
                    
                            <a href="{{ url()->previous() }}" class="btn btn-secondary"
                                style="background-color: #6c757d; color: white; padding: 10px 20px; border-radius: 5px;">
                                &#8617; Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
