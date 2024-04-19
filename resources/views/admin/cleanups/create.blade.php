@extends('layouts.admin')

@section('content')
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 w-1/2 mx-auto">
        <h3 class="text-2xl font-bold mb-4 text-center">Create Clean Up</h3>
        <form enctype="multipart/form-data" action="{{ route('admin.cleanups.store') }}" method="post" class="space-y-4">
            @csrf
            <div class="flex flex-col">
                <label for="location" class="mb-2 font-bold text-lg">Location</label>
                <input type="text" name="location" id="location" value="{{ old('location') }}"
                    class="border-2 rounded-lg p-2" />
                @if ($errors->has('location'))
                    <span class="text-red-500">{{ $errors->first('location') }}</span>
                @endif
            </div>
            <div class="flex flex-col">
                <label for="time" class="mb-2 font-bold text-lg">Time</label>
                <input type="time" name="time" id="time" value="{{ old('time') }}"
                    class="border-2 rounded-lg p-2" />
                @if ($errors->has('time'))
                    <span class="text-red-500">{{ $errors->first('time') }}</span>
                @endif
            </div>
            <div class="flex flex-col">
                <label for="date" class="mb-2 font-bold text-lg">Date</label>
                <input type="date" name="date" id="date" value="{{ old('date') }}"
                    class="border-2 rounded-lg p-2" />
                @if ($errors->has('date'))
                    <span class="text-red-500">{{ $errors->first('date') }}</span>
                @endif
            </div>
            <div class="flex flex-col">
                <label for="description" class="mb-2 font-bold text-lg">Description</label>
                <input type="text" name="description" id="description" value="{{ old('description') }}"
                    class="border-2 rounded-lg p-2" />
                @if ($errors->has('description'))
                    <span class="text-red-500">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div class="flex flex-col">
                <label for="group" class="mb-2 font-bold text-lg">Group</label>
                <select name="group_id" class="border-2 rounded-lg p-2">
                    @foreach ($groups as $group)
                        <option {{ old('group_id') == $group->id ? 'selected' : '' }} value="{{ $group->id }}">
                            {{ $group->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col">
                <label for="latitude" class="mb-2 font-bold text-lg">Latitude</label>
                <input type="text" name="latitude" id="latitude" value="{{ old('latitude') }}"
                    class="border-2 rounded-lg p-2" />
                @if ($errors->has('latitude'))
                    <span class="text-red-500">{{ $errors->first('latitude') }}</span>
                @endif
            </div>
            <div class="flex flex-col">
                <label for="longitude" class="mb-2 font-bold text-lg">Longitude</label>
                <input type="text" name="longitude" id="longitude" value="{{ old('longitude') }}"
                    class="border-2 rounded-lg p-2" />
                @if ($errors->has('longitude'))
                    <span class="text-red-500">{{ $errors->first('longitude') }}</span>
                @endif
            </div>
            <div class="flex justify-between">
                <button type="submit" class="bg-green-700 text-white font-bold py-2 px-4 rounded">Create</button>
                <a href="{{ route('admin.cleanups.index') }}"
                    class="bg-blue-700 text-white font-bold py-2 px-4 rounded">Back</a>
            </div>
        </form>
    </div>
@endsection
