<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: #f4f6f9;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%);
            color: #ecf0f1;
            padding-top: 1rem;
            transition: background 0.3s ease;
        }

        .sidebar .nav-link, .sidebar .btn {
            color: #ecf0f1;
            font-size: 1rem;
        }

        .sidebar .nav-link.active {
            background: #f39c12;
            color: #fff;
        }

        .sidebar .nav-link:hover {
            background: #16a085;
            color: #fff;
        }

        .sidebar .dropdown-toggle {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.5rem 1rem;
        }

        .sidebar .dropdown-toggle .dropdown-icon {
            transition: transform 0.3s;
        }

        .sidebar .dropdown-toggle[aria-expanded="true"] .dropdown-icon {
            transform: rotate(180deg);
        }

        .sidebar .dropdown-menu {
            position: static;
            background: transparent;
            border: none;
            padding-left: 1.5rem;
            margin: 0;
            width: 100%;
        }

        .sidebar .dropdown-menu .nav-link {
            padding: 8px 12px;
            font-size: 0.9rem;
            border-radius: 4px;
            transition: all 0.2s;
        }

        .sidebar .dropdown-menu .nav-link.active {
            background: #f39c12;
            color: #fff;
            font-weight: 500;
        }

        .sidebar .dropdown-menu .nav-link:hover {
            background: #16a085;
            color: #fff;
        }

        .main-content {
            background: #fff;
            min-height: 100vh;
            border-radius: 8px;
            margin: 2rem 0;
            padding: 2rem;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            transition: padding 0.3s ease;
        }

        .main-content h1 {
            color: #2c3e50;
        }

        /* Styling untuk sidebar hover */
        .sidebar:hover {
            background: linear-gradient(180deg, #34495e 0%, #2c3e50 100%);
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                width: 250px;
                height: 100%;
                z-index: 999;
                transition: transform 0.3s ease-in-out;
                transform: translateX(-250px);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .sidebar .nav-link {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                @include('layouts.sidebar')
            </nav>
            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto main-content">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Inisialisasi dan menangani dropdown menu
        document.addEventListener('DOMContentLoaded', function() {
            var dropdownToggles = document.querySelectorAll('.dropdown-toggle');
            dropdownToggles.forEach(function(toggle) {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    var target = this.getAttribute('data-bs-target');
                    var dropdownMenu = document.querySelector(target);

                    // Toggle aria-expanded attribute dan class show pada dropdown menu
                    if (dropdownMenu) {
                        var isExpanded = this.getAttribute('aria-expanded') === 'true';
                        this.setAttribute('aria-expanded', !isExpanded);
                        if (isExpanded) {
                            dropdownMenu.classList.remove('show');
                        } else {
                            dropdownMenu.classList.add('show');
                        }
                    }
                });
            });

            // Buka dropdown secara otomatis jika submenu aktif
            var activeSubmenu = document.querySelector('.dropdown-menu .nav-link.active');
            if (activeSubmenu) {
                var parentDropdown = activeSubmenu.closest('.dropdown-menu');
                var dropdownToggle = document.querySelector('[data-bs-target="#' + parentDropdown.id + '"]');
                if (dropdownToggle) {
                    dropdownToggle.setAttribute('aria-expanded', 'true');
                    parentDropdown.classList.add('show');
                }
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
