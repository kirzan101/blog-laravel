@extends('layouts.app')

@section('content')
    <div>
        <h3>Show Item | <a href="/items" class="btn btn-primary">Return</a></h3>
        <form>
            @csrf
            <div class="form-row">
                <div class="col-md-6 mb-6">
                    <label for="brand">Brand</label>
                    <input type="text" class="form-control {{ $errors->has('brand') ? 'is-invalid' : '' }}" id="brand"
                        name="brand" value="{{ old('brand') ? old('brand') : $item->brand }}" placeholder="Brand" disabled>
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
                        placeholder="Model" disabled>
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
                        <select class="custom-select" id="supplier" name="supplier_id" disabled>
                            <option value="">-- select --</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}"
                                    {{ $supplier->id === $item->supplier_id ? 'selected' : '' }}>{{ $supplier->name }}
                                </option>
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
                        <select class="custom-select" id="department" name="department_id" disabled>
                            <option value="">-- select --</option>
                            @foreach ($departments as $department)
                                <option value="{{ $item->id }}"
                                    {{ $item->id === $item->department_id ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
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
                        placeholder="Description" disabled>
                    @if ($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>
            </div>
        </form>

        <hr>

        <h3>Stocks | Quantity: {{ $item->stocks->count() }} | <a href="/stocks/create/{{ $item->id }}" class="btn btn-primary">Add</a></h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Code</th>
                    <th scope="col">Serial number</th>
                    <th scope="col">Manufacture Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($item->stocks as $stock)
                    <tr>
                        <th>{{ $stock->id }}</th>
                        <td>{{ $stock->code }}</td>
                        <td>{{ $stock->serial_number }}</td>
                        <td>{{ date('M d, Y', strtotime($stock->manufacture_date)) }}</td>
                        <td>
                            <a href="/stocks/{{ $stock->id }}" class="btn btn-info">Show</a>
                            <a href="/stocks/{{ $stock->id }}/edit" class="btn btn-warning text-white">Update</a>
                            <button type="submmit" id="deleteBtn" class="btn btn-danger"
                                form="deleteForm{{ $stock->id }}" >Delete</button>
                            <form action="/stocks/{{ $stock->id }}" id="deleteForm{{ $stock->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
