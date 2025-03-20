@extends('layout.userlayout')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="welcome-box p-4 text-white rounded mb-4">
        <h2 class="fw-bold">Welcome to FitnessBuddies! 🏋️</h2>
        <p>Your all-in-one platform for gym products, workout plans, and nutrition guides.</p>
    </div>

    <div class="row">
        <!-- My Orders -->
        <div class="col-md-4">
            <div class="dashboard-card">
                <i class="bi bi-bag dashboard-icon"></i>
                <h5>My Orders</h5>
                <p>Track your recent orders and manage purchases.</p>
                <a href="{{ route('orders') }}" class="btn btn-primary">View Orders</a>
            </div>
        </div>

        <!-- Workout Plans -->
        <div class="col-md-4">
            <div class="dashboard-card">
                <i class="bi bi-clipboard-check dashboard-icon"></i>
                <h5>Workout Plans</h5>
                <p>Access personalized workout routines.</p>
                <a href="{{ route('workout_plans') }}" class="btn btn-success">Explore Plans</a>
            </div>
        </div>

        <!-- Nutrition Guides -->
        <div class="col-md-4">
            <div class="dashboard-card">
                <i class="bi bi-nutrition dashboard-icon"></i>
                <h5>Nutrition Guides</h5>
                <p>Discover healthy eating tips & meal plans.</p>
                <a href="{{ route('nutrition_guides') }}" class="btn btn-warning">View Guides</a>
            </div>
        </div>
    </div>
</div>

<style>
    /* Welcome Box */
    .welcome-box {
        background: linear-gradient(135deg, #007bff, #6610f2);
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Dashboard Cards */
    .dashboard-card {
        background: #ffffff;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
    }

    /* Icons */
    .dashboard-icon {
        font-size: 40px;
        color: #007bff;
        margin-bottom: 10px;
    }

    /* Button Styles */
    .btn {
        border-radius: 5px;
        font-weight: bold;
    }
</style>
@endsection
