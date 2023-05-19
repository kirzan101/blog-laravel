<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountabilityFormRequest;
use App\Http\Resources\AccountabilityResource;
use Illuminate\Http\Request;
use App\Models\Accountability;
use Exception;

class AccountabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //all record
        $accountability = Accountability::all();//select * from accountability;
        
        // return $accountability;
        return AccountabilityResource::collection($accountability); // for 2 or more records
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccountabilityFormRequest $request)
    {

        // $request->validate([
        //     'description' => 'required|max:255',
        // ]);

        // create record`
        $accountability = Accountability::create([
            'employee_id' => $request->employee_id,
            'item_id' => $request->item_id,
            'department_id' => $request->department_id,
            'status' => $request->status,
            

        ]);

        return new AccountabilityResource($accountability);
    }

    /**
     * Display the specified resource.
     */
    public function show(Accountability $accountability)
    {
        // return $accountability;
        return new AccountabilityResource($accountability); //for 1 only
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Accountability $accountability)
    {
        try
        {
            $accountability = tap($accountability)->update([
                'employee_id' => $request->employee_id,
                'item_id' => $request->item_id,
                'department_id' => $request->department_id,
                'status' => $request->status,
                
            ]);

            return new AccountabilityResource($accountability);
        } catch(\Exception $e)
        {
            return ['error' => 'has error - ' . $e];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accountability $accountability)
    {
        //delete record
    }
}
