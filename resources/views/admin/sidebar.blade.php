<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top py-2">
    <div class="container">
        <!-- BRAND: Khusus Admin -->
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('admin.dashboard') }}">
            <div class="bg-dark rounded-3 d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                <i class="bi bi-shop text-white fs-5"></i>
            </div>
            <span class="fw-bold text-dark" style="letter-spacing: -0.5px;">Khusus Admin</span>
        </a>

        <!-- Hamburger Button untuk Mobile -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU NAVIGASI -->
        <div class="collapse navbar-collapse" id="adminNavbar">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-1">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="nav-link px-3 {{ request()->routeIs('admin.dashboard') ? 'active-link' : 'text-muted' }}">
                        <i class="bi bi-speedometer2 me-1"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" 
                       class="nav-link px-3 {{ request()->routeIs('products.*') ? 'active-link' : 'text-muted' }}">
                        <i class="bi bi-bag-check me-1"></i> Product Management
                    </a>
                </li>
            </ul>

            <!-- USER INFO & DROPDOWN LOGOUT -->
            <div class="dropdown border-start ps-lg-4">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                    <!-- Inisial User -->
                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold shadow-sm me-2" 
                         style="width: 36px; height: 36px; font-size: 0.9rem;">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <!-- Nama User -->
                    <div class="d-none d-sm-block">
                        <small class="text-muted d-block" style="font-size: 10px; line-height: 1;">Logged in as</small>
                        <strong class="text-dark small">{{ Auth::user()->name }}</strong>
                    </div>
                </a>
                
                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-3 p-2" style="border-radius: 12px; min-width: 200px;">
                    <li><h6 class="dropdown-header small text-uppercase">Choose</h6></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item rounded-3 py-2 text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<style>
    /* Style untuk link aktif */
    .active-link {
        color: #6366f1 !important; /* Indigo */
        background-color: #f5f7ff;
        border-radius: 8px;
        font-weight: 600;
    }
    
    .nav-link {
        transition: all 0.2s;
        font-size: 0.95rem;
    }

    .nav-link:hover:not(.active-link) {
        color: #6366f1 !important;
        background-color: #f8fafc;
        border-radius: 8px;
    }

    .dropdown-item:active {
        background-color: #6366f1;
    }
</style>