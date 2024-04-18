@extends('layouts.admin')

@section('header')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Clean Ups') }}
        </h2>
    </x-slot>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold">Details</h3>
                        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                            <div class="px-4 py-5 sm:px-6">
                                <p><b>Location:</b> {{ $cleanup->location }}</p>
                                <p><b>Time:</b> {{ $cleanup->time }}</p>
                                <p><b>Date:</b> {{ $cleanup->date }}</p>
                                <p><b>Description:</b> {{ $cleanup->description }}</p>
                                <p><b>Group Id:</b> {{ $cleanup->group_id }}</p>
                                @if ($cleanup->group)
                                    <p><b>Group Name:</b> {{ $cleanup->group->name }}</p>
                                @endif
                                <p>{{ $cleanup->users->count() }} users have joined this cleanup.</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-semibold">Actions</h3>
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.cleanups.edit', $cleanup->id) }}" class="btn btn-primary"
                                style="background-color: #007bff; color: white; padding: 10px 20px; border-radius: 5px;">
                                &#9998; Edit
                            </a>

                            <form method="POST" action="{{ route('admin.cleanups.destroy', $cleanup->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    style="background-color: #dc3545; color: white; padding: 10px 20px; border-radius: 5px;">
                                    &#128465; Delete
                                </button>
                            </form>

                                <form method="POST"
                                    action="{{ auth()->user()->cleanUps->contains($cleanup->id)? route('admin.cleanups.leave', $cleanup->id): route('admin.cleanups.join', $cleanup->id) }}"
                                    onsubmit="console.log('Form submitted')">
                                    @csrf
                                    <button type="submit"
                                        class="{{ auth()->user()->cleanUps->contains($cleanup->id)? 'btn btn-warning': 'btn btn-success' }}"
                                        style="background-color: {{ auth()->user()->cleanUps->contains($cleanup->id)? '#ff0000': '#28a745' }}; color: white; padding: 10px 20px; border-radius: 5px;">
                                        {!! auth()->user()->cleanUps->contains($cleanup->id)
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

                        <div id="mapid" style="height: 360px;"></div>
                        <script>
                            var latitude = {{ $cleanup->latitude ?? 0 }};
                            var longitude = {{ $cleanup->longitude ?? 0 }};

                            var map = L.map('mapid').setView([latitude, longitude], 13);

                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19,
                            }).addTo(map);

                            if (latitude !== 0 && longitude !== 0) {
                                L.marker([latitude, longitude]).addTo(map)
                                    .bindPopup('Cleanup Location')
                                    .openPopup();
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    @endsection
