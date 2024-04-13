<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CleanUp;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;

class CleanUpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cleanups = CleanUp::all();
        return view('user.cleanups.index')->with('cleanups', $cleanups);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cleanUp = CleanUp::findOrFail($id);

        return view('user.cleanups.show', [
            'cleanup' => $cleanUp
        ]);
    }

    public function join(CleanUp $cleanup)
    {
        // Get the currently authenticated user
        $user = Auth::user();
    
        // Attach the cleanup to the user
        $user->cleanUps()->attach($cleanup->id);
    
        // Redirect to the cleanup's show page
        return redirect()->route('user.cleanups.show', ['cleanup' => $cleanup->id]);
    }
    
    
    public function leave(CleanUp $cleanup)
    {
        // Get the currently authenticated user
        $user = Auth::user();
    
        // Detach the cleanup from the user
        $user->cleanUps()->detach($cleanup->id);
    
        // Redirect to the cleanup's show page
        return redirect()->route('user.cleanups.show', ['cleanup' => $cleanup->id]);
    }
}
