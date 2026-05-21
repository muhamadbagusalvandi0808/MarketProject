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

    @livewireStyles
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
            --card-bg: #ffffff;
            --border-color: #f1f5f9;
        }

        /* --- DARK MODE OVERRIDES --- */
        [data-bs-theme='dark'] {
            --bg-body: #0f172a;
            --text-main: #f1f5f9;
            --text-muted: #94a3b8;
            --card-bg: #1e293b;
            --border-color: #334155;
            --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.2);
        }

        body {
            background-color: var(--bg-body);
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .main-wrapper {
            padding: 40px 0;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .table-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }

        .table {
            margin-bottom: 0;
            vertical-align: middle;
            color: inherit;
        }

        .table thead th {
            background-color: var(--bg-body);
            color: var(--text-muted);
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            padding: 16px 24px;
            border-bottom: 1px solid var(--border-color);
        }

        .table tbody td {
            padding: 16px 24px;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.9rem;
        }

        [data-bs-theme='dark'] .table tbody tr:hover {
            background-color: #2d3748;
        }

        .table tbody tr:hover {
            background-color: #fcfdfe;
        }

        .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid var(--border-color);
        }

        .badge-stock {
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 500;
            background-color: rgba(99, 102, 241, 0.1);
            color: var(--primary-soft);
        }

        /* Input Search Dark Mode Fix */
        .input-group-text {
            background-color: var(--card-bg) !important;
            border-color: var(--border-color) !important;
            color: var(--primary-soft);
        }

        .form-control {
            background-color: var(--card-bg) !important;
            border-color: var(--border-color) !important;
            color: var(--text-main) !important;
        }

        .form-control::placeholder {
            color: var(--text-muted);
        }

        .btn-action {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: 0.2s;
            border: none;
        }

        .btn-view {
            background-color: rgba(99, 102, 241, 0.15);
            color: #6366f1;
        }

        .btn-edit {
            background-color: rgba(245, 158, 11, 0.15);
            color: #f59e0b;
        }

        .btn-delete {
            background-color: rgba(239, 68, 68, 0.15);
            color: #ef4444;
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
            transition: 0.2s;
        }

        .btn-add-new:hover {
            background-color: #4f46e5;
            color: white;
            transform: translateY(-2px);
        }

        .theme-toggle-btn {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            color: var(--text-main);
            padding: 8px 12px;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }
    </style>
</head>

<body>

    @include('admin.sidebar')

    <div class="container main-wrapper">

        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <a href="{{ route('admin.dashboard') }}" class="text-muted text-decoration-none small">
                    <i class="bi bi-chevron-left"></i> Kembali ke Dashboard
                </a>
                <h3 class="fw-bold mt-2 mb-0">Daftar Produk</h3>
            </div>

            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="{{ route('products.create') }}" class="btn btn-add-new shadow-sm">
                    <i class="bi bi-plus-lg me-1"></i> Tambah Produk
                </a>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="mb-4">
            <livewire:searchproduct />
        </div>
        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center p-4 border-top border-secondary-subtle">
            <div class="text-muted small">
                Showing {{ $products->firstItem() }} to {{ $products->lastItem() }}
            </div>
            <div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
    </div>

    <!-- Scripts -->
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // --- LOGIKA DARK MODE ---
        function toggleTheme() {
            const html = document.documentElement;
            const icon = document.getElementById('theme-icon');
            const currentTheme = html.getAttribute('data-bs-theme');
            const targetTheme = currentTheme === 'dark' ? 'light' : 'dark';

            html.setAttribute('data-bs-theme', targetTheme);
            localStorage.setItem('theme', targetTheme);
            updateIcon(targetTheme);
        }

        function updateIcon(theme) {
            const icon = document.getElementById('theme-icon');
            if (theme === 'dark') {
                icon.classList.replace('bi-moon-stars-fill', 'bi-sun-fill');
            } else {
                icon.classList.replace('bi-sun-fill', 'bi-moon-stars-fill');
            }
        }

        // Jalankan saat pertama kali halaman dimuat
        (function () {
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', savedTheme);
            updateIcon(savedTheme);
        })();
    </script>

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success', title: 'Berhasil!', text: "{{ session('success') }}",
                showConfirmButton: false, timer: 2000
            });
        </script>
    @endif
</body>

</html>