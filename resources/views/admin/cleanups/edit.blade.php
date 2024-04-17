@extends('layouts.admin')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h3 class="text-2xl font-bold mb-4 text-center">Edit Clean Up</h3>
                <form action="{{ route('admin.cleanups.update', $cleanup->id ) }}" method="post" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="location" class="font-bold text-lg">Location</label>
                        <input type="text" name="location" id="location" value="{{ old('location')? : $cleanup->location }}" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" />
                        @if($errors->has('location'))
                        <span class="text-red-500 text-sm">{{ $errors->first('location') }}</span>
                        @endif
                    </div>
                    <div>
                        <label for="time" class="font-bold text-lg">Time</label>
                        <input type="time" name="time" id="time" value="{{ old('time') ? old('time') : \Carbon\Carbon::parse($cleanup->time)->format('H:i') }}" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" />
                        @if($errors->has('time'))
                        <span class="text-red-500 text-sm">{{ $errors->first('time') }}</span>
                        @endif
                    </div>
                    <div>
                        <label for="date" class="font-bold text-lg">Date</label>
                        <input type="date" name="date" id="date" value="{{ old('date')? : $cleanup->date }}" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" />
                        @if($errors->has('date'))
                        <span class="text-red-500 text-sm">{{ $errors->first('date') }}</span>
                        @endif
                    </div>
                    <div>
                        <label for="description" class="font-bold text-lg">Description</label>
                        <input type="text" name="description" id="description" value="{{ old('description')? : $cleanup->description }}" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" />
                        @if($errors->has('description'))
                        <span class="text-red-500 text-sm">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                   <div>
    <label for="group" class="font-bold text-lg">Group</label>
    <select name="group_id" id="group" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
        @foreach($groups as $group)
        <option {{ old('group_id') == $group->id ? "selected" : "" }} value="{{$group->id}}">{{$group->location}}</option>
        @endforeach
    </select>
    @if($errors->has('group_id'))
    <span class="text-red-500 text-sm">{{ $errors->first('group_id') }}</span>
    @endif
</div>
<div>
    <label for="latitude" class="font-bold text-lg">Latitude</label>
    <input type="text" name="latitude" id="latitude" value="{{ old('latitude')? : $cleanup->latitude }}" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" />
    @if($errors->has('latitude'))
    <span class="text-red-500 text-sm">{{ $errors->first('latitude') }}</span>
    @endif
</div>
<div>
    <label for="longitude" class="font-bold text-lg">Longitude</label>
    <input type="text" name="longitude" id="longitude" value="{{ old('longitude')? : $cleanup->longitude }}" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" />
    @if($errors->has('longitude'))
    <span class="text-red-500 text-sm">{{ $errors->first('longitude') }}</span>
    @endif
</div>

<div class="flex justify-between">
    <button type="submit" class="bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
    <a href="{{ url()->previous() }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded">Back</a>
</div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection