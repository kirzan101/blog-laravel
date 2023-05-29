<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\EmployeeFormRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $usergroups = UserGroup::all();

        return view('employees.create', compact('departments', 'usergroups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeFormRequest $request)
    {
        $request->validate([
            'email' => 'unique:users,email',
        ]);
        
        DB::beginTransaction();

        try {
            //Generate username
            $username = Helper::username($request->first_name, $request->last_name);

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

            return redirect('/employees')->with('error', 'Something went wrong.');
        }

        DB::commit();

        return redirect('/employees')->with('message', 'Successfully Created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $departments = Department::all();
        $usergroups = UserGroup::all();

        return view('employees.show', compact('employee', 'departments', 'usergroups'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $usergroups = UserGroup::all();

        return view('employees.edit', compact('employee', 'departments', 'usergroups'));
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
                'email' => 'unique:users,email,' . $user->getKey()
            ]);

            $employee = tap($employee)->update([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'contact_number' => $request->contact_number,
                'position' => $request->position,
                'department_id' => $request->department_id,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect('/employees')->with('message', 'Something went wrong');
        }

        DB::commit();

        return redirect('/employees')->with('message', 'Successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        DB::beginTransaction();
        try {
            //delete record
            $user = User::find($employee->user_id);

            $employee->delete();
            $user->delete();
        } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();

            return redirect('/employees')->with('message', 'Something went wrong');
        }

        DB::commit();

        return redirect('/employees')->with('message', 'Successfully Deleted.');
    }
}
