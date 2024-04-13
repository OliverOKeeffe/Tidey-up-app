<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Group;
use Auth;


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

        return view('user.groups.index', ['groups' => $groups]);
    }

    public function show(string $id)
    {
        $group = Group::findOrFail($id);

        return view('user.groups.show', [
            'group' => $group
        ]);
    }

    public function join(Group $group)
    {
        if ($group->users()->where('user_id', auth()->id())->exists()) {
            // User is already a member of the group
            return redirect()->route('user.groups.show', $group)->with('error', 'You are already a member of this group');
        }

        $group->users()->attach(auth()->user());

        return redirect()->route('user.groups.show', $group)->with('success', 'You have successfully joined the group');
    }

    public function leave(Group $group)
    {
        $group->users()->detach(auth()->user());

        return redirect()->route('user.groups.show', $group)->with('success', 'You have successfully left the group');
    }
}
