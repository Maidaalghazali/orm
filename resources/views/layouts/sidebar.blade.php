<ul class="nav flex-column sidebar py-4 px-0" style="min-height:100vh;">
    <!-- Logo or App Name -->
    <li class="nav-item mb-4 px-4">
        <span class="fw-bold fs-4 text-white">Job ku</span>
    </li>

    <!-- Sidebar Links -->
    <li class="nav-item">
        <a href="{{ route('employees.index') }}" class="nav-link {{ request()->routeIs('employees.index') ? 'active' : '' }}">
            <i class="bi bi-person-fill"></i> Karyawan
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('skills.index') }}" class="nav-link {{ request()->routeIs('skills.index') ? 'active' : '' }}">
            <i class="bi bi-award"></i> Skill
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('companies.index') }}" class="nav-link {{ request()->routeIs('companies.index') ? 'active' : '' }}">
            <i class="bi bi-building"></i> Perusahaan
        </a>
    </li>
</ul>

<style>
    .sidebar {
        background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%);
        color: #ecf0f1;
        padding-top: 1rem;
    }

    .sidebar .nav-link {
        color: #ecf0f1;
        font-size: 1rem;
        padding: 0.8rem 1.5rem;
        transition: background 0.3s ease, color 0.3s ease;
    }

    .sidebar .nav-link.active {
        background: #f39c12;
        color: #fff;
    }

    .sidebar .nav-link:hover {
        background: #16a085;
        color: #fff;
    }

    .sidebar .nav-item i {
        margin-right: 10px;
    }

    /* Responsive sidebar */
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
