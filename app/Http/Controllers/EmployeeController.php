<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeFormRequest;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\Request;
use App\Models\Employee;
use Exception;

class EmployeeController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //all record
        $employee = Employee::all();//select * from posts;
        
        // return $posts;
        return EmployeeResource::collection($employee); // for 2 or more records
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(EmployeeFormRequest $request)
    {

        // $request->validate([
        //     'description' => 'required|max:255',
        // ]);

        // create record`
        $employee = Employee::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,            
            'last_name' => $request->last_name,            
            'contact_number' => $request->contact_number,            
            'position' => $request->position,            
            'department_id' => $request->department_id,            
            'user_id' => $request->user_id,            
        ]);

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
    public function update(Request $request, Employee $employee)
    {
        try
        {
            // $employee = employee::find($id);

            $employee = tap($employee)->update([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,            
                'last_name' => $request->last_name,            
                'contact_number' => $request->contact_number,            
                'position' => $request->position,            
                'department_id' => $request->department_id,            
                'user_id' => $request->user_id,            
            ]);

            return new EmployeeResource($employee);
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
