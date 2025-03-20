<div class="d-flex flex-column vh-100 bg-dark p-3 w-100">
    <div class="text-white border-bottom pb-2">
        <h4>
            <a href="{{ route('user.page') }}" class="text-white text-decoration-none">User Panel</a>
        </h4>
    </div>
    <nav class="nav flex-column mt-3">
        <a href="{{ route('user.page') }}" class="nav-link text-white {{ request()->routeIs('user.page') ? 'active' : '' }}">
            <i class="bi bi-house-door"></i> Dashboard
        </a>
        <a href="{{ route('orders') }}" class="nav-link text-white {{ request()->routeIs('orders') ? 'active' : '' }}">
            <i class="bi bi-bag"></i> My Orders
        </a>
        <a href="{{ route('subscriptions') }}" class="nav-link text-white {{ request()->routeIs('subscriptions') ? 'active' : '' }}">
            <i class="bi bi-calendar-check"></i> My Subscriptions
        </a>
        <a href="{{ route('workout.plans') }}" class="nav-link text-white {{ request()->routeIs('workout.plans') ? 'active' : '' }}">
            <i class="bi bi-clipboard-check"></i> Workout Plans
        </a>
        <a href="{{ route('nutrition.guides') }}" class="nav-link text-white {{ request()->routeIs('nutrition.guides') ? 'active' : '' }}">
            <i class="bi bi-nutrition"></i> Nutrition Guides
        </a>
        <a href="{{ route('support') }}" class="nav-link text-white {{ request()->routeIs('support') ? 'active' : '' }}">
            <i class="bi bi-headset"></i> Customer Support
        </a>
    </nav>
</div>

<style>
    .nav-link.active {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 5px;
        font-weight: bold;
    }
    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 5px;
    }
</style>
