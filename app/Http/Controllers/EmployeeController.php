<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\EmployeeFormRequest;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //all record
        $employee = Employee::all(); //select * from posts;

        // return $posts;
        return EmployeeResource::collection($employee); // for 2 or more records
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeFormRequest $request)
    {

        DB::beginTransaction();

        try {
            //Generate username
            $username = Helper::username($request->first_name, $request->last_name);

            $request->validate([
                'email' => 'unique:users,email'
            ]); 

            //Create Users
            $user = User::create([
                'email' => $request->email,
                'username' => $username,
                'password' => bcrypt($request->password),
                'user_group_id' => $request->user_group_id
            ]);

            // create employee
            $employee = Employee::create([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'contact_number' => $request->contact_number,
                'position' => $request->position,
                'department_id' => $request->department_id,
                'user_id' => $user->getKey(),
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }

        DB::commit();

        return new EmployeeResource($employee);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        // return $post;
        return new EmployeeResource($employee); //for 1 only
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeFormRequest $request, Employee $employee)
    {
        DB::beginTransaction();

        try {

            $user = User::find($employee->user_id);

            $user->update([
                'email' => $request->email
            ]);

            $request->validate([
                'email' => 'unique:users,email,'.$user->getKey()
            ]); 

            $employee = tap($employee)->update([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'contact_number' => $request->contact_number,
                'position' => $request->position,
                'department_id' => $request->department_id,
                // 'user_id' => $request->user_id,
            ]);

            return new EmployeeResource($employee);
        } catch (\Exception $e) {
            
            DB::rollBack();

            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }

        DB::commit();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete record
    }
}
