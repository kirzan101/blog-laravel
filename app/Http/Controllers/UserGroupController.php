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
        //all record
        $usergroups = UserGroup::all(); //select * from usergroup;

        // return $posts;
        return UserGroupResource::collection($usergroups); // for 2 or more records
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserGroupFormRequest $request)
    {

        // $request->validate([
        //     'description' => 'required|max:255',
        // ]);

        // create record`
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
        // return $usergroup;
        return new UserGroupResource($usergroup); //for 1 only
    }

    /**
     * Update the specified resource in storage.
     */
<<<<<<< Updated upstream
<<<<<<< HEAD
    public function update(UserGroupFormRequest $request, UserGroup $usergroup)
=======
    public function update(UserGroupRequest $request, UserGroup $usergroup)
>>>>>>> 746ebf7d2379ade67a0658d3ee88fba3e2f19f27
=======
    public function update(UserGroupFormRequest $request, UserGroup $usergroup)
>>>>>>> Stashed changes
    {
        try {
            //$usergroup = UserGroup::find($id);

            $usergroup = tap($usergroup)->update([
                'name' => $request->name,
                'code' => $request->code,
                'description' => $request->description
            ]);

            return new UserGroupResource($usergroup);
        } catch (\Exception $e) {
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
