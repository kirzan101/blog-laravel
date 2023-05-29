<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserGroupFormRequest;
use App\Models\Department;
use App\Models\UserGroup;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usergroups = UserGroup::all();

        return view('usergroups.index', compact('usergroups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();

        return view('usergroups.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserGroupFormRequest $request)
    {
        UserGroup::create([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'department_id' => $request->department_id
        ]);

        return redirect('/usergroups')->with('message', 'Successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserGroup $usergroup)
    {
        $departments = Department::all();
        return view('usergroups.show', compact('usergroup', 'departments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserGroup $usergroup)
    {
        $departments = Department::all();

        return view('usergroups.edit', compact('usergroup', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserGroupFormRequest $request, UserGroup $usergroup)
    {
        $user_group = tap($usergroup)->update([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'department_id' => $request->department_id
        ]);

        return redirect('/usergroups')->with('message', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserGroup $usergroup)
    {
        $usergroup->delete();

        return redirect('/usergroups')->with('message', 'Successfully Deleted');
    }
}
