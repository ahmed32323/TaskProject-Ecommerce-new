<!DOCTYPE html>
<html lang="en">
    @include('layouts.partials.frontendhead')

<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">TaskProject<span>Ecomm</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home me-1"></i> Home</a>
                </li>
            </ul>

            <div class="d-flex ms-lg-3">
                <!-- Show Login and Register if user is not authenticated -->
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2"><i class="fas fa-sign-in-alt me-1"></i> Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary me-2"><i class="fas fa-user-plus me-1"></i> Sign Up</a>
                @endguest

                <!-- Show Logout if user is authenticated -->
                @auth
                <a href="{{ route('products.index') }}" class="btn btn-primary me-2"><i class="fas fa-user-plus me-1"></i>Dashboard</a>

                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger me-2"><i class="fas fa-sign-out-alt me-1"></i> Logout</button>
                    </form>
                @endauth

                <a href="#" class="btn btn-primary position-relative">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        0
                    </span>
                </a>
            </div>
        </div>
    </div>
</nav>

    <!-- Main Content -->
    <main>
        @yield('hero')
        <div class="container my-5">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="footer-title">About TaskProjectEcommerce</h5>
                    <p class="text-muted">We provide high-quality products with excellent customer service. Shop with confidence and style.</p>
                    <div class="social-icons mt-4">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="footer-title">Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Sign Up</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="footer-title">Customer Care</h5>
                    <ul class="footer-links">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Track Order</a></li>
                        <li><a href="#">Wishlist</a></li>
                        <li><a href="#">Returns & Exchanges</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="footer-title">Newsletter</h5>
                    <p class="text-muted">Subscribe to receive updates, access to exclusive deals, and more.</p>
                    <div class="input-group mt-3">
                        <input type="email" class="form-control" placeholder="Enter your email" aria-label="Enter your email" aria-describedby="subscribe-btn">
                        <button class="btn btn-primary" type="button" id="subscribe-btn">Subscribe</button>
                    </div>
                </div>
            </div>

            <div class="row text-center footer-bottom">
                <div class="col-md-6 mb-3 mb-md-0">
                    <p class="mb-0">&copy; {{ date('Y') }} ShopElegance. All rights reserved.</p>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-md-end justify-content-center">
                        <img src="https://via.placeholder.com/50x30" alt="Payment Method" class="mx-1">
                        <img src="https://via.placeholder.com/50x30" alt="Payment Method" class="mx-1">
                        <img src="https://via.placeholder.com/50x30" alt="Payment Method" class="mx-1">
                        <img src="https://via.placeholder.com/50x30" alt="Payment Method" class="mx-1">
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true
            });

            // Active nav links
            const currentLocation = window.location.href;
            const navLinks = document.querySelectorAll('.nav-link');

            navLinks.forEach(link => {
                if (link.href === currentLocation) {
                    link.parentElement.classList.add('active');
                }
            });
        });
    </script>
    @yield('additional_scripts')
</body>
</html>
