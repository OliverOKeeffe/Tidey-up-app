@extends('layouts.admin')

@section('content')
<h3><strong>Create Clean Up</strong></h3>    

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form enctype="multipart/form-data" action="{{ route('admin.cleanups.store') }}" method="post">
    @csrf
    <div>
        <label for="">Location</label>
        <input type="text" name="location" id="location" value="{{  old('location') }}"/>
        @if($errors->has('location'))
        <span>{{ $errors->first('location') }}</span>
        @endif
    </div>
    <div>
        <label for="">Time</label>
        <input type="time" name="time" id="time" value="{{  old('time') }}"/>
        @if($errors->has('time'))
        <span>{{ $errors->first('time') }}</span>
        @endif
    </div>
    <div>
        <label for="">Date</label>
        <input type="date" name="date" id="date" value="{{  old('date') }}"/>
        @if($errors->has('date'))
        <span>{{ $errors->first('date') }}</span>
        @endif
    </div>
    <div>
        <label for="">Description</label>
        <input type="text" name="description" id="description" value="{{  old('description') }}"/>
        @if($errors->has('description'))
        <span>{{ $errors->first('description') }}</span>
        @endif
    </div>
    <div class="form-group">
         <label for="group">Group</label>
          <select name="group_id">
       @foreach($groups as $group)
         <option {{ old('group_id') == $group->id ? "selected" : "" }} value="{{$group->id}}">{{$group->name}}</option>
        @endforeach
        </select>
    </div>
   

    <button type="submit" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Create</button>
    <button type="submit" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800"><a href="{{ route('admin.cleanups.index') }}">Back</a></button>
</form>
@endsection