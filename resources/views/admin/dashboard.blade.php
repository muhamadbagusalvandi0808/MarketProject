<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Marketplace</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-body: #f8fafc;
            --primary-soft: #6366f1;
            --primary-light: #eef2ff;
            --success-soft: #10b981;
            --success-light: #ecfdf5;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.04), 0 4px 6px -2px rgba(0, 0, 0, 0.02);
        }

        body {
            background-color: var(--bg-body);
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
            letter-spacing: -0.01em;
            margin: 0;
        }

        /* PERBAIKAN: Margin-left diatur ke 0 agar tidak ada space kosong di kiri */
        .main-content {
            margin-left: 0; 
            min-height: 100vh;
            padding-bottom: 50px;
        }

        /* PERBAIKAN: Konten dibuat simetris di tengah */
        .dashboard-container {
            padding: 40px 20px;
            max-width: 1200px; /* Batas lebar konten */
            margin: 0 auto;    /* Mengetengahkan konten */
        }

        /* Card Statistik */
        .stat-card {
            background: #ffffff;
            border: 1px solid #f1f5f9;
            border-radius: 16px;
            padding: 24px;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.08);
        }

        .icon-box {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .bg-indigo-light { background-color: var(--primary-light); color: var(--primary-soft); }
        .bg-emerald-light { background-color: var(--success-light); color: var(--success-soft); }

        /* Quick Action Card */
        .action-card {
            background: #ffffff;
            border: 1px solid #f1f5f9;
            border-radius: 16px;
            padding: 32px;
            box-shadow: var(--card-shadow);
        }

        .btn-soft-primary {
            background-color: var(--primary-soft);
            color: white;
            border: none;
            padding: 10px 24px;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-soft-primary:hover {
            background-color: #4f46e5;
            color: white;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }

        .btn-soft-outline {
            background-color: transparent;
            color: var(--text-muted);
            border: 1px solid #e2e8f0;
            padding: 10px 24px;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-soft-outline:hover {
            background-color: #f8fafc;
            border-color: #cbd5e1;
            color: var(--primary-soft);
        }

        .date-badge {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 0.85rem;
            color: var(--text-muted);
            font-weight: 500;
        }
    </style>
</head>
<body>

    <!-- NAVBAR TETAP DI ATAS -->
    @include('admin.sidebar')

    <div class="main-content">
        <div class="dashboard-container">
            
            <!-- Header Konten: Ringkasan & Tanggal -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold mb-1">Ringkasan System</h4>
                    <p class="text-muted small mb-0">Kelola operasional marketplace Anda di sini.</p>
                </div>
                <div class="date-badge shadow-sm">
                    <i class="bi bi-calendar3 me-2 text-primary"></i> 
                    {{ now()->translatedFormat('d M Y') }}
                </div>
            </div>

            <!-- Baris Statistik -->
            <div class="row g-4 mb-5">
                <!-- Total Produk -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="stat-card">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="icon-box bg-indigo-light">
                                <i class="bi bi-box-seam"></i>
                            </div>
                            <div>
                                <span class="text-muted small fw-medium text-uppercase">Total Produk</span>
                                <h3 class="fw-bold mb-0 text-dark">{{ $productCount }}</h3>
                            </div>
                        </div>
                        <a href="{{ route('products.index') }}" class="text-primary text-decoration-none small fw-semibold">
                            Kelola Produk <i class="bi bi-chevron-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Status Sistem -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="stat-card border-start border-4 border-success">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-box bg-emerald-light">
                                <i class="bi bi-check2-circle"></i>
                            </div>
                            <div>
                                <span class="text-muted small fw-medium text-uppercase">Status Sistem</span>
                                <h3 class="fw-bold mb-0 text-success">Aktif</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Card Aksi Cepat -->
            <div class="action-card">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <h5 class="fw-bold mb-2">Manage Your Product</h5>
                        <p class="text-muted mb-4 mb-lg-0">Gunakan pintasan ini untuk mengatur katalog atau menambah produk baru dengan cepat tanpa melalui menu utama.</p>
                    </div>
                    <div class="col-lg-5 text-lg-end">
                        <div class="d-flex flex-wrap gap-3 justify-content-lg-end">
                            <a href="{{ route('products.index') }}" class="btn btn-soft-outline">
                                <i class="bi bi-list-stars me-2"></i>Daftar Produk
                            </a>
                            <a href="{{ route('products.create') }}" class="btn btn-soft-primary shadow-sm">
                                <i class="bi bi-plus-lg me-2"></i>Produk Baru
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>