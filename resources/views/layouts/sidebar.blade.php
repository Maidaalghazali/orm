<ul class="nav flex-column sidebar py-4 px-0" style="min-height:100vh;">
    <li class="nav-item mb-4 px-4">
        <span class="fw-bold fs-4">My App</span>
    </li>
    <li class="nav-item">
        <a href="{{ route('employees.index') }}" class="nav-link {{ request()->routeIs('employees.index') ? 'active' : '' }}">
            Karyawan
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('skills.index') }}" class="nav-link {{ request()->routeIs('skills.index') ? 'active' : '' }}">
            Skill
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('companies.index') }}" class="nav-link {{ request()->routeIs('companies.index') ? 'active' : '' }}">
            Perusahaan
        </a>
    </li>
</ul>
