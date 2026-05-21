<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk Baru | Marketplace Admin</title>
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
            padding: 50px 0;
        }

        .form-card {
            background: #ffffff;
            border: 1px solid #f1f5f9;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            padding: 40px;
        }

        .form-label {
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--text-main);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-control {
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 0.95rem;
            transition: all 0.2s;
        }

        .form-control:focus {
            border-color: var(--primary-soft);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
            outline: none;
        }

        .btn-soft-primary {
            background-color: var(--primary-soft);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-soft-primary:hover {
            background-color: #4f46e5;
            color: white;
            transform: translateY(-1px);
        }

        .btn-light-soft {
            background-color: #f1f5f9;
            color: var(--text-muted);
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
        }

        .btn-back {
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 20px;
        }

        .btn-back:hover {
            color: var(--primary-soft);
        }
    </style>
</head>
<body>

    <div class="container main-wrapper">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <!-- Tombol Kembali -->
                <a href="{{ route('products.index') }}" class="btn-back">
                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                </a>

                <div class="form-card">
                    <div class="mb-4">
                        <h4 class="fw-bold mb-1">Tambah Produk Baru</h4>
                        <p class="text-muted small">Silahkan isi formulir di bawah ini dengan lengkap.</p>
                    </div>

                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <!-- Foto Produk -->
                            <div class="col-12 mb-4">
                                <label class="form-label"><i class="bi bi-image text-primary"></i> Foto Produk</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Judul -->
                            <div class="col-12 mb-4">
                                <label class="form-label"><i class="bi bi-fonts text-primary"></i> Nama Produk</label>
                                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title') }}" placeholder="Masukkan nama produk">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Deskripsi Sederhana (Tanpa Editor) -->
                            <div class="col-12 mb-4">
                                <label class="form-label"><i class="bi bi-text-paragraph text-primary"></i> Deskripsi Produk</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" placeholder="Tuliskan deskripsi produk secara detail...">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Harga -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label"><i class="bi bi-tag text-primary"></i> Harga (Rp)</label>
                                <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" value="{{ old('price') }}" placeholder="Contoh: 50000">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Stok -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label"><i class="bi bi-box-seam text-primary"></i> Stok Barang</label>
                                <input class="form-control @error('stock') is-invalid @enderror" type="number" name="stock" value="{{ old('stock') }}" placeholder="Contoh: 100">
                                @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="d-flex gap-2 mt-2">
                            <button type="submit" class="btn btn-soft-primary px-4">
                                Simpan Produk
                            </button>
                            <button type="reset" class="btn btn-light-soft px-4">
                                Reset
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>