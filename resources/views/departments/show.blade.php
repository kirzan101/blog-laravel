@extends('layouts.app')

@section('content')
    <div>
        <h3>Show Department | <a href="/departments" class="btn btn-primary">Return</a></h3>
        <form>
            @csrf
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                        name="name" value="{{ old('name') ? old('name') : $department->name }}" placeholder="Name" disabled>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-4 mb-3">
                    <label for="code">Code</label>
                    <input type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" id="code"
                        name="code" value="{{ old('code') ? old('code') : $department->code }}" placeholder="Code" disabled>
                    @if ($errors->has('code'))
                        <div class="invalid-feedback">
                            {{ $errors->first('code') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-4 mb-3">
                    <label for="contact_no">Contact No.</label>
                    <input type="text" class="form-control {{ $errors->has('contact_number') ? 'is-invalid' : '' }}"
                        id="contact_no" name="contact_number"
                        value="{{ old('contact_number') ? old('contact_number') : $department->contact_number }}"
                        placeholder="Contact No." disabled>
                    @if ($errors->has('contact_number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('contact_number') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="description">Description</label>
                    <input type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                        id="description" name="description"
                        value="{{ old('description') ? old('description') : $department->description }}"
                        placeholder="Description" disabled>
                    @if ($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection
