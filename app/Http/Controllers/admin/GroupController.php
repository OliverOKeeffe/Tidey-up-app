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
        return view('admin.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupRequest $request)
    {
        $rules = [
            'name' => 'required|string|min:2|max:150',
            'location' => 'required|string|min:2|max:150',


        ];
        // display the message if the brand is not a unique name

        // this requests the rules from above for the validation process

        $group = new Group();
        $group->fill($request->all());
        $group->no_of_users = 0;
        $group->no_of_cleanups = 0;
        $group->save();

        return redirect()->route('admin.groups.index')->with('status', 'Group created successfully');
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
    public function edit(string $id)
    {
        $group = Group::findOrFail($id);
        return view('admin.groups.edit', ['group' => $group]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $rules = [
            'location' => 'required|string|min:2|max:150',
            'name' => 'required|string|min:2|max:150',
        ];
        $group->fill($request->all());
        $group->save();

        return redirect()->route('admin.groups.index')->with('status', 'Group updated successfully');
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

    public function myGroups()

{
    $user = auth()->user();
    $groups = $user->groups; // assuming 'groups' is the name of the relationship method in your User model

    return view('admin.groups.my', ['groups' => $groups]);
}
}
