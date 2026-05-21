@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <!-- Header Konten -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Ringkasan Sistem</h4>
            <p class="text-muted small mb-0">Kelola operasional marketplace Anda di sini.</p>
        </div>
        <div class="date-badge shadow-sm">
            <i class="bi bi-calendar3 me-2 text-primary"></i> 
            {{ now()->translatedFormat('d M Y') }}
        </div>
    </div>

    <!-- Baris Statistik -->
    <div class="row g-4 mb-5">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="stat-card p-4 text-decoration-none">
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

        <div class="col-12 col-md-6 col-lg-4">
            <div class="stat-card p-4 border-start border-4 border-success">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box bg-success-subtle text-success">
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
    <div class="action-card p-4">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h5 class="fw-bold mb-2">Manage Your Product</h5>
                <p class="text-muted mb-4 mb-lg-0">Gunakan pintasan ini untuk mengatur katalog atau menambah produk baru dengan cepat.</p>
            </div>
            <div class="col-lg-5 text-lg-end">
                <div class="d-flex flex-wrap gap-3 justify-content-lg-end">
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                        <i class="bi bi-list-stars me-2"></i>Daftar Produk
                    </a>
                    <a href="{{ route('products.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm" style="background-color: var(--primary-soft); border:none;">
                        <i class="bi bi-plus-lg me-2"></i>Produk Baru
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection