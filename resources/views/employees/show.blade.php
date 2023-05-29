@extends('layouts.app')

@section('content')
    <div>
        <h3>Show Employee | <a href="/employees" class="btn btn-primary">Return</a></h3>
        <form>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="first_name">First name</label>
                    <input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" id="first_name"
                        name="first_name" placeholder="First name" value="{{ $employee->first_name }}" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="middle_name">Middle name</label>
                    <input type="text" class="form-control {{ $errors->has('middle_name') ? 'is-invalid' : '' }}" id="middle_name"
                        name="middle_name" placeholder="Middle name" value="{{ $employee->middle_name }}" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="last_name">Last name</label>
                    <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                        id="last_name" name="last_name" placeholder="Last name" value="{{ $employee->last_name }}" disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="position">Position</label>
                    <input type="text" class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" id="position"
                        name="position" placeholder="Position" value="{{ $employee->position }}" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="contact_number">Contact No.</label>
                    <input type="text" class="form-control {{ $errors->has('contact_number') ? 'is-invalid' : '' }}" id="contact_number"
                        name="contact_number" placeholder="Contact No." value="{{ $employee->contact_number }}" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="model">Department</label>
                    <div class="input-group mb-3">
                        <select class="custom-select" id="department" name="department_id" disabled>
                            <option value="">-- select --</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" {{ ($department->id === $employee->department_id) ? 'selected' : '' }}>{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email"
                        name="email" placeholder="Email" value="{{ $employee->user->email }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="model">User Group</label>
                    <div class="input-group mb-3">
                        <select class="custom-select" id="user_group_id" name="user_group_id" disabled>
                            <option value="">-- select --</option>
                            @foreach ($usergroups as $usergroup)
                                <option value="{{ $usergroup->id }}" {{ ($usergroup->id === $employee->user->user_group_id) ? 'selected' : '' }}>{{ $usergroup->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
