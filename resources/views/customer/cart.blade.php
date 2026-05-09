{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <h4>Welcome to my cart</h4>



    @if (session('success'))
        <div class="alert-success">
            <i class="bi bi-check-circle"></i>{{ session('success') }}
        </div>
    @endif

    @if ($cartItems->count()> 0)
        <div class="cart-container">
                @foreach ( $cartItems as $item )
                <div class="cart-items">
                    <img src="{{ asset('/storage/products'. $item->product->image) }}" 
                    alt="{{ $item->product->title }}" class="item-image">
                    <div class="item-details">
                        <div class="item-list">{{ $item->product->title }}</div>
                        <div class="item-price">Rp{{ number_format($item->product->price,2,',',',' ) }}</div>
                    </div>
                    <div class="quantity-control">
                        <form action="" method="POST">
                            @csrf
                            @method("PUT")
                            <input type="number" name="quantity" value="{{ $item->quantity }}"
                            min="1" class="qty-input" onchange="this.form.submit()">
                        </form>
                    </div>
                    <form action="" method="POST">
                    @csrf
                        <button type="submit" class="btn-remove"><i class="bi bi-trash"></i> Remove</button>
                    </form>
                </div>  
                @endforeach
            </div>
            <div class="cart-summary">
                <div class="summary-title">Order Summary</div>
                <div class="summary-row">
                    <span>Subtotal</span>
                    <span>Rp{{ number_format($total,2,',','.' ) }}</span>
                </div>
                <div class="summary-total">
                    <span>Total</span>
                    <span>Rp{{ number_format($total,2,',','.' ) }}</span>
                </div>
                <a href="">
                    <button class="btn-checkout">Proceed to checkout</button>
                </a>
            </div>
        </div>
    @else
        <div class="empty-cart">
            <i class="bi bi-cart-x"></i>
            <h4>Your cart is empty</h4>
            <p>Add some products to get start</p>
            <a href="{{ route('customer.products') }}" style="text-decoration: none;">
                <button class="btn-checkout">Browse Products</button>
            </a>
        </div>
    @endif
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
     
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>My Cart</title>
</head>
<body class="bg-light">

    <div class="d-flex">
        <!-- SIDEBAR (Gunakan yang sama dengan produk agar konsisten) -->
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
        
        <!-- MAIN CONTENT -->
        <div class="flex-grow-1" style="margin-left: 250px; padding: 30px;">
            <h3 class="mb-4">Shopping Cart</h3>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if ($cartItems->count() > 0)
                <div class="row">
                    <!-- LIST ITEMS -->
                    <div class="col-md-8">
                        @foreach ($cartItems as $item)
                            <div class="card mb-3 shadow-sm border-0">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <!-- Perbaikan path gambar: tambah slash / -->
                                            <img src="{{ asset('/storage/products/' . $item->product->image) }}" 
                                                 class="img-fluid rounded" alt="...">
                                        </div>
                                        <div class="col-md-4">
                                            <h5 class="mb-0">{{ $item->product->title }}</h5>
                                            <p class="text-primary fw-bold mb-0">Rp{{ number_format($item->product->price, 0, ',', '.') }}</p>
                                        </div>
                                        <div class="col-md-3">
                                            <!-- FORM UPDATE QTY -->
                                            <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method("PUT")
                                                <input type="number" name="quantity" value="{{ $item->quantity }}"
                                                       min="1" class="form-control form-control-sm text-center" 
                                                       onchange="this.form.submit()">
                                            </form>
                                        </div>
                                        <div class="col-md-3 text-end">
                                            <!-- FORM REMOVE -->
                                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                    <i class="bi bi-trash"></i> Remove
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- SUMMARY -->
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Order Summary</h5>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Subtotal</span>
                                    <span>Rp{{ number_format($total, 0, ',', '.') }}</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between mb-4">
                                    <strong>Total</strong>
                                    <strong class="text-primary fs-5">Rp{{ number_format($total, 0, ',', '.') }}</strong>
                                </div>
                                <a href="{{ route('customer.checkout') }}" class="btn btn-primary w-100 py-2 fw-bold">
                                    Proceed to Checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- EMPTY STATE -->
                <div class="card border-0 shadow-sm p-5 text-center">
                    <div class="card-body">
                        <i class="bi bi-cart-x text-muted mb-3" style="font-size: 4rem;"></i>
                        <h4>Your cart is empty</h4>
                        <p class="text-muted">Add some products to get started</p>
                        <a href="{{ route('customer.products') }}" class="btn btn-primary mt-3">
                            Browse Products
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>