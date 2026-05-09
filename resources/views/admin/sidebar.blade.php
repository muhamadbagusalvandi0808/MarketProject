{{-- <div class="sidebar">
    <div class="sidebar-header">
        <h4>Admin Panel</h4>
        <p>Management System</p>
    </div>
    <ul class="nav-menu">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link{{ request()->routeIs('admin.dashboard')?'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('products.index') }}" class="nav-link {{ request()->routeIs('product.*')?'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                Product Management
            </a>
        </li>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.orders.index') }}" class="nav-link {{ request()->routeIs('product.*')?'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                Manage Order
            </a>
        </li>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.sales') }}" class="nav-link {{ request()->routeIs('product.*')?'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                Sales Report
            </a>
        </li>
    </ul>
</div> --}}

<!-- SIDEBAR -->
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark vh-100 position-fixed" style="width: 260px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <i class="bi bi-shop me-2 fs-4"></i>
                <span class="fs-4 fw-bold">Admin Portal</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}" class="nav-link text-white {{ request()->routeIs('products.index') ? 'active' : '' }}">
                        <i class="bi bi-bag-check me-2"></i> Product Management
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.orders.index') }}" class="nav-link text-white {{ request()->routeIs('admin.orders.index') ? 'active' : '' }}">
                        <i class="bi bi-cart3 me-2"></i> Manage Order
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.sales') }}" class="nav-link text-white {{ request()->routeIs('admin.sales') ? 'active' : '' }}">
                        <i class="bi bi-receipt me-2"></i> Sales Report
                    </a>
                </li>
            </ul>
            <hr>
            <!-- USER INFO & LOGOUT -->
            <div class="dropdown">
                <div class="d-flex align-items-center text-white">
                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px; font-weight: bold;">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="flex-grow-1">
                        <small class="d-block">Logged in as</small>
                        <strong class="d-block">{{ Auth::user()->name }}</strong>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="mt-3">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </button>
                </form>
            </div>
        </div>