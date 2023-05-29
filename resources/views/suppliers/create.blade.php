@extends('layouts.app')

@section('content')
    <div>
        <h3>Create Supplier | <a href="/suppliers" class="btn btn-primary">Return</a></h3>
        <form method="POST" action="/suppliers">
            @csrf
            <div class="form-row">
                <div class="col-md-6 mb-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                        name="name" placeholder="Name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-6 mb-6">
                    <label for="contact_no">Contact No.</label>
                    <input type="text" class="form-control {{ $errors->has('contact_number') ? 'is-invalid' : '' }}"
                        id="contact_no" name="contact_number" placeholder="Contact No." value="{{ old('contact_number') }}">
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
                        id="address" name="address" placeholder="Address" value="{{ old('address') }}">
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
