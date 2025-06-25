@extends("layouts/master")

@section("title","Login Page")

@section("content")
    <div class="d-flex justify-content-center mt-5">
        <h1 class="display-5">Login</h1>
    </div>
    <form method="POST" action="{{ route('login.custom') }}" class="form">
        @csrf 
        <div class="form-content">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-content">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-content">
            <label>
                <input type="checkbox" name="remember"> Remember Me
            </label>
        </div>
        <div class="form-content">
            <button type="submit" class="btn button-secondary mt-2">Login</button>
        </div>
        <div>
            <p>Don't have an account? <a href="{{ route('register') }}" class="login-register">Register</a></p>
        </div>
    </form>
@endsection