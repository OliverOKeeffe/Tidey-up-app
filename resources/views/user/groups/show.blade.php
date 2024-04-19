<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Groups') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto sm:rounded-lg">

                        <div class="mb-4">
                            <h3 class="text-lg font-semibold">Group Details</h3>
                            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                <div class="px-4 py-5 sm:px-6">
                                    <p><b>Name:</b> {{ $group->name}}</p>
                                    <p><b>Location:</b> {{ $group->location }}</p>
                                    <p><b>Number of Users:</b> {{ $group->users->count() }}</p>
                                    <p><b>Number of Clean-Ups:</b> {{ $group->cleanups->count() }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h3 class="text-lg font-semibold">Cleanups associated with this group:</h3>
                            @if($group->cleanups->isEmpty())
                            <p>No cleanups associated with this group.</p>
                            @else
                            @foreach($group->cleanups as $cleanup)
                            <p>
                                <b>Cleanup Location:</b>
                                <a href="{{ route('user.cleanups.show', $cleanup->id) }}"
                                    class="text-blue-500 hover:underline">
                                    <span class="font-normal">{{ $cleanup->location }}</span>
                                </a>
                            </p>
                            @endforeach
                            @endif
                        </div>

                        <div class="mb-4">
                            <h3 class="text-lg font-semibold">Actions</h3>
                            <div class="flex justify-between space-x-4">
                                <form method="POST"
                                    action="{{ auth()->user()->groups->contains($group->id)? route('user.groups.leave', $group->id): route('user.groups.join', $group->id) }}"
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
        </div>
    </div>

</x-app-layout>