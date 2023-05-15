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
        $Department = Department::all();//select * from department;
        
        // return $posts;
        return DepartmentResource::collection($Department); // for 2 or more records
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
        $Department = Department::create([
            //'id' => (int) $request->getKey(),
            'name' => $request->name,
            'code' => $request->code,
            'contact_number' => $request->contact_number,
            'description' => $request->description
        ]);

        return new DepartmentResource($Department);
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $Department)
    {
        // return $post;
        return new DepartmentResource($Department); //for 1 only
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try
        {
            $Department = Department::find($id);

            $Department = tap($Department)->update([
                //'id' => (int) $request->getKey(),
                'name' => $request->name,
                'code' => $request->code,
                'contact_number' => $request->contact_number,
                'description' => $request->description
            ]);

            return new DepartmentResource($Department);
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