<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk | Admin Marketplace</title>
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
            --success-soft: #10b981;
            --danger-soft: #ef4444;
            --warning-soft: #f59e0b;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.04), 0 4px 6px -2px rgba(0, 0, 0, 0.02);
        }

        body {
            background-color: var(--bg-body);
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
        }

        .main-wrapper {
            padding: 40px 0;
        }

        /* Header Styles */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        /* Card & Table Style */
        .table-card {
            background: #ffffff;
            border: 1px solid #f1f5f9;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            overflow: hidden; /* Agar border-radius memotong tabel */
        }

        .table {
            margin-bottom: 0;
            vertical-align: middle;
        }

        .table thead th {
            background-color: #f8fafc;
            color: var(--text-muted);
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 16px 24px;
            border-bottom: 1px solid #f1f5f9;
        }

        .table tbody td {
            padding: 16px 24px;
            border-bottom: 1px solid #f8fafc;
            color: var(--text-main);
            font-size: 0.9rem;
        }

        .table tbody tr:hover {
            background-color: #fcfdfe;
        }

        /* Image Thumbnail */
        .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #f1f5f9;
        }

        /* Badge Stock */
        .badge-stock {
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 500;
            background-color: #eff6ff;
            color: #3b82f6;
        }

        /* Button Styles */
        .btn-action {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: all 0.2s;
            border: none;
        }

        .btn-view { background-color: #e0e7ff; color: #4338ca; }
        .btn-edit { background-color: #fef3c7; color: #d97706; }
        .btn-delete { background-color: #fee2e2; color: #dc2626; }

        .btn-action:hover {
            transform: translateY(-2px);
            filter: brightness(0.95);
        }

        .btn-add-new {
            background-color: var(--primary-soft);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
        }

        .btn-add-new:hover {
            background-color: #4f46e5;
            color: white;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }

        .btn-back-soft {
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .btn-back-soft:hover { color: var(--primary-soft); }

        /* Pagination custom */
        .pagination {
            margin-top: 20px;
            padding: 0 24px 24px;
        }
    </style>
</head>
<body>

    <div class="container main-wrapper">
        
        <!-- Breadcrumb / Back Navigation -->
        <div class="mb-2">
            <a href="{{ route('admin.dashboard') }}" class="btn-back-soft">
                <i class="bi bi-chevron-left"></i> Kembali ke Dashboard
            </a>
        </div>

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h3 class="fw-bold mb-1">Daftar Produk</h3>
                <p class="text-muted small mb-0">Total terdapat {{ $products->total() }} produk dalam katalog Anda.</p>
            </div>
            <a href="{{ route('products.create') }}" class="btn-add-new">
                <i class="bi bi-plus-lg"></i> Tambah Produk
            </a>
        </div>

        <!-- Table Card -->
        <div class="table-card">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <td class="text-center text-muted fw-medium">{{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('/storage/products/' .$product->image) }}" class="product-img shadow-sm" alt="Produk">
                            </td>
                            <td>
                                <div class="fw-semibold">{{ $product->title }}</div>
                                <div class="text-muted small">ID: #PRD-{{ $product->id }}</div>
                            </td>
                            <td class="fw-bold text-dark">
                                {{ "Rp " . number_format($product->price, 0, ',', '.') }}
                            </td>
                            <td>
                                <span class="badge-stock">
                                    {{ $product->stock }} <small>Unit</small>
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn-action btn-view" title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn-action btn-edit" title="Ubah">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');" action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bi bi-box-seam fs-1 d-block mb-3 opacity-25"></i>
                                    <p class="mb-0">Belum ada data produk tersedia.</p>
                                    <a href="{{ route('products.create') }}" class="btn btn-link text-decoration-none small">Tambah produk pertama?</a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-between align-items-center p-4 border-top">
                <div class="text-muted small">
                    Menampilkan {{ $products->firstItem() }} sampai {{ $products->lastItem() }} dari {{ $products->total() }} data
                </div>
                <div>
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
     @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    </script>
    @endif
</body>
</html>