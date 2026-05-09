{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>

    <div class="main_content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Sales Report</h2>
            <button onclick="window.print()" class="btn btn-outline-secondary">
                <i class="bi bi-printer">Print Report</i>
            </button>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('admin.sales') }}" method="GET" class="row g-3 align-items-end">
                    <div class="dol-md-3">
                        <label for="" class="form-label">Period</label>
                        <select name="period" id="" class="form-select" onchange="this.form.submit()">
                            <option value="all" {{ $period == 'all' ? 'selected' :'' }}>All Time</option>
                            <option value="daily" {{ $period == 'daily' ? 'selected' :'' }}>Daily</option>
                            <option value="weekly" {{ $period == 'weekly' ? 'selected' :'' }}>Weekly</option>
                            <option value="monthly" {{ $period == 'monthly' ? 'selected' :'' }}>Monthly</option>
                        </select>
                    </div>
                    @if ($period !='all')
                    <div class="col-md-3">
                        <label class="form-label"> Select Data</label>
                        <input type="date" name="date" class="form-control" value="{{ $data }}" onchange="this.form.submit()">
                    </div>
                        
                    @endif
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary w-100"> Filter </button>
                    </div>
                </form>
            </div>
        </div>
        <h4 class="mb-3">{{ $title }}</h4>

        <div class="row mb-4">
            <div class="stat-card">
                <div class="stat-label">Total Revenue</div>
                <div class="stat-value text-success">Rp{{ number_format($totalRevenue,2,',',',') }}</div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="stat-card">
                <div class="stat-label">Total Orders</div>
                <div class="stat-value text-success">Rp{{ number_format($totalOrders,2,',',',') }}</div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="stat-card">
                <div class="stat-label">Successful Orders</div>
                <div class="stat-value text-success">{{ $successfulOrder }}</div>
            </div>
        </div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Order List</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Payment</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td style="font-family: monospace">{{ $order->order_number }}</td>
                            <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>Rp{{  number_format($order->total,2,',',',') }}</td>
                            <td>
                                <span class="badge-status status-{{ $order->status }}">
                                {{ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="text-uppercase">{{ str_replace('_', '',$order->payment_status) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="bi bi-inbox fs-1 text-muted">
                                    <p class="text-muted mt-2">NO ORDERS FOUND FOR THIS PERIOD</p>
                                </i>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sales Report</title>
    <!-- Menggunakan Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* CSS sederhana untuk layout jika ada sidebar */
        body { background-color: #f8f9fa; }
        .main-content { margin-left: 260px; padding: 30px; }
        @media print {
            .sidebar, .btn, .card-filter, .navbar, .no-print { display: none !important; }
            .main-content { margin-left: 0; padding: 0; }
        }
    </style>
</head>
<body>
    @include('admin.sidebar')
    <div class="main-content">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4 no-print">
            <div>
                <h2 class="fw-bold mb-0">Laporan Penjualan</h2>
                <p class="text-muted">{{ $title }}</p>
            </div>
            <button onclick="window.print()" class="btn btn-secondary">
                <i class="bi bi-printer me-2"></i>Cetak Laporan
            </button>
        </div>

        <!-- Filter Card -->
        <div class="card shadow-sm border-0 mb-4 card-filter no-print">
            <div class="card-body">
                <form action="{{ route('admin.sales') }}" method="GET" class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label fw-bold small">Periode</label>
                        <select name="period" class="form-select" onchange="this.form.submit()">
                            <option value="all" {{ $period == 'all' ? 'selected' : '' }}>Semua Waktu</option>
                            <option value="daily" {{ $period == 'daily' ? 'selected' : '' }}>Harian</option>
                            <option value="weekly" {{ $period == 'weekly' ? 'selected' : '' }}>Mingguan</option>
                            <option value="monthly" {{ $period == 'monthly' ? 'selected' : '' }}>Bulanan</option>
                        </select>
                    </div>
                    
                    @if ($period != 'all')
                    <div class="col-md-3">
                        <label class="form-label fw-bold small">Pilih Tanggal</label>
                        <input type="date" name="date" class="form-control" value="{{ $data }}" onchange="this.form.submit()">
                    </div>
                    @endif

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-filter"></i> Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Statistik Ringkas -->
        <div class="row g-3 mb-4 no-print">
            <div class="col-md-4">
                <div class="card border-0 border-start border-success border-4 shadow-sm">
                    <div class="card-body">
                        <div class="text-muted small fw-bold">TOTAL PENDAPATAN</div>
                        <div class="h4 fw-bold text-success mb-0">Rp{{ number_format($totalRevenue, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 border-start border-primary border-4 shadow-sm">
                    <div class="card-body">
                        <div class="text-muted small fw-bold">TOTAL PESANAN</div>
                        <div class="h4 fw-bold text-primary mb-0">{{ $totalOrders }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 border-start border-info border-4 shadow-sm">
                    <div class="card-body">
                        <div class="text-muted small fw-bold">PESANAN BERHASIL</div>
                        <div class="h4 fw-bold text-info mb-0">{{ $successfulOrder }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Daftar Pesanan -->

        <div class="data">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold">Daftar Transaksi</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No. Pesanan</th>
                                <th>Tanggal</th>
                                <th>Pelanggan</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td class="text-primary fw-bold">{{ $order->order_number }}</td>
                                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td class="fw-bold">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                    <td>
                                        @if($order->status == 'pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @elseif($order->status == 'complete')
                                            <span class="badge bg-success">Completed</span>
                                        @else
                                            <span class="badge bg-secondary text-uppercase">{{ $order->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="small fw-bold text-uppercase text-muted">
                                            {{ str_replace('_', ' ', $order->payment_status) }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <i class="bi bi-inbox fs-1 text-muted d-block mb-2"></i>
                                        <p class="text-muted">Tidak ada data pesanan pada periode ini.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>