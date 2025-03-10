<footer class="footer bg-dark text-light py-4">
    <div class="container">
        <div class="row">
            <!-- Company Info -->
            <div class="col-md-4 text-center text-md-start">
                <a class=" fitbuddy-logo text-light" href="{{ route('home') }}">Fit<span>Buddy</span></a>
                <p>Building strength, one rep at a time.</p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4 text-center">
                <h5 class="fw-bold">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/') }}" class="text-light text-decoration-none">Home</a></li>
                    <li><a href="{{ url('/about') }}" class="text-light text-decoration-none">About</a></li>
                    <li><a href="{{ url('/classes') }}" class="text-light text-decoration-none">Classes</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-light text-decoration-none">Contact</a></li>
                </ul>
            </div>

            <!-- Social Media Links -->
            <div class="col-md-4 text-center text-md-end">
                <h5 class="fw-bold">Follow Us</h5>
                <i class="bi bi-facebook fs-5 me-2"></i>
                <i class="bi bi-instagram fs-5 me-2"></i>
                <i class="bi bi-twitter fs-5 me-2"></i>
                <i class="bi bi-youtube fs-5"></i>
            </div>
            
        </div>

        <hr class="border-secondary">

        <!-- Copyright -->
        <div class="text-center">
            <p class="mb-0 ">&copy; {{ date('Y') }} <span1 class="fitbuddy-logo-footer">Fit<span>Buddy</span></span1>. All rights reserved.</p>
        </div>
    </div>
</footer>
