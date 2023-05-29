@extends('layouts.app')

@section('content')
    <div>
        <h3>Create Item | <a href="/items" class="btn btn-primary">Return</a></h3>
        <form method="POST" action="/items">
            @csrf
            <div class="form-row">
                <div class="col-md-6 mb-6">
                    <label for="brand">Brand</label>
                    <input type="text" class="form-control {{ $errors->has('brand') ? 'is-invalid' : '' }}" id="brand"
                        name="brand" placeholder="Brand" value="{{ old('brand') }}">
                    @if ($errors->has('brand'))
                        <div class="invalid-feedback">
                            {{ $errors->first('brand') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-6 mb-6">
                    <label for="model">Model</label>
                    <input type="text" class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}"
                        id="model" name="model" placeholder="Model" value="{{ old('model') }}">
                    @if ($errors->has('model'))
                        <div class="invalid-feedback">
                            {{ $errors->first('model') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-6">
                    <label for="brand">Supplier</label>
                    <div class="input-group mb-3">
                        <select class="custom-select {{ $errors->has('supplier_id') ? 'is-invalid' : '' }}" id="supplier"
                            name="supplier_id">
                            <option value="">-- select --</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}"
                                    {{ (int)old('supplier_id') === $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('supplier_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('supplier_id') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 mb-6">
                    <label for="model">Department</label>
                    <div class="input-group mb-3">
                        <select class="custom-select {{ $errors->has('department_id') ? 'is-invalid' : '' }}" id="department"
                            name="department_id">
                            <option value="">-- select --</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ ((int)old('department_id') === $department->id ) ? 'selected' : '' }}>
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
                <div class="col-md-12 mb-3">
                    <label for="description">Description</label>
                    <input type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                        id="description" name="description" placeholder="Description" value="{{ old('description') }}">
                    @if ($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>
            </div>

            <button class="btn btn-success" type="submit">Save</button>
        </form>
    </div>
@endsection
