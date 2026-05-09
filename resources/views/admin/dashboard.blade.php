{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    @include('admin.sidebar')
    <div class="main-content">
        <div class="top-bar">
            <h2>Dashboard</h2>
            <div class="user-info">
                <div class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                </div>
                <div>
                    <strong>{{ Auth::user()->name }}</strong>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                </div>
            </div>
        </div>
     <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon purple">
                <i class="bi bi-box-seam"></i>
                <h3></h3>
                <p>Total Products</p>
            </div>
        </div>
     </div>
     <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon purple">
                <i class="bi bi-box-cart"></i>
                <h3></h3>
                <p>Total Orders</p>
            </div>
        </div>
     </div>
     <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon purple">
                <i class="bi bi-box-dollar"></i>
                <h3></h3>
                <p>Total Revenue</p>
            </div>
        </div>
     </div>
     <div class="quick-actions">
        <h5>Quick Actions</h5>
        <a href="{{ route('products.index') }}" class="action-btn">
            <i class="bi bi-box-seam"></i>Manage Products
        </a>
        <a href="{{ route('products.create') }}" class="action-btn">
            <i class="bi bi-box-circle"></i>Add New Products
        </a>
     </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .main-content {
            margin-left: 260px; 
            padding: 20px;
        }
        body {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

    @include('admin.sidebar')

    <div class="flex-grow-1" style="margin-left: 260px;">
        <!-- Header / Top Bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom p-3 sticky-top shadow-sm">
                <div class="container-fluid d-flex justify-content-between">
                    <h5 class="mb-0 fw-bold text-uppercase">Dashboard</h5>
                    
                </div>
        </nav>

        <div class="container-fluid p-4 ">
            <!-- Kartu Statistik -->
            <div class="row mb-4">
                <!-- Produk -->
                <div class="col-md-4">
                    <div class="card border-primary text-center">
                        <div class="card-body">
                            <i class="bi bi-box-seam fs-1 text-primary"></i>
                            <h3 class="fw-bold mt-2">{{ $productCount ?? 0 }}</h3>
                            <p class="text-muted mb-0">Total Produk</p>
                        </div>
                    </div>
                </div>
            
                <!-- Pesanan -->
                <div class="col-md-4">
                    <div class="card border-warning text-center">
                        <div class="card-body">
                            <i class="bi bi-cart-check fs-1 text-warning"></i>
                            <h3 class="fw-bold mt-2">{{ $orderCount ?? 0 }}</h3>
                            <p class="text-muted mb-0">Total Pesanan</p>
                        </div>
                    </div>
                </div>
            
                <!-- Pendapatan -->
                <div class="col-md-4">
                    <div class="card border-success text-center">
                        <div class="card-body">
                            <i class="bi bi-currency-dollar fs-1 text-success"></i>
                            <h3 class="fw-bold mt-2">Rp{{ number_format($revenue ?? 0, 0, ',', '.') }}</h3>
                            <p class="text-muted mb-0">Total Pendapatan</p>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Aksi Cepat -->
            <div class="card">
                <div class="card-header fw-bold">
                    Aksi Cepat
                </div>
                <div class="card-body">
                    <div class="d-flex gap-2">
                        <a href="{{ route('products.index') }}" class="btn btn-primary">
                            <i class="bi bi-list-ul me-1"></i> Kelola Produk
                        </a>
                        <a href="{{ route('products.create') }}" class="btn btn-success">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Produk Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>