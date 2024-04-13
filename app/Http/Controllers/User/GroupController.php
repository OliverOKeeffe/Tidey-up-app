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


}
