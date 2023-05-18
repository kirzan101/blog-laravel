<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountabilityFormRequest;
use App\Http\Resources\AccountabilityResource;
use Illuminate\Http\Request;
use App\Models\Accountability;
use Carbon\Carbon;
use Exception;

class AccountabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //all record
        $accountability = Accountability::all(); //select * from accountability;

        // return $accountability;
        return AccountabilityResource::collection($accountability); // for 2 or more records
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccountabilityFormRequest $request)
    {
        // set accountability values
        $accountability_array = [
            'employee_id' => $request->employee_id,
            'item_id' => $request->item_id,
            'department_id' => $request->department_id,
            'status' => $request->status,
        ];

        //check if status is received/returned
        if ($request->status === 'Received') {
            // add received at value
            $received_at_array = ['received_at' => Carbon::now()];

            //add the received at to the accountability array
            $accountability_array = array_merge($accountability_array, $received_at_array);
        } else if ($request->status === 'Returned') {
            $returned_at_array = ['returned_at' => Carbon::now()];

            //add the received at to the accountability array
            $accountability_array = array_merge($accountability_array, $returned_at_array);
        }

        // create accountability
        $accountability = Accountability::create($accountability_array);

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
        try {
            // set accountability values
            $accountability_array = [
                'employee_id' => $request->employee_id,
                'item_id' => $request->item_id,
                'department_id' => $request->department_id,
                'status' => $request->status,
            ];

            //check if status is received/returned
            if ($request->status === 'Received') {
                // add received at value
                $received_at_array = ['received_at' => Carbon::now()];

                //add the received at to the accountability array
                $accountability_array = array_merge($accountability_array, $received_at_array);
            } else if ($request->status === 'Returned') {
                $returned_at_array = ['returned_at' => Carbon::now()];

                //add the received at to the accountability array
                $accountability_array = array_merge($accountability_array, $returned_at_array);
            }

            $accountability = tap($accountability)->update($accountability_array);

            return new AccountabilityResource($accountability);
        } catch (\Exception $e) {
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
