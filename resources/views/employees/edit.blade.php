@extends('layouts.app')

@section('content')
    <div>
        <h3>Edit Employee | <a href="/employees" class="btn btn-primary">Return</a></h3>
        <form method="POST" action="/employees/{{ $employee->id }}">
            @method('PUT')
            @csrf
            <input type="text" name="id" value="{{ $employee->id }}" hidden>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="first_name">First name</label>
                    <input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                        id="first_name" name="first_name" placeholder="First name"
                        value="{{ old('first_name') ? old('first_name') : $employee->first_name }}">
                    @if ($errors->has('first_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('first_name') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-4 mb-3">
                    <label for="middle_name">Middle name</label>
                    <input type="text" class="form-control {{ $errors->has('middle_name') ? 'is-invalid' : '' }}"
                        id="middle_name" name="middle_name" placeholder="Middle name"
                        value="{{ old('middle_name') ? old('middle_name') : $employee->middle_name }}">
                    @if ($errors->has('middle_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('middle_name') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-4 mb-3">
                    <label for="last_name">Last name</label>
                    <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                        id="last_name" name="last_name" placeholder="Last name"
                        value="{{ old('last_name') ? old('last_name') : $employee->last_name }}">
                    @if ($errors->has('last_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('last_name') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="position">Position</label>
                    <input type="text" class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}"
                        id="position" name="position" placeholder="Position"
                        value="{{ old('position') ? old('position') : $employee->position }}">
                    @if ($errors->has('position'))
                        <div class="invalid-feedback">
                            {{ $errors->first('position') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-4 mb-3">
                    <label for="contact_number">Contact No.</label>
                    <input type="text" class="form-control {{ $errors->has('contact_number') ? 'is-invalid' : '' }}"
                        id="contact_number" name="contact_number" placeholder="Contact No."
                        value="{{ old('contact_number') ? old('contact_number') : $employee->contact_number }}">
                    @if ($errors->has('contact_number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('contact_number') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-4 mb-3">
                    <label for="model">Department</label>
                    <div class="input-group mb-3">
                        <select class="custom-select {{ $errors->has('department_id') ? 'is-invalid' : '' }}"
                            id="department" name="department_id">
                            <option value="">-- select --</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ (int) old('department_id') === $department->id || $employee->department_id === $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('department_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('department_id') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        id="email" name="email" placeholder="Email"
                        value="{{ old('email') ? old('email') : $employee->user->email }}">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-6 mb-3">
                    <label for="model">User Group</label>
                    <div class="input-group mb-3">
                        <select class="custom-select {{ $errors->has('user_group_id') ? 'is-invalid' : '' }}"
                            id="user_group_id" name="user_group_id">
                            <option value="">-- select --</option>
                            @foreach ($usergroups as $usergroup)
                                <option value="{{ $usergroup->id }}"
                                    {{ (int) old('user_group_id') === $usergroup->id || $employee->user->user_group_id === $usergroup->id ? 'selected' : '' }}>
                                    {{ $usergroup->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('user_group_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('user_group_id') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <button class="btn btn-success" type="submit">Save</button>
        </form>
    </div>
@endsection
