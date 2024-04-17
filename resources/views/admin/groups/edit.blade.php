@extends('layouts.admin')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h3 class="text-2xl font-bold mb-4 text-center">Edit Clean Up</h3>
                <form action="{{ route('admin.groups.update', $group->id ) }}" method="post" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="name" class="font-bold text-lg">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name')? : $group->name }}" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" />
                        @if($errors->has('name'))
                        <span class="text-red-500 text-sm">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div>
                        <label for="location" class="font-bold text-lg">Location</label>
                        <input type="text" name="location" id="location" value="{{ old('location')? : $group->location }}" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" />
                        @if($errors->has('location'))
                        <span class="text-red-500 text-sm">{{ $errors->first('location') }}</span>
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