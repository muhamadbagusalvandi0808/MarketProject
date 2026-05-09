{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>My Orders</title>
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
            <h3>Order History</h3>
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
    </div>
    @if ($order->count() > 0)
        <div class="order-table">
            <div class="table table-hover">
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Total Amount</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $orders)
                            <tr>
                                <td>{{ $orders->order_number }}</td>
                                <td>{{ $orders->created_at->format('d M Y') }}</td>
                                <td>RP{{ number_format($orders->total_amount, 2, ',', '.') }}</td>
                                <td class="text-uppercase">{{ str_replace('_', ' ', $orders->payment_method) }}</td>
                                <td>
                                    <span class="badge-status status-{{ $orders->status }}">
                                        {{ ucfirst($orders->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('customer.orders.show', $orders->id) }}">
                                        View Details
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-3">
                    {{ $orders->links() }}
                </div>
            </div>
        @else
            <div class="empty-state">
                <i class="bi bi-clipboard-x"></i>
                <h4>NO Orders</h4>
                <a href="{{ route('customer.products') }}" class="btn btn-success mt-3">
                    Start Shopping
                </a>
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
    <!-- Menggunakan Bootstrap 5.3.3 yang stabil -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>My Orders - Customer Portal</title>
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
                        <small class="d-block ">Logged in as</small>
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
        <div class="flex-grow-1" style="margin-left: 260px;">
            <!-- TOP BAR -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom p-3 sticky-top shadow-sm">
                <div class="container-fluid">
                    <h3 class="mb-0">Order History</h3>
                </div>
            </nav>

            <div class="container-fluid p-4">
                <!-- Tabel Order -->
                @if ($order->count() > 0)
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="ps-4">Order ID</th>
                                            <th>Date</th>
                                            <th>Total Amount</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $item)
                                            <tr>
                                                <td class="ps-4 fw-bold">#{{ $item->order_number }}</td>
                                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                                <td>Rp{{ number_format($item->total_amount, 0, ',', '.') }}</td>
                                                <td class="text-uppercase small">{{ str_replace('_', ' ', $item->payment_method) }}</td>
                                                <td>
                                                    @if($item->status == 'pending')
                                                        <span class="badge bg-warning text-dark">Pending</span>
                                                    @elseif($item->status == 'success' || $item->status == 'complete')
                                                        <span class="badge bg-success">Success</span>
                                                    @else
                                                        <span class="badge bg-info">{{ ucfirst($item->status) }}</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('customer.order-detail', $item->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="bi bi-eye"></i> Details
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- PAGINATION -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $order->links() }}
                    </div>

                @else
                    <!-- EMPTY STATE -->
                    <div class="text-center py-5 bg-white rounded shadow-sm">
                        <i class="bi bi-clipboard-x text-muted" style="font-size: 4rem;"></i>
                        <h4 class="mt-3 text-muted">No Orders Found</h4>
                        <p class="text-muted">You haven't made any purchases yet.</p>
                        <a href="{{ route('customer.products') }}" class="btn btn-success mt-2">
                            <i class="bi bi-cart-plus"></i> Start Shopping
                        </a>
                    </div>
                @endif
            </div> <!-- container end -->
        </div> <!-- main content end -->
    </div>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>