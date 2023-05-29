@extends('layouts.app')

@section('content')
    <div>
        <h3>Update Supplier | <a href="/suppliers" class="btn btn-primary">Return</a></h3>
        <form method="POST" action="/suppliers/{{ $supplier->id }}">
            @method('PUT')
            @csrf
            <input type="text" name="id" value="{{ $supplier->id }}">
            <div class="form-row">
                <div class="col-md-6 mb-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                        name="name" placeholder="Name" value="{{ (old('name')) ? old('name') : $supplier->name }}">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-6 mb-6">
                    <label for="contact_no">Contact No.</label>
                    <input type="text" class="form-control {{ $errors->has('contact_number') ? 'is-invalid' : '' }}"
                        id="contact_no" name="contact_number" placeholder="Contact No." value="{{ (old('contact_number')) ? old('contact_number') : $supplier->contact_number }}">
                    @if ($errors->has('contact_number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('contact_number') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                        id="address" name="address" placeholder="Address" value="{{ (old('address')) ? old('address') : $supplier->address }}">
                    @if ($errors->has('address'))
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                </div>
            </div>
            <button class="btn btn-success" type="submit">Save</button>
        </form>
    </div>
@endsection
