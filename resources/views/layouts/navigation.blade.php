<ul class="nav flex-column pt-3 pt-md-0">
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link d-flex align-items-center">
            <span class="mt-1 ms-1 sidebar-text">
            </span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
        <a href="{{ route('home') }}" class="nav-link">
            <span class="sidebar-icon">
                <i class="fa-solid fa-house"></i>
            </span>
            <span class="sidebar-text mx-2">{{ __('Home') }}</span>
        </a>
    </li>

    @admin
        <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Dashboard') }}</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('apartment.index') ? 'active' : '' }}">
            <a href="{{ route('apartment.index') }}" class="nav-link">
                <span class="sidebar-icon me-3">
                    <i class="fa-solid fa-house"></i>
                </span>
                <span class="sidebar-text">{{ __('Apartments') }}</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('tenant.index') ? 'active' : '' }}">
            <a href="{{ route('tenant.index') }}" class="nav-link">
                <span class="sidebar-icon me-3">
                    <i class="fas fa-user-alt fa-fw"></i>
                </span>
                <span class="sidebar-text">{{ __('Tenants') }}</span>
            </a>
        </li>
    @endadmin

</ul>
