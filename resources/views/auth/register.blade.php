@extends('layout.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100" style="width: 100vw;">
    <div class="col-md-7">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header text-white text-center py-4" style="background: linear-gradient(135deg, #6a11cb, #2575fc); border-top-left-radius: 12px; border-top-right-radius: 12px;">
                <h3 class="fw-bold mb-0">Create an Account</h3>
                <p class="mb-0 text-light small">Join us today and start your journey!</p>
            </div>
            <div class="card-body px-5 py-4">
                
                {{-- Success Message --}}
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register.submit') }}" onsubmit="return validateForm()">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Full Name</label>
                        <input type="text" id="name" name="name" class="form-control p-3 rounded-3 @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter your full name" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control p-3 rounded-3 @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter your email" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                   {{-- Password Field with Toggle --}}
<div class="mb-3 position-relative">
    <label for="password" class="form-label fw-semibold">Password</label>
    <div class="position-relative">
        <input type="password" id="password" name="password" class="form-control p-3 pe-5 rounded-3 @error('password') is-invalid @enderror" placeholder="Create a strong password" required onkeyup="checkPasswordStrength()">
        <i id="togglePasswordIcon" class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3" style="cursor: pointer;" onclick="togglePassword('password', 'togglePasswordIcon')"></i>
    </div>
    <div id="password-strength" class="mt-1"></div>
    @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Password Confirmation with Toggle --}}
<div class="mb-3 position-relative">
    <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
    <div class="position-relative">
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control p-3 pe-5 rounded-3" placeholder="Re-enter your password" required onkeyup="validatePasswordMatch()">
        <i id="toggleConfirmPasswordIcon" class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3" style="cursor: pointer;" onclick="togglePassword('password_confirmation', 'toggleConfirmPasswordIcon')"></i>
    </div>
    <div id="password-match" class="mt-1"></div>
</div>
                    <button type="submit" class="btn btn-lg btn-primary w-100 py-3 fw-bold rounded-3" style="background: linear-gradient(135deg, #6a11cb, #2575fc); border: none;">Sign Up</button>
                </form>
            </div>
            <div class="card-footer text-center bg-white border-0 py-3">
                <p class="mb-0 text-muted">Already have an account? <a href="{{ route('login') }}" class="text-primary fw-semibold">Log in here</a></p>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript for Password Validation and Toggle --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
    let passwordField = document.getElementById("password");
    let confirmPasswordField = document.getElementById("password_confirmation");

    passwordField.addEventListener("change", function() {
        checkPasswordStrength();
        validatePasswordMatch();
    });
    confirmPasswordField.addEventListener("change", validatePasswordMatch);
});

function checkPasswordStrength() {
    let password = document.getElementById('password').value;
    let strengthText = document.getElementById('password-strength');
    
    let minLength = password.length >= 8;
    let hasUpperCase = /[A-Z]/.test(password);
    let hasLowerCase = /[a-z]/.test(password);
    let hasNumber = /[0-9]/.test(password);
    let hasSpecialChar = /[@$!%*?&]/.test(password);

    if (!password) {
        strengthText.innerHTML = "<span class='text-danger fw-bold'>❌ Password is required</span>";
        return;
    }

    if (minLength && hasUpperCase && hasLowerCase && hasNumber && hasSpecialChar) {
        strengthText.innerHTML = "<span class='text-success fw-bold'>✅ Strong Password</span>";
    } else {
        let errors = [];
        if (!minLength) errors.push("at least 8 characters");
        if (!hasUpperCase) errors.push("one uppercase letter");
        if (!hasLowerCase) errors.push("one lowercase letter");
        if (!hasNumber) errors.push("one number");
        if (!hasSpecialChar) errors.push("one special character (@$!%*?&)");
        
        strengthText.innerHTML = "<span class='text-danger fw-bold'>❌ Weak Password: " + errors.join(", ") + "</span>";
    }
}

function validatePasswordMatch() {
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('password_confirmation').value;
    let matchText = document.getElementById('password-match');

    if (!confirmPassword) {
        matchText.innerHTML = "";
        return;
    }

    if (password === confirmPassword) {
        matchText.innerHTML = "<span class='text-success fw-bold'>✅ Passwords Match</span>";
    } else {
        matchText.innerHTML = "<span class='text-danger fw-bold'>❌ Passwords Do Not Match</span>";
    }
}

function togglePassword(fieldId, iconId) {
    let passwordField = document.getElementById(fieldId);
    let icon = document.getElementById(iconId);

    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
    } else {
        passwordField.type = "password";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
    }
}
</script>
@endsection