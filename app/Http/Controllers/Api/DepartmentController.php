<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentFormRequest;
use App\Http\Resources\DepartmentResource;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;
use PhpParser\Node\Stmt\Catch_;
use Illuminate\Support\Facades\DB;

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
        $department = Department::create([
            'name' => $request->name,
            'code' => $request->code,
            'contact_number' => $request->contact_number,
            'description' => $request->description
        ]);

        return new DepartmentResource($department);
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
    public function update(DepartmentFormRequest $request, Department $department)
    {
        try
        {
            // dd($request);
            // $departments = Department::find($id);

            $department = tap($department)->update([
                'name' => $request->name,
                'code' => $request->code,
                'contact_number' => $request->contact_number,
                'description' => $request->description,
            ]);

            return new DepartmentResource($department);
        } catch(\Exception $e)
        {
            return ['error' => 'has error - ' . $e];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        DB::beginTransaction();
        try{
        //delete record
        $department= Department::find($department->id);

        $department->delete();

        }catch(\Exception $e){
            //throw $th
        DB::rollback();
        
       return response()->json([
        'message'=>'Something Went wrong on Deletion'
       ],500);
    }
    DB::commit();
     return response()->json([
        'message' =>'Successfully Deleted.'
     ], 204);
    }
    }   