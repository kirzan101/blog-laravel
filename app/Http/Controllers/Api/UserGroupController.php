<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserGroupFormRequest;
use App\Http\Resources\UserGroupResource;
use Illuminate\Http\Request;
use App\Models\UserGroup;
use App\Models\Department;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

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
            'description' => $request->description,
            'department_id' => $request->department_id
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
    public function update(UserGroupFormRequest $request, UserGroup $usergroup)
    {
        try {
            //$usergroup = UserGroup::find($id);

            $usergroup = tap($usergroup)->update([
                'name' => $request->name,
                'code' => $request->code,
                'description' => $request->description,
                'department_id' => $request->department_id
            ]);

            return new UserGroupResource($usergroup);
        } catch (\Exception $e) {
            return ['error' => 'has error - ' . $e];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(usergroup $usergroup)
    {
        DB::beginTransaction();
        try{
              //delete record
              $department = Department::find($usergroup->department_id);
              $user = User::find($usergroup->user_id);

              $usergroup->delete();

        } catch (\Exception $e){
            //throw $th;
            DB::rollback();

            return response()->json([
                'message' =>'Something went wrong on deletion'
            ],500);
        

        DB::commit();

        return response()->json([
            'message' => 'Sucessfully Deleted.'
        ],204);
     
    }
    }
}
