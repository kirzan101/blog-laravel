@extends('layouts.app')

@section('content')
    <div>
        <h3>Create Accountability | <a href="/accountabilities" class="btn btn-primary">Return</a></h3>
        <form method="POST" action="/accountabilities">
            @csrf
            <div class="form-row">
                <div class="col-md-6 mb-6">
                    <label for="model">Employee</label>
                    <div class="input-group mb-3">
                        <select class="custom-select" id="employee" name="employee_id" >
                            <option value="">-- select --</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->getName() }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('employee_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('employee_id') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-6 mb-6">
                    <label for="model">Department</label>
                    <div class="input-group mb-3">
                        <select class="custom-select" id="department" name="department_id" >
                            <option value="">-- select --</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('department_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('department_id') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-6">
                    <label for="model">Item</label>
                    <div class="input-group mb-3">
                        <select class="custom-select" id="item" name="item_id" >
                            <option value="">-- select --</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->getItemFull() }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('item_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('item_id') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-6 mb-6">
                    <label for="model">Status</label>
                    <div class="input-group mb-3">
                        <select class="custom-select" id="status" name="status" >
                            <option value="">-- select --</option>
                            <option value="ACCEPTED">Accepted</option>
                            <option value="PENDING">Pending</option>
                            <option value="RECEIVED">Received</option>
                        </select>
                    </div>
                    @if ($errors->has('status'))
                        <div class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </div>
                    @endif
                </div>
            </div>
            <button class="btn btn-success" type="submit">Save</button>
        </form>
    </div>
@endsection
