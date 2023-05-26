@extends('layouts.app')

@section('content')
    <div>
        <h3>Show Supplier | <a href="/suppliers" class="btn btn-primary">Return</a></h3>
        <form>
            <div class="form-row">
                <div class="col-md-6 mb-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                        name="name" placeholder="Name" value="{{ (old('name')) ? old('name') : $supplier->name }}" disabled>
                </div>
                <div class="col-md-6 mb-6">
                    <label for="contact_no">Contact No.</label>
                    <input type="text" class="form-control {{ $errors->has('contact_number') ? 'is-invalid' : '' }}"
                        id="contact_no" name="contact_number" placeholder="Contact No." value="{{ (old('contact_number')) ? old('contact_number') : $supplier->contact_number }}" disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                        id="address" name="address" placeholder="Address" value="{{ (old('address')) ? old('address') : $supplier->address }}" disabled>
                </div>
            </div>
        </form>
    </div>
@endsection
