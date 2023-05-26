<?php

namespace App\Http\Controllers;

use App\Models\Accountability;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Item;
use Illuminate\Http\Request;

class AccountabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accountabilities = Accountability::all();

        return view('accountabilities.index', compact('accountabilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        $departments = Department::all();
        $items = Item::all();

        return view('accountabilities.create', compact('employees', 'departments', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Accountability::create([
            'employee_id' => $request->employee_id,
            'item_id' => $request->item_id,
            'department_id' => $request->department_id,
            'status' => $request->status,
        ]);

        return redirect('/accountabilities')->with('message', 'Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Accountability $accountability)
    {
        $employees = Employee::all();
        $departments = Department::all();
        $items = Item::all();

        return view('accountabilities.show', compact('accountability', 'employees', 'departments', 'items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Accountability $accountability)
    {
        $employees = Employee::all();
        $departments = Department::all();
        $items = Item::all();

        return view('accountabilities.edit', compact('accountability', 'employees', 'departments', 'items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Accountability $accountability)
    {
        $accountability = tap($accountability)->update([
            'employee_id' => $request->employee_id,
            'item_id' => $request->item_id,
            'department_id' => $request->department_id,
            'status' => $request->status,
        ]);

        return redirect('/accountabilities')->with('message', 'Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accountability $accountability)
    {
        $accountability->delete();

        return redirect('/accountabilities')->with('Successfully Deleted');
    }
}
