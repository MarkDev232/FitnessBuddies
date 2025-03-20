@extends('layout.app')

@section('title', 'Login')

@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-5 border-0 rounded-4" style="width: 100%; max-width: 80%;">
            <div class="text-center mb-4">
                <img src="{{ asset('images/favicon.png') }}" alt="Logo" class="mb-3" style="width: 80px;">
            </div>

            {{-- Success Message --}}
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

{{-- Laravel Validation Errors --}}
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Please fix the following issues:
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold text-dark">Email</label>
                    <input type="email" class="form-control rounded-3 p-3" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3 position-relative">
                    <label class="form-label fw-semibold text-dark">Password</label>
                    <div class="position-relative">
                        <input type="password" id="password" class="form-control rounded-3 p-3 pe-5" name="password" placeholder="Enter your password" required>
                        <i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3" id="togglePassword" style="cursor: pointer;"></i>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rememberMe">
                        <label class="form-check-label text-muted" for="rememberMe">Remember me</label>
                    </div>
                    <a href="#" class="text-decoration-none text-primary fw-semibold">Forgot password?</a>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-3 rounded-3 fw-semibold">Login</button>
            </form>

            <div class="text-center mt-4">
                <p class="text-muted">Don't have an account? <a href="{{ route('register') }}" class="text-primary text-decoration-none fw-semibold">Sign Up</a></p>
            </div>
        </div>
    </div>
<!-- Password Toggle Script -->
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        let passwordInput = document.getElementById('password');
        let icon = this;

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.replace('bi-eye-slash', 'bi-eye');
        } else {
            passwordInput.type = 'password';
            icon.classList.replace('bi-eye', 'bi-eye-slash');
        }
    });
</script>
@endsection
