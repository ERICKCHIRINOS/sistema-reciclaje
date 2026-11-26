<nav class="navbar navbar-expand-lg navbar-dark bg-primary border-bottom">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center fw-semibold" href="{{ route('dashboard') }}">
            <x-application-logo style="width: 32px; height: 32px;" class="me-2" />
            <span>{{ config('app.name', 'Sistema de Reciclaje') }}</span>
        </a>

        <!-- Hamburger -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links & User Menu -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-semibold' : '' }}"
                       href="{{ route('dashboard') }}">
                        {{ __('Dashboard') }}
                    </a>
                </li>
            </ul>

            <!-- Settings Dropdown -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white"
                       href="#"
                       id="userDropdown"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                {{ __('Profile') }}
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>