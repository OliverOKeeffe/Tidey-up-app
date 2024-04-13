<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use Illuminate\Http\Request;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $groups = Group::all();
        // return view('admin.groups.index')->with('groups', $groups);
        $groups = Group::with('cleanups')->get();

        return view('admin.groups.index', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $group = Group::findOrFail($id);

        $cleanups = $group->cleanups;
        return view('admin.groups.show', ['group' => $group, 'cleanups' => $cleanups]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $group = Group::findOrFail($id);

    // Delete the associated clean_ups records
    $group->cleanUps()->delete();

    $group->delete();

    return redirect()->route('admin.groups.index')->with('status', 'Group deleted successfully');
}
public function join(Group $group)
{
 // Get the currently authenticated user
 $user = Auth::user();

 // Attach the cleanup to the user
 $user->groups()->attach($group->id);

 // Redirect to the cleanup's show page
 return redirect()->route('admin.groups.show', ['group' => $group->id]);
}

public function leave(Request $request, Group $group)
{
    $user = $request->user();
    
    $group->users()->detach($user->id);

    return redirect()->route('admin.groups.show', $group)->with('success', 'You have successfully left the group');
}
}
