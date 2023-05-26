@extends('layouts.app')

@section('content')
    <div>
        <h3>Show Accountability | <a href="/accountabilities" class="btn btn-primary">Return</a></h3>
        <form>
            @csrf
            <div class="form-row">
                <div class="col-md-6 mb-6">
                    <label for="model">Employee</label>
                    <div class="input-group mb-3">
                        <select class="custom-select" id="employee" name="employee_id" disabled>
                            <option value="">-- select --</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}"
                                    {{ old('employee_id') === $accountability->employee_id || $employee->id === $accountability->employee_id ? 'selected' : '' }}>
                                    {{ $employee->getName() }}</option>
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
                        <select class="custom-select" id="department" name="department_id" disabled>
                            <option value="">-- select --</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ old('department_id') === $accountability->department_id || $department->id === $accountability->department_id ? 'selected' : '' }}>
                                    {{ $department->name }}</option>
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
                        <select class="custom-select" id="item" name="item_id" disabled>
                            <option value="">-- select --</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('item_id') === $accountability->item_id || $item->id === $accountability->item_id ? 'selected' : '' }}>
                                    {{ $item->getItemFull() }}</option>
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
                        <select class="custom-select" id="status" name="status" disabled>
                            <option value="">-- select --</option>
                            <option value="ACCEPTED"
                                {{ old('status') === 'ACCEPTED' || $accountability->status === 'ACCEPTED' ? 'selected' : '' }}>
                                Accepted</option>
                            <option value="PENDING"
                                {{ old('status') === 'PENDING' || $accountability->status === 'PENDING' ? 'selected' : '' }}>
                                Pending</option>
                            <option value="RECEIVED"
                                {{ old('status') === 'RECEIVED' || $accountability->status === 'RECEIVED' ? 'selected' : '' }}>
                                Received</option>
                        </select>
                    </div>
                    @if ($errors->has('status'))
                        <div class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection
