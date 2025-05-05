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
        body { background: #f5f6fa; }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg,rgb(26, 51, 237) 0%,rgb(18, 88, 185) 100%);
            color: #fff;
            padding-top: 1rem;
        }
        .sidebar .nav-link, .sidebar .btn {
            color: #fff;
        }
        .sidebar .nav-link.active {
            background: #fff;
            color: #178ca4;
        }
        .sidebar .nav-link:hover {
            background: #e6f2fa;
            color: #178ca4;
        }
        .main-content {
            background: #fff;
            min-height: 100vh;
            border-radius: 10px;
            margin: 1.5rem 0;
            padding: 2rem;
        }
        
        /* Styling untuk dropdown sidebar */
        .sidebar .dropdown-toggle::after {
            display: none;
        }
        
        .sidebar .dropdown-toggle {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
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
            background: #fff;
            color: #178ca4;
            font-weight: 500;
        }
        
        .sidebar .dropdown-menu .nav-link:hover {
            background: #e6f2fa;
            color: #178ca4;
        }
        
        .sidebar .nav-item.mb-2 {
            margin-bottom: 0.25rem !important;
        }
        
        .sidebar .dropdown-menu .nav-item {
            margin-bottom: 0.25rem;
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
