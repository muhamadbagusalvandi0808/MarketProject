<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail {{ $product->title }} | Khusus Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-indigo: #6366f1;
            --bg-body: #f8fafc;
            --text-dark: #1e293b;
            --text-muted: #64748b;
        }

        body {
            background-color: var(--bg-body);
            font-family: 'Inter', -apple-system, sans-serif;
            color: var(--text-dark);
        }

        /* Navbar Styling Sesuai Dashboard */
        .navbar-custom {
            background: white;
            border-bottom: 1px solid #eef2f6;
            padding: 15px 0;
        }

        .brand-box {
            background: #1e293b;
            color: white;
            padding: 8px 12px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
        }

        /* Card Styling */
        .main-card {
            background: white;
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.03);
            overflow: hidden;
        }

        .img-container {
            background-color: #f1f5f9;
            border-radius: 15px;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .product-img {
            max-height: 350px;
            object-fit: contain;
            border-radius: 12px;
        }

        .price-tag {
            font-size: 28px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 20px;
        }

        .badge-stok {
            background-color: #eef2ff;
            color: var(--primary-indigo);
            padding: 8px 16px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 14px;
            display: inline-block;
        }

        .btn-back {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 20px;
        }

        .btn-back:hover {
            color: var(--primary-indigo);
        }

        .product-id {
            color: var(--text-muted);
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .section-title {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            font-weight: 700;
            margin-top: 25px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<!-- Navbar (Sama dengan Dashboard) -->
<nav class="navbar navbar-custom mb-5">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="brand-box me-4">
                <i class="bi bi-shop"></i>
                <span>Khusus Admin</span>
            </div>
            <div class="d-none d-md-flex gap-4">
                <a href="{{ route('admin.dashboard') }}" class="text-muted text-decoration-none small fw-medium">Dashboard</a>
                <a href="{{ route('products.index') }}" class="text-indigo text-decoration-none small fw-bold" style="color: var(--primary-indigo);">Product Management</a>
            </div>
        </div>
    </div>
</nav>

<div class="container mb-5">
    <!-- Tombol Kembali ala Dashboard -->
    <a href="{{ route('products.index') }}" class="btn-back">
        <i class="bi bi-chevron-left"></i> Kembali ke Daftar Produk
    </a>

    <div class="main-card p-4 p-md-5">
        <div class="row g-5">
            <!-- Bagian Kiri: Gambar -->
            <div class="col-md-5">
                <div class="img-container">
                    <img 
                        src="{{ asset('storage/products/'.$product->image) }}" 
                        class="img-fluid product-img shadow-sm"
                        alt="{{ $product->title }}">
                </div>
            </div>

            <!-- Bagian Kanan: Info -->
            <div class="col-md-7">
                <div class="product-id">ID: #PRD-{{ $product->id }}</div>
                <h1 class="fw-bold mb-3">{{ $product->title }}</h1>
                
                <div class="price-tag">
                    <span class="fs-4 fw-medium text-muted">Rp</span> {{ number_format($product->price, 0, ',', '.') }}
                </div>

                <div class="badge-stok mb-4">
                    <i class="bi bi-box-seam me-1"></i> Tersedia: {{ $product->stock }} Unit
                </div>

                <div class="section-title">Deskripsi Produk</div>
                <p class="text-secondary leading-relaxed" style="line-height: 1.8;">
                    {{ $product->description }}
                </p>

                <div class="mt-5 d-flex gap-2">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning px-4 py-2 rounded-3 fw-bold text-white" style="background-color: #fcd34d; border: none;">
                        <i class="bi bi-pencil-square me-2"></i> Edit Produk
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>