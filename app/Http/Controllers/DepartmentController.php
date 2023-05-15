<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentFormRequest;
use App\Http\Resources\DepartmentResource;
use App\Models\department;
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
        $posts = Department::all();//select * from department;
        
        // return $posts;
        return DepartmentResource::collection($posts); // for 2 or more records
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
        $post = Department::create([
            'id' => (int) $request->getKey(),
            'name' => $request->name,
            'code' => $request->code,
            'contact_number' => $request->contact_number,
            'description' => $request->description
        ]);

        return new DepartmentResource($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $post)
    {
        // return $post;
        return new DepartmentResource($post); //for 1 only
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try
        {
            $post = Department::find($id);

            $post = tap($post)->update([
                'id' => (int) $request->getKey(),
                'name' => $request->name,
                'code' => $request->code,
                'contact_number' => $request->contact_number,
                'description' => $request->description
            ]);

            return new DepartmentResource($post);
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