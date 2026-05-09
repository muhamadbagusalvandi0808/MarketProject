{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h4>Customer Portal</h4>
            <p>Shopping Dashboard</p>
        </div>

        <ul class="nav_menu">
            <li class="nav_item">
                <a href="{{ route('customer.dashboard') }}" class="nav_link">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav_item">
                <a href="{{ route('customer.products') }}" class="nav_link">
                    <i class="bi bag-check"></i>
                    Browser Products
                </a>
            </li>
            <li class="nav_item">
                <a href="{{ route('cart.index') }}" class="nav_link">
                    <i class="bi bi-chart3"></i>
                    My Cart
                </a>
            </li>
            <li class="nav_item">
                <a href="" class="nav_link">
                    <i class="bi bi-receipt"></i>
                    My Orders
                </a>
            </li>
        </ul>
    </div>
    <div class="main-content">
        <div class="top-bar">
            <h3>Welcome to the Product Page</h3>
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
                        <form action="{{ route('logout') }}" method="POST" style="display: inline">
                            @csrf
                            <button type="submit" class="logout-button">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle"></i>{{ session('success') }}
                </div>
            @endif
            @if ($products->count() > 0)
                <div class="products-grid">
                    @foreach ($products as $product)
                        <div class="product-card">
                            <img src="{{ asset('/storage/products/' . $product->image) }}" alt="{{ $product->title }}"
                                class="product-image">
                            <div class="produk-info">
                                <div class="prdouct-title">{{ $product->title }}</div>
                                <div class="product-price">Rp{{ number_format($product->price, 2, ',', '.') }}</div>
                                <div class="produk-stock"></div>
                                <span class="stock-badge">
                                    <i class="bi bi-box-seam"></i> Stock:{{ $product->stok }}
                                </span>
                            </div>
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button class="btn-add-card" type="submit"></button>
                                <i class="bi bi-cart-plus"> Add To Cart </i>
                            </form>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">{{ $products->links() }}</div>
        </div>
    @else
        <div class="empty-state">
            <i class="bi bi-inbox"></i>
            <h4>No Products Available</h4>
        </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Menggunakan versi stabil 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Customer Portal - Products</title>
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
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom p-3 sticky-top">
                <div class="container-fluid">
                    <h3 class="mb-0">Welcome to the Product Page</h3>
                </div>
            </nav>

            <div class="container-fluid p-4">
                
                <!-- ALERT SUCCESS -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <div>{{ session('success') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- PRODUCT GRID -->
                @if ($products->count() > 0)
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
                        @foreach ($products as $product)
                            <div class="col">
                                <div class="card h-100 shadow-sm border-0">
                                    <!-- IMAGE -->
                                    <img src="{{ asset('/storage/products/' . $product->image) }}" 
                                         class="card-img-top" 
                                         alt="{{ $product->title }}"
                                         style="height: 200px; object-fit: cover;">
                                    
                                    <div class="card-body">
                                        <h5 class="card-title text-truncate">{{ $product->title }}</h5>
                                        <h6 class="text-primary fw-bold">Rp{{ number_format($product->price, 2, ',', '.') }}</h6>
                                        
                                        <p class="card-text mb-3">
                                            <span class="badge bg-light text-dark border">
                                                <i class="bi bi-box-seam me-1 text-primary"></i> Stock: {{ $product->stock }}
                                            </span>
                                        </p>

                                        <!-- FORM ADD TO CART -->
                                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary w-100 d-flex align-items-center justify-content-center">
                                                <i class="bi bi-cart-plus me-2"></i> Add To Cart
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- PAGINATION -->
                    <div class="d-flex justify-content-center mt-5">
                        {{ $products->links() }}
                    </div>

                @else
                    <!-- EMPTY STATE -->
                    <div class="text-center py-5">
                        <div class="mb-3">
                            <i class="bi bi-inbox text-muted" style="font-size: 5rem;"></i>
                        </div>
                        <h4 class="text-muted">No Products Available</h4>
                        <p class="text-muted">Please check back later.</p>
                    </div>
                @endif

            </div> <!-- container end -->
        </div> <!-- main content end -->
    </div>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>