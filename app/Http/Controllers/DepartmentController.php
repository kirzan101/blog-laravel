<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentFormRequest;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use Illuminate\Http\Request;
use Exception;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //all record
        $departments = Department::all();//select * from department;
        
        // return $posts;
        return DepartmentResource::collection($departments); // for 2 or more records
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentFormRequest $request)
    {

        // $request->validate([

        //     'description' => 'required|max:255',
        // ]);

        // create record`
        $departments = Department::create([
            'name' => $request->name,
            'code' => $request->code,
            'contact_number' => $request->contact_number,
            'description' => $request->description,
        ]);

        return new DepartmentResource($departments);
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        // dd($department);
        // return $post;
        return new DepartmentResource($department); //for 1 only
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $departments)
    {
        try
        {
            // $departments = Department::find($id);

            $departments = tap($departments)->update([
                'name' => $request->name,
                'code' => $request->code,
                'contact_number' => $request->contact_number,
                'description' => $request->description,
            ]);

            return new DepartmentResource($departments);
        } catch(Exception $e)
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