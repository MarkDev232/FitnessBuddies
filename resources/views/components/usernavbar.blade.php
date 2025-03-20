<nav class="navbar navbar-expand-sm bg-dark shadow-lg w-100">
    <div class="container">
 

        <!-- Right Side of Navbar -->
        <div class="dropdown ms-auto">
            <button class="btn btn-primary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                My Account
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('settings') }}">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<style>
    nav {
        max-width: 1360px;
    }
</style>