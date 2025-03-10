<nav class="navbar navbar-expand-sm bg-light shadow-lg">
    <div class="container">
        <!-- Brand (Always on the left) -->
        <a class="navbar-brand fitbuddy-logo" href="{{ route('home') }}">Fit<span>Buddy</span></a>

        <!-- Navbar Toggler for Small Screens -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Centered Links -->
            <ul class="navbar-nav d-flex justify-content-center w-100">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
            </ul>

            <!-- Login/Dashboard/Logout Button (Always on the right) -->
            <div class="ms-auto">
                @if (Route::has('login'))
                    @auth
                        <x-button href="{{ url('/dashboard') }}" class="btn-success">Dashboard</x-button>

                        <!-- Logout Button -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                        
                    @else
                        @if (Request::route()->getName() === 'login')
                            <x-button href="{{ route('register') }}">Sign Up</x-button>
                        @else
                            <x-button href="{{ route('login') }}">Login</x-button>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>
</nav>
