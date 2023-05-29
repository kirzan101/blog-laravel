@extends('layouts.app')

@section('content')
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6 text-center">
                <!-- Form -->
                <form action="/login" method="post">
                    @csrf
                    <h1>Login</h1>
                    <!-- Input fields -->
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"
                            id="username" placeholder="Username" name="username" value="{{ old('username') }}">
                        @if ($errors->has('username'))
                            <div class="invalid-feedback">
                                {{ $errors->first('username') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                            id="password" placeholder="Password" name="password">
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary btn-customized col-sm-6">Sign in</button>
                    <!-- End input fields -->
                </form>
                <!-- Form end -->
            </div>
        </div>
    </div>
@endsection
