@extends('layouts.admin')

@section('content')
<h3 class="text-2xl font-bold mb-4 text-center">Create Group</h3>

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 w-1/2 mx-auto">
    <form enctype="multipart/form-data" action="{{ route('admin.groups.store') }}" method="post" class="space-y-4">
        @csrf
        <div class="flex flex-col">
            <label for="name" class="mb-2 font-bold text-lg">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="border-2 rounded-lg p-2"/>
            @if($errors->has('name'))
                <span class="text-red-500">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="flex flex-col">
            <label for="location" class="mb-2 font-bold text-lg">Location</label>
            <input type="text" name="location" id="location" value="{{ old('location') }}" class="border-2 rounded-lg p-2"/>
            @if($errors->has('location'))
                <span class="text-red-500">{{ $errors->first('location') }}</span>
            @endif
        </div>
        <div class="flex justify-between">
            <button type="submit" class="bg-green-700 text-white font-bold py-2 px-4 rounded">Create</button>
            <a href="{{ route('admin.groups.index') }}" class="bg-blue-700 text-white font-bold py-2 px-4 rounded">Back</a>
        </div>
    </form>
</div>
@endsection