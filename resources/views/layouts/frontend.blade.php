<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | TaskProject</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #3a86ff;
            --secondary-color: #8338ec;
            --accent-color: #ff006e;
            --light-color: #fbfbfe;
            --dark-color: #232946;
            --gray-color: #b8c1ec;
            --success-color: #06d6a0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: var(--dark-color);
            padding-top: 76px;
        }

        /* Navbar Styling */
        .navbar {
            background-color: rgba(255, 255, 255, 0.95) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        .navbar-brand span {
            color: var(--accent-color);
        }

        .nav-link {
            font-weight: 500;
            color: var(--dark-color) !important;
            margin: 0 10px;
            transition: all 0.3s;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
            transform: translateY(-2px);
        }

        .nav-item.active .nav-link {
            color: var(--primary-color) !important;
        }

        .navbar-toggler {
            border: none;
            padding: 0.5rem;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 6rem 0;
            margin-bottom: 4rem;
            border-radius: 0 0 50px 50px;
        }

        /* Card Styling */
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            background-color: white;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            height: 250px;
            object-fit: cover;
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: var(--dark-color);
        }

        .card-text {
            color: #6c757d;
        }

        /* Button Styling */
        .btn {
            padding: 0.6rem 1.5rem;
            border-radius: 30px;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, var(--secondary-color), var(--primary-color));
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-3px);
        }

        /* Footer Styling */
        footer {
            background-color: var(--dark-color);
            color: var(--light-color);
            padding: 4rem 0 2rem;
            margin-top: 5rem;
        }

        .footer-title {
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: white;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: var(--gray-color);
            text-decoration: none;
            transition: all 0.3s;
        }

        .footer-links a:hover {
            color: white;
            padding-left: 5px;
        }

        .social-icons a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            color: white;
            margin-right: 10px;
            transition: all 0.3s;
        }

        .social-icons a:hover {
            background-color: var(--primary-color);
            transform: translateY(-3px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 2rem;
            margin-top: 3rem;
        }

        /* Product Detail Styling */
        .product-detail {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .product-image {
            height: 500px;
            object-fit: cover;
        }

        .product-info {
            padding: 2rem;
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--accent-color);
        }

        .product-description {
            margin: 1.5rem 0;
            color: #6c757d;
            line-height: 1.8;
        }

        .category-badge {
            display: inline-block;
            padding: 0.35rem 0.75rem;
            border-radius: 30px;
            background-color: rgba(58, 134, 255, 0.1);
            color: var(--primary-color);
            font-size: 0.85rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }

        /* Animation Classes */
        .fade-up {
            animation: fadeUp 0.5s ease forwards;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .card-img-top {
                height: 200px;
            }

            .hero-section {
                padding: 4rem 0;
            }

            .product-image {
                height: 300px;
            }
        }
    </style>
    @yield('additional_css')
</head>
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
