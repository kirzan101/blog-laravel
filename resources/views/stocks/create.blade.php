@extends('layouts.app')

@section('content')
    <div>
        <h3>Create Stock | <a href="/items/{{ $item_id }} }}" class="btn btn-primary">Return</a></h3>
        <form method="POST" action="/stocks">
            @csrf
            <input type="text" name="item_id" value="{{ $item_id }}" hidden>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="serial_number">Serial Number</label>
                    <input type="text" class="form-control {{ $errors->has('serial_number') ? 'is-invalid' : '' }}"
                        id="code" name="serial_number" placeholder="serial_number" value="{{ old('serial_number') }}">
                    @if ($errors->has('serial_number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('serial_number') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-4 mb-3">
                    <label for="code">Code</label>
                    <input type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" id="code"
                        name="code" placeholder="Code" value="{{ old('code') }}">
                    @if ($errors->has('code'))
                        <div class="invalid-feedback">
                            {{ $errors->first('code') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-4 mb-3">
                    <label for="manufacture_date">Manufacture date</label>
                    <input type="date" class="form-control {{ $errors->has('manufacture_date') ? 'is-invalid' : '' }}"
                        id="manufacture_date" name="manufacture_date" placeholder="Manufacture date" value="{{ old('manufacture_date') }}">
                    @if ($errors->has('manufacture_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('manufacture_date') }}
                        </div>
                    @endif
                </div>
            </div>
            <button class="btn btn-success" type="submit">Save</button>
        </form>
    </div>
@endsection
