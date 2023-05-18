<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserGroupFormRequest;
use App\Http\Resources\UserGroupResource;
use Illuminate\Http\Request;
use App\Models\UserGroup;
use Exception;

class UserGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usergroup = UserGroup::all();

        return UserGroupResource::collection($usergroup);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserGroupFormRequest $request)
    {
        $usergroup = UserGroup::create([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description
        ]);

        return new UserGroupResource($usergroup);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserGroup $usergroup)
    {
        return new UserGroupResource($usergroup);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserGroup $usergroup)
    {
        try
        {
            $usergroup = tap($usergroup)->update([
                'name' => $request -> name,
                'code' => $request -> code,
                'description' => $request->description
            ]);

            return new UserGroupResource($usergroup);
        } catch(\Exception $e)
        {
            return ['error' => 'has error - ' . $e];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete record
    }
}