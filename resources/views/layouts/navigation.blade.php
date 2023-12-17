<ul class="nav flex-column pt-3 pt-md-0">
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-2" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                <path d="M10 12h4v4h-4z" />
            </svg>
            <span class="mt-1 ms-1 sidebar-text">
                Apartment System
            </span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
        <a href="{{ route('home') }}" class="nav-link">
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

    <hr>

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

    {{-- <li class="nav-item {{ request()->routeIs('expenses.index') ? 'active' : '' }}">
        <a href="{{ route('expenses.index') }}" class="nav-link">
            <span class="sidebar-icon me-3">
                <i class="fas fa-money-bill"></i>
            </span>
            <span class="sidebar-text">{{ __('Expenses') }}</span>
        </a>
    </li> --}}

</ul>
