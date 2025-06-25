@extends("layouts/master")

@section("title","Register Page")

@section("content")
    <div class="d-flex justify-content-center mt-5">
        <h1 class="display-5">Register</h1>
    </div>
    <form action="{{ route('register.custom') }}" method="POST" class="form">
        @csrf 
        <div class="form-content">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
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
            <button type="submit" class="btn button-secondary mt-2">Sign up</button>
        </div>
        <div>
            <p>Already have an account? <a href="{{ route('login') }}" class="login-register">Login</a></p>
        </div>
    </form>
@endsection