{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Order Detail</title>
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
                <a href="{{ route('customer.orders') }}" class="nav_link">
                    <i class="bi bi-receipt"></i>
                    My Orders
                </a>
            </li>
        </ul>
    </div>
    <div class="main.content">
        <div class="top-bar">
            <h3>Order Detail</h3>
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
        </div>
            <a href="{{ route('customer.orders') }}" class="back-btn">
                <i class="bi bi-arrow-right"></i>Back to orders
            </a>
            <div class="content-card">
                <div class="section-header">Order Information</div>
                <div class="info-grid">
                    <div>
                        <div class="info-label">Order Number</div>
                        <div class="info-value">{{ $order->order_number }}</div>
                    </div>
                    <div>
                        <div class="info-label">Date Placed</div>
                        <div class="info-value">{{ $order->created_at->format('d M Y, H:i')}}</div>
                    </div>
                    <div>
                        <div class="info-label">Status</div>
                        <div class="info-value">
                            <span class="badge-status status-{{ $order->status }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                    </div>
                    <div>
                        <div class="info-label">Payment Method</div>
                        <div class="info-value text-uppercase">{{str_replace('_', ' ', $order->payment_method)}}</div>
                    </div>
                </div>
            </div>
        <div class="content-card">
            <div class="section-header">Shipping Details</div>
            <div class="info-grid">
                <div>
                    <div class="info-label">Receipt Name</div>
                    <div class="info-value">{{ $order->shipping_name }}</div>
                </div>
                <div>
                    <div class="info-label">Phone Number</div>
                    <div class="info-value">{{ $order->shipping_phone }}</div>
                </div>
                <div style="grid-column:span 2;">
                    <div class="info-label">Shipping Address</div>
                    <div class="info-value">{{ $order->shipping_address }}</div>
                </div>
            </div>
        </div>
        <div class="content-card">
            <div class="section-header">Order Item</div>
            <table class="order-item-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th class="text-end">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItems as $item)
                        <tr>
                            <td>
                                <div class="item-rows">
                                    <img src="{{ asset('storage/products/.$item->product->image') }}" alt="" class="item-image">
                                    <span style="font-weight: 500">{{ $item->product->title }}</span>
                                </div>
                            </td>
                            <td>RP{{ number_format($item->price,2,',','.') }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td class="text-end" style="font-weight: 600">
                                RP{{ number_format($item->price * $item->quantity, 2, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>Total</td>
                        <td>RP {{ number_format($item->price * $item->quantity, 2, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
 --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Order Detail</title>
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
                    <a href="{{ route('customer.orders') }}" class="nav-link text-white {{ request()->routeIs('customer.orders*') ? 'active' : '' }}">
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
        <div class="flex-grow-1" style="margin-left: 260px; background-color: #f8f9fa; min-height: 100vh;">
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom p-3 sticky-top shadow-sm">
                <div class="container-fluid">
                    <h5 class="mb-0 fw-bold">Order Detail</h5>
                    <a href="{{ route('customer.orders') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-arrow-left me-2"></i>Back to Orders
                    </a>
                </div>
            </nav>

            <div class="container-fluid p-4">
                <div class="row g-4">
                    <!-- Left Side: Order & Shipping Info -->
                    <div class="col-lg-8">
                        <!-- Order Status Card -->
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <p class="text-muted small mb-1">Order Number</p>
                                        <h4 class="fw-bold mb-0 text-primary">#{{ $order->order_number }}</h4>
                                    </div>
                                    <div class="text-end">
                                        <p class="text-muted small mb-1">Date Placed</p>
                                        <p class="fw-bold mb-0">{{ $order->created_at->format('d M Y, H:i') }}</p>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="p-3 border rounded bg-light">
                                            <p class="text-muted small mb-1">Status Pesanan</p>
                                            <span class="badge rounded-pill 
                                                {{ $order->status == 'pending' ? 'bg-warning text-dark' : ($order->status == 'completed' ? 'bg-success' : 'bg-secondary') }}">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3 border rounded bg-light">
                                            <p class="text-muted small mb-1">Metode Pembayaran</p>
                                            <p class="fw-bold mb-0 text-uppercase">{{ str_replace('_', ' ', $order->payment_method) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Shipping Card -->
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body p-4">
                                <h6 class="fw-bold mb-3"><i class="bi bi-truck me-2 text-primary"></i>Shipping Details</h6>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <p class="text-muted small mb-1">Receipt Name</p>
                                        <p class="fw-bold mb-0">{{ $order->shipping_name }}</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <p class="text-muted small mb-1">Phone Number</p>
                                        <p class="fw-bold mb-0">{{ $order->shipping_phone }}</p>
                                    </div>
                                    <div class="col-12">
                                        <p class="text-muted small mb-1">Shipping Address</p>
                                        <p class="mb-0 text-secondary">{{ $order->shipping_address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Items Card -->
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h6 class="fw-bold mb-3"><i class="bi bi-bag me-2 text-primary"></i>Order Items</h6>
                                <div class="table-responsive">
                                    <table class="table align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Product</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Qty</th>
                                                <th class="text-end">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->orderItems as $item)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ asset('storage/products/' . $item->product->image) }}" 
                                                                 alt="" class="rounded me-3" 
                                                                 style="width: 50px; height: 50px; object-fit: cover;">
                                                            <span class="fw-medium">{{ $item->product->title }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                                                    <td class="text-center">{{ $item->quantity }}</td>
                                                    <td class="text-end fw-bold">Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side: Summary -->
                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm sticky-top" style="top: 100px;">
                            <div class="card-body p-4">
                                <h6 class="fw-bold mb-4">Order Summary</h6>

                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Subtotal Items</span>
                                    <span>Rp{{ number_format($order->total_amount, 0, ',', '.') }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Shipping</span>
                                    <span class="text-success">Free</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center mb-0">
                                    <span class="fw-bold">Total Pay</span>
                                    <h4 class="fw-bold text-primary mb-0">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</h4>
                                </div>

                                <!-- Action Button (Optional) -->
                                @if($order->status == 'pending')
                                <form action="{{ route('customer.order.pay', $order->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary w-100 fw-bold">
                                        <i class="bi bi-wallet2 me-2"></i>Pay Now
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
