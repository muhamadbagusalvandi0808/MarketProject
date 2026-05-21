<nav class="navbar navbar-expand-lg border-bottom sticky-top py-2 transition-theme">
    <div class="container">
        <!-- BRAND: Khusus Admin -->
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('admin.dashboard') }}">
            <div class="bg-brand rounded-3 d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                <i class="bi bi-shop text-white fs-5"></i>
            </div>
            <span class="fw-bold brand-text" style="letter-spacing: -0.5px;">Khusus Admin</span>
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

            <!-- DARK MODE TOGGLE & USER INFO -->
            <div class="d-flex align-items-center border-start ps-lg-4 gap-3">
                
                <!-- TOMBOL DARK MODE -->
                <button class="btn btn-link text-muted p-0 border-0 shadow-none" type="button" onclick="toggleTheme()">
                    <i class="bi bi-moon-stars-fill fs-5" id="theme-icon"></i>
                </button>

                <!-- DROPDOWN USER -->
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold shadow-sm me-2" 
                             style="width: 36px; height: 36px; font-size: 0.9rem;">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="d-none d-sm-block">
                            <small class="text-muted d-block" style="font-size: 10px; line-height: 1;">Logged in as</small>
                            <strong class="user-name-text small">{{ Auth::user()->name }}</strong>
                        </div>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-3 p-2 rounded-4">
                        <li><h6 class="dropdown-header small text-uppercase">Opsi Akun</h6></li>
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
    </div>
</nav>

<style>
    /* --- CSS DASAR (LIGHT MODE) --- */
    .navbar { background-color: #ffffff; transition: 0.3s ease; }
    .brand-text, .user-name-text { color: #1e293b; }
    .bg-brand { background-color: #1e293b; }
    
    .active-link {
        color: #6366f1 !important;
        background-color: #f5f7ff;
        border-radius: 8px;
        font-weight: 600;
    }
    
    .nav-link { transition: all 0.2s; font-size: 0.95rem; }
    .nav-link:hover:not(.active-link) {
        color: #6366f1 !important;
        background-color: #f8fafc;
        border-radius: 8px;
    }

    /* --- CSS SAAT DARK MODE AKTIF --- */
    [data-bs-theme='dark'] .navbar { 
        background-color: #1e293b !important; 
        border-color: #334155 !important;
    }
    [data-bs-theme='dark'] .brand-text, 
    [data-bs-theme='dark'] .user-name-text { color: #f1f5f9 !important; }
    
    [data-bs-theme='dark'] .bg-brand { background-color: #334155; }
    
    [data-bs-theme='dark'] .active-link {
        background-color: rgba(99, 102, 241, 0.2);
        color: #a5b4fc !important;
    }
    
    [data-bs-theme='dark'] .nav-link:hover:not(.active-link) {
        background-color: #334155;
        color: #f1f5f9 !important;
    }

    [data-bs-theme='dark'] .dropdown-menu {
        background-color: #1e293b;
        border: 1px solid #334155;
    }
    [data-bs-theme='dark'] .dropdown-item { color: #cbd5e1; }
    [data-bs-theme='dark'] .dropdown-item:hover { background-color: #334155; color: white; }
</style>