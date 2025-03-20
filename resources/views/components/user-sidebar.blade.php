<div class="d-flex flex-column vh-100 min-vh-100 p-3 sidebar-bg sidebar">
    <div class="text-white border-bottom pb-3 mb-3">
        <h4 class="fw-bold">
            <a href="{{ route('user.page') }}" class="text-white text-decoration-none">
                <i class="bi bi-person-circle"></i> User Panel
            </a>
        </h4>
    </div>

    <nav class="nav flex-column">
        <a href="{{ route('user.page') }}" class="nav-link {{ request()->routeIs('user.page') ? 'active' : '' }}">
            <i class="bi bi-house-door"></i> Dashboard
        </a>
        <a href="{{ route('orders') }}" class="nav-link {{ request()->routeIs('orders') ? 'active' : '' }}">
            <i class="bi bi-bag"></i> My Orders
        </a>
        <a href="{{ route('subscriptions') }}" class="nav-link {{ request()->routeIs('subscriptions') ? 'active' : '' }}">
            <i class="bi bi-calendar-check"></i> My Subscriptions
        </a>
        <a href="{{ route('workout_plans') }}" class="nav-link {{ request()->routeIs('workout_plans') ? 'active' : '' }}">
            <i class="bi bi-clipboard-check"></i> Workout Plans
        </a>
        <a href="{{ route('nutrition_guides') }}" class="nav-link {{ request()->routeIs('nutrition_guides') ? 'active' : '' }}">
            <i class="bi bi-nutrition"></i> Nutrition Guides
        </a>
        <a href="{{ route('support') }}" class="nav-link {{ request()->routeIs('support') ? 'active' : '' }}">
            <i class="bi bi-headset"></i> Customer Support
        </a>
    </nav>
</div>

<!-- Sidebar CSS -->
<style>
    .sidebar{
        max-width: 1360px;
    }
    /* Sidebar Background */
    .sidebar-bg {
        background-color: #212529; /* Dark background */
        color: white;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        overflow-y: auto;
        padding-top: 20px;
        transition: all 0.3s ease;
    }

    /* Sidebar Links */
    .nav-link {
        color: white;
        padding: 12px 15px;
        font-size: 16px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
    }

    /* Icons */
    .nav-link i {
        margin-right: 10px;
        font-size: 18px;
    }

    /* Active Link */
    .nav-link.active {
        background-color: rgba(255, 255, 255, 0.15);
        font-weight: bold;
    }

    /* Hover Effect */
    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
        transform: translateX(5px); /* Slight move on hover */
    }
</style>
