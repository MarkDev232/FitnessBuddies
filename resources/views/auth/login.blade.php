@extends('layout.app')

@section('title', 'Login')

@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4 border-0" style="width: 50%; max-width: 500px;">
            <div class="text-center">
                <h3 class="fw-bold">Welcome Back</h3>
                <p class="text-muted">Sign in to continue</p>
            </div>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rememberMe">
                        <label class="form-check-label text-muted" for="rememberMe">Remember me</label>
                    </div>
                    <a href="#" class="text-decoration-none text-primary">Forgot password?</a>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>

                
            </form>

            <div class="text-center mt-3">
                <p class="text-muted">Don't have an account? <a href="{{ route('register') }}" class="text-primary text-decoration-none">Sign Up</a></p>
            </div>
        </div>
    </div>
@endsection
