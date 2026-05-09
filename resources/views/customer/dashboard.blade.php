{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Dashboard Customer</title>
</head>
<body class="bg-light">
   <div class="d-flex">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark vh-100 position-fixed" style="width: 260px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <i class="bi bi-shop me-2 fs-4"></i>
                <span class="fs-4 fw-bold">Customer Portal</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('customer.dashboard') }}" class="nav-link text-white {{ request()->routeIs('customer.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('customer.products') }}" class="nav-link text-white {{ request()->routeIs('customer.products') ? 'active' : '' }}">
                        <i class="bi bi-bag-check me-2"></i> Browse Products
                    </a>
                </li>
                <li>
                    <a href="{{ route('cart.index') }}" class="nav-link text-white {{ request()->routeIs('cart.index') ? 'active' : '' }}">
                        <i class="bi bi-cart3 me-2"></i> My Cart
                    </a>
                </li>
                <li>
                    <a href="{{ route('customer.orders') }}" class="nav-link text-white {{ request()->routeIs('customer.orders') ? 'active' : '' }}">
                        <i class="bi bi-receipt me-2"></i> My Orders
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main.content">
        <div class="top-bar">
            <h3>DASHBOARD</h3>
            <div class="user-info">
                <div class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="user-info">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <strong>{{ Auth::user()->name }}</strong>
                        <form action="{{route('logout')}}" method="POST" style="display: inline">
                            @csrf
                            <button type="submit" class="logout-button">Logout</button>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
        <div class="welcome-card"></div>
        <h3>Welcome, {{ Auth::user()->name }}</h3>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Menggunakan Bootstrap 5.3.3 yang stabil -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Dashboard Customer</title>
</head>
<body class="bg-light">

    <div class="d-flex">
        <!-- SIDEBAR -->
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark vh-100 position-fixed" style="width: 260px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <i class="bi bi-shop me-2 fs-4"></i>
                <span class="fs-4 fw-bold">Customer Portal</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('customer.dashboard') }}" class="nav-link text-white {{ request()->routeIs('customer.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('customer.products') }}" class="nav-link text-white {{ request()->routeIs('customer.products') ? 'active' : '' }}">
                        <i class="bi bi-bag-check me-2"></i> Browse Products
                    </a>
                </li>
                <li>
                    <a href="{{ route('cart.index') }}" class="nav-link text-white {{ request()->routeIs('cart.index') ? 'active' : '' }}">
                        <i class="bi bi-cart3 me-2"></i> My Cart
                    </a>
                </li>
                <li>
                    <a href="{{ route('customer.orders') }}" class="nav-link text-white {{ request()->routeIs('customer.orders') ? 'active' : '' }}">
                        <i class="bi bi-receipt me-2"></i> My Orders
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

        <!-- MAIN CONTENT AREA -->
        <div class="flex-grow-1" style="margin-left: 260px;">
            
            <!-- TOP BAR -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom p-3 sticky-top shadow-sm">
                <div class="container-fluid d-flex justify-content-between">
                    <h5 class="mb-0 fw-bold text-uppercase">Dashboard</h5>
                    
                </div>
            </nav>

            <div class="container-fluid p-4">
                
                <!-- WELCOME BANNER -->
                <div class="card border-0 shadow-sm bg-primary text-white mb-4 overflow-hidden" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h2 class="fw-bold mb-2">Welcome Back, {{ Auth::user()->name }}! 👋</h2>
                                <p class="lead mb-4 opacity-75">Have a great shopping day! Browse our latest collection and enjoy exclusive discounts.</p>
                                <a href="{{ route('customer.products') }}" class="btn btn-light btn-lg fw-bold text-primary shadow-sm">
                                    Start Shopping <i class="bi bi-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div> <!-- container end -->
        </div> <!-- main content end -->
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>