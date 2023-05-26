@extends('layouts.app')

@section('content')
    <div>
        <h3>Update Item | <a href="/items" class="btn btn-primary">Return</a></h3>
        <form method="POST" action="/items/{{ $item->id }}">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="col-md-6 mb-6">
                    <label for="brand">Brand</label>
                    <input type="text" class="form-control {{ $errors->has('brand') ? 'is-invalid' : '' }}" id="brand"
                        name="brand" value="{{ old('brand') ? old('brand') : $item->brand }}" placeholder="Brand" d>
                    @if ($errors->has('brand'))
                        <div class="invalid-feedback">
                            {{ $errors->first('brand') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-6 mb-6">
                    <label for="model">Model</label>
                    <input type="text" class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}"
                        id="model" name="model" value="{{ old('model') ? old('model') : $item->model }}"
                        placeholder="Model" d>
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
                        <select class="custom-select" id="supplier" name="supplier_id" d>
                            <option value="">-- select --</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ ($supplier->id === $item->supplier_id) ? 'selected' : '' }}>{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('brand'))
                        <div class="invalid-feedback">
                            {{ $errors->first('brand') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-6 mb-6">
                    <label for="model">Department</label>
                    <div class="input-group mb-3">
                        <select class="custom-select" id="department" name="department_id" d>
                            <option value="">-- select --</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" {{ ($department->id === $item->department_id) ? 'selected' : '' }}>{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('model'))
                        <div class="invalid-feedback">
                            {{ $errors->first('model') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="description">Description</label>
                    <input type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                        id="description" name="description"
                        value="{{ old('description') ? old('description') : $item->description }}"
                        placeholder="Description" d>
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
