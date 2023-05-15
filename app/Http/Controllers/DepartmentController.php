<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentFormRequest;
use App\Http\Resources\DepartmentResource;
<<<<<<< Updated upstream
use App\Models\Department;
=======
use App\Models\department;
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
        $Department = Department::all();//select * from department;
        
        // return $posts;
        return DepartmentResource::collection($Department); // for 2 or more records
=======
        $posts = Department::all();//select * from department;
        
        // return $posts;
        return DepartmentResource::collection($posts); // for 2 or more records
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
        $Department = Department::create([
            //'id' => (int) $request->getKey(),
=======
        $post = Department::create([
            'id' => (int) $request->getKey(),
>>>>>>> Stashed changes
            'name' => $request->name,
            'code' => $request->code,
            'contact_number' => $request->contact_number,
            'description' => $request->description
        ]);

<<<<<<< Updated upstream
        return new DepartmentResource($Department);
=======
        return new DepartmentResource($post);
>>>>>>> Stashed changes
    }

    /**
     * Display the specified resource.
     */
<<<<<<< Updated upstream
    public function show(Department $Department)
    {
        // return $post;
        return new DepartmentResource($Department); //for 1 only
=======
    public function show(Department $post)
    {
        // return $post;
        return new DepartmentResource($post); //for 1 only
>>>>>>> Stashed changes
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try
        {
<<<<<<< Updated upstream
            $Department = Department::find($id);

            $Department = tap($Department)->update([
                //'id' => (int) $request->getKey(),
=======
            $post = Department::find($id);

            $post = tap($post)->update([
                'id' => (int) $request->getKey(),
>>>>>>> Stashed changes
                'name' => $request->name,
                'code' => $request->code,
                'contact_number' => $request->contact_number,
                'description' => $request->description
            ]);

<<<<<<< Updated upstream
            return new DepartmentResource($Department);
        } catch(Exception $e)
=======
            return new DepartmentResource($post);
        } catch(\Exception $e)
>>>>>>> Stashed changes
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