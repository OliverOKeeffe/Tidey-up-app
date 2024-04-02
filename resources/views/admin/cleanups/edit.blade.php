@extends('layouts.admin')

@section('content')
<h3>Edit Clean Up</h3>    

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form action="{{ route('admin.cleanups.update', $cleanup->id ) }}" method="post">
    @csrf
    @method('PUT')
    <div>
        <label for="">location</label>

        <input type="text" name="location" id="location" value="{{ old('location')? : $cleanup->location }}"/>

        @if($errors->has('location'))
            <span>{{ $errors->first('location') }}</span>
        @endif
    </div>
    <div>
        <label for="">time</label>
        <input type="time" name="time" id="time" value="{{ old('time')? : $cleanup->time }}"/>
        @if($errors->has('time'))
        <span>{{ $errors->first('time') }}</span>
        @endif
    </div>
    <div>
        <label for="">date</label>
        <input type="text" name="date" id="date" value="{{ old('date')? : $cleanup->date }}"/>
        @if($errors->has('date'))
        <span>{{ $errors->first('date') }}</span>
        @endif
    </div>
    <div>
        <label for="">description</label>
        <input type="text" name="description" id="description" value="{{ old('description')? : $cleanup->description }}"/>
        @if($errors->has('description'))
        <span>{{ $errors->first('description') }}</span>
        @endif
    </div>



    <button type="submit" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Save Clean Up</button>
    <button type="submit" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800"><a href="{{ route('admin.cleanups.index') }}">Back</a></button>

</form>
@endsection