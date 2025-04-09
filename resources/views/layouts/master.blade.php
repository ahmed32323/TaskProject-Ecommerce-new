<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 250px;
            --primary-color: #4e73df;
            --primary-dark: #3a5bc7;
            --secondary-color: #1cc88a;
            --dark-color: #5a5c69;
            --success-color: #1cc88a;
            --info-color: #36b9cc;
            --warning-color: #f6c23e;
            --danger-color: #e74a3b;
        }

        body {
            background-color: #f8f9fc;
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 100;
            transition: all 0.3s;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        .sidebar-brand {
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 1rem;
        }

        .sidebar-brand h2 {
            color: white;
            font-size: 1.2rem;
            margin: 0;
            font-weight: 700;
            letter-spacing: 0.05em;
        }

        .sidebar-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            margin: 1rem 1rem;
        }

        .sidebar-heading {
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.75rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.13rem;
            padding: 0.5rem 1rem;
            margin-top: 0.5rem;
        }

        .nav-item {
            position: relative;
            margin-bottom: 0.2rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.8) !important;
            padding: 0.75rem 1rem;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.2s;
        }

        .nav-link:hover {
            color: white !important;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 0.35rem;
        }

        .nav-link.active {
            color: white !important;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 0.35rem;
        }

        .nav-link i {
            margin-right: 0.5rem;
            font-size: 1rem;
        }

        /* Content Wrapper */
        .content-wrapper {
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            min-height: 100vh;
            transition: all 0.3s;
        }

        /* Topbar */
        .topbar {
            height: 70px;
            background-color: white;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            position: relative;
            z-index: 1;
        }

        .topbar-divider {
            width: 0;
            border-right: 1px solid #e3e6f0;
            height: 2rem;
            margin: auto 1rem;
        }

        .topbar .dropdown-menu {
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            border: none;
            border-radius: 0.35rem;
        }

        .user-info {
            margin-right: 1rem;
            color: #5a5c69;
            font-weight: 600;
        }

        .user-avatar {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid #eaecf4;
        }

        /* Content */
        .content {
            padding: 1.5rem;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            margin-bottom: 1.5rem;
        }

        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            padding: 0.75rem 1.25rem;
            font-weight: 700;
            font-size: 0.9rem;
            color: var(--primary-dark);
        }

        .card-body {
            padding: 1.25rem;
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .btn-success {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }

        .btn-info {
            background-color: var(--info-color);
            border-color: var(--info-color);
        }

        .btn-warning {
            background-color: var(--warning-color);
            border-color: var(--warning-color);
        }

        .btn-danger {
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }

        /* Tables */
        .table {
            color: #5a5c69;
        }

        .table thead th {
            background-color: #f8f9fc;
            border-bottom: 2px solid #e3e6f0;
            font-weight: 700;
            color: #4e73df;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.03em;
        }

        .table td, .table th {
            vertical-align: middle;
            padding: 0.75rem;
            border-top: 1px solid #e3e6f0;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(78, 115, 223, 0.05);
        }

        /* Alerts */
        .alert {
            border-radius: 0.35rem;
            border: 1px solid transparent;
        }

        .alert-success {
            color: #0f6848;
            background-color: #d1f0e6;
            border-color: #c3e6cb;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        /* Toggleable sidebar */
        .sidebar-toggled .sidebar {
            width: 6.5rem;
        }

        .sidebar-toggled .sidebar .sidebar-brand h2 span,
        .sidebar-toggled .sidebar .nav-item .nav-link span {
            display: none;
        }

        .sidebar-toggled .sidebar .nav-item .nav-link {
            text-align: center;
            padding: 0.75rem 1rem;
            width: 6.5rem;
        }

        .sidebar-toggled .sidebar .nav-item .nav-link i {
            margin-right: 0;
            font-size: 1.25rem;
        }

        .sidebar-toggled .content-wrapper {
            margin-left: 6.5rem;
            width: calc(100% - 6.5rem);
        }

        /* Animations */
        .fade-in {
            animation: fadeIn 0.5s;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 6.5rem;
            }

            .sidebar .sidebar-brand h2 span,
            .sidebar .nav-item .nav-link span {
                display: none;
            }

            .sidebar .nav-item .nav-link {
                text-align: center;
                padding: 0.75rem 1rem;
                width: 6.5rem;
            }

            .sidebar .nav-item .nav-link i {
                margin-right: 0;
                font-size: 1.25rem;
            }

            .content-wrapper {
                margin-left: 6.5rem;
                width: calc(100% - 6.5rem);
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 0;
            }

            .content-wrapper {
                margin-left: 0;
                width: 100%;
            }

            .sidebar-toggled .sidebar {
                width: 6.5rem;
            }

            .sidebar-toggled .content-wrapper {
                margin-left: 6.5rem;
                width: calc(100% - 6.5rem);
            }
        }
    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-brand">
                <h2><i class="bi bi-speedometer2"></i> <span>Admin Panel</span></h2>
            </div>

            <div class="sidebar-divider"></div>

            <div class="sidebar-heading">
                Main
            </div>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
                        <i class="bi bi-house-door"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-divider"></div>

            <div class="sidebar-heading">
                Catalog
            </div>

            <ul class="nav flex-column">

                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link {{ request()->is('categories*') ? 'active' : '' }}">
                        <i class="bi bi-tags"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link {{ request()->is('products*') ? 'active' : '' }}">
                        <i class="bi bi-box"></i>
                        <span>Products</span>
                    </a>
                </li>

            </ul>

            <div class="sidebar-divider"></div>


        </div>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Sidebar Toggle -->
                <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                    <i class="bi bi-list"></i>
                </button>

                <!-- Search Form -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Notifications -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-bell"></i>
                            <span class="badge bg-danger badge-counter">3+</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">Alerts Center</h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="bi bi-bell text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">April 9, 2025</div>
                                    <span class="fw-bold">New order received!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="bi bi-check text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">April 7, 2025</div>
                                    Product "Smartphone X1" has been updated.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>

                    <!-- Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-envelope"></i>
                            <span class="badge bg-danger badge-counter">7</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in" aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">Message Center</h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img src="/api/placeholder/40/40" class="rounded-circle" alt="User Avatar">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Hi there! I am wondering if you can help me with an issue.</div>
                                    <div class="small text-gray-500">Emily Green · 58m</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img src="/api/placeholder/40/40" class="rounded-circle" alt="User Avatar">
                                    <div class="status-indicator"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">I have the reports for last month's sales ready.</div>
                                    <div class="small text-gray-500">John Doe · 1d</div>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                    </li>

                    <div class="topbar-divider"></div>

                    <!-- User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="d-none d-lg-inline text-gray-600 small me-2">Admin User</span>
                            <img class="user-avatar" src="/api/placeholder/40/40" alt="User Avatar">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-person-fill me-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-gear me-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-list-check me-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i class="bi bi-box-arrow-right me-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- Content Area -->
            <div class="content fade-in">
                <!-- Alert Messages -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Page Header -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">@yield('page-header', 'Dashboard')</h1>
                    @yield('page-actions')
                </div>

                <!-- Main Content -->
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Ready to Leave?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Select "Logout" below if you are ready to end your current session.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar
        document.getElementById('sidebarToggleTop').addEventListener('click', function() {
            document.body.classList.toggle('sidebar-toggled');
        });

        // Close dropdowns on click outside
        window.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown-toggle')) {
                const dropdowns = document.querySelectorAll('.dropdown-menu.show');
                dropdowns.forEach(dropdown => {
                    dropdown.classList.remove('show');
                });
            }
        });

        // Auto-hide alerts after 5 seconds
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                const closeButton = alert.querySelector('.btn-close');
                if (closeButton) {
                    closeButton.click();
                }
            }, 5000);
        });
    </script>
    @stack('scripts')
</body>
</html>
