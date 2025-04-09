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

        .table td,
        .table th {
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
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
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
