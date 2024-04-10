<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCleanUpRequest;
use App\Http\Requests\UpdateCleanUpRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\CleanUp;
use App\Models\Group;


class CleanUpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cleanups = CleanUp::all();
        return view('admin.cleanups.index')->with('cleanups', $cleanups);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Group::all();

        return view('admin.cleanups.create')->with('groups', $groups);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCleanUpRequest $request)
    {
        $rules =[
            'location'=> 'required|string|min:2|max:150',
            'time'=> 'required|time',
            'date'=> 'required|date',
            'description'=> 'required|string|min:2|max:150',
            'group_id' => 'required',

        ];
        // display the message if the brand is not a unique name

        // this requests the rules from above for the validation process

        $cleanUp = new CleanUp();
        $cleanUp->fill($request->all());
        $cleanUp->save();

        return redirect()->route('admin.cleanups.index')->with('status', 'Clean-Up created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cleanUp = CleanUp::findOrFail($id);

        return view('admin.cleanups.show', [
            'cleanup' => $cleanUp
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cleanup = CleanUp::findOrFail($id);
        $groups = Group::all();
        return view('admin.cleanups.edit', ['cleanup' => $cleanup])->with('groups', $groups);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCleanUpRequest $request, string $id)
{

    $rules =[
        'location'=> 'required|string|min:2|max:150',
        'time'=> 'required|date_format:H:i',
        'date'=> 'required|date',
        'description'=> 'required|string|min:2|max:150',
    ];

    $cleanup = CleanUp::findOrFail($id);
    $cleanup->fill($request->all());
    $cleanup->save();

    return redirect()       
        ->route('admin.cleanups.index')
        ->with('status', ' Updated a Clean up successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cleanup = CleanUp::findOrFail($id);
        $cleanup->delete();
    
        return redirect()->route('admin.cleanups.index')->with('status', 'Clean-Up deleted successfully');
    }
    
}
