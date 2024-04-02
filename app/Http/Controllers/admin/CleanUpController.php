<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCleanUpRequest;
use App\Http\Requests\UpdateCleanUpRequest;
use App\Models\CleanUp;
use Auth;

class CleanUpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cleanups = CleanUp::paginate(10);
        return view('admin.cleanups.index')->with('cleanups', $cleanups);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cleanups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCleanUpRequest $request)
    {
        //
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
        return view('admin.cleanups.edit', [
            'cleanup' => $cleanup
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCleanUpRequest $request, CleanUp $cleanUp)
    {
        //
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
