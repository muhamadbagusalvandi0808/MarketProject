{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Order Confirmation</title>
</head>
<body>
    <div class="confirmation-card">
        <div class="succes-icon">
            <i class="bi bi-check-lg"></i>
        </div>

        <h3>Payment Succesfull</h3>
        <p>Thank you for your purchase.</p>
        <div class="order-details">
            <div class="detail-row">
                <span>Order Number</span>
                <span>{{ $order->order_number }}</span>
            </div>
            <div class="detail-row">
                <span>Date:</span>
                <span>{{ $order->created_at->format('d M Y, H:i') }}</span>
            </div>
            <div class="detail-row">
                <span>Payment Method</span>
                <span>{{ str_replace('_', ' ', $order->payment_method) }}</span>
            </div>
            <div class="detail-row">
                <span>Total Amount</span>
                <span>RP{{ number_format($order->total_amount, 2, ',', '.') }}</span>
            </div>
        </div>
        <a href="{{ route('customer.products') }}" class="btn-home">Continue</a>
        <a href="{{ route('customer.orders') }}" class="btn-outline">View Order History</a>
    </div>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Order Confirmation</title>
</head>
<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-5">
                <!-- Card Utama -->
                <div class="card shadow-sm border-0 p-4">
                    <div class="card-body text-center">
                        
                        <!-- Icon Berhasil -->
                        <div class="mb-3">
                            <i class="bi bi-check-circle-fill text-success display-1"></i>
                        </div>

                        <h3 class="fw-bold">Pembayaran Berhasil</h3>
                        <p class="text-muted">Terima kasih atas pembelian Anda.</p>

                        <!-- Box Detail Pesanan -->
                        <div class="bg-light rounded p-3 my-4 text-start">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Nomor Pesanan</span>
                                <span class="fw-bold">{{ $order->order_number }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Tanggal</span>
                                <span>{{ $order->created_at->format('d M Y, H:i') }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Metode Bayar</span>
                                <span class="text-uppercase">{{ str_replace('_', ' ', $order->payment_method) }}</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <span class="fw-bold">Total Bayar</span>
                                <span class="fw-bold text-primary">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <!-- Tombol Navigasi -->
                        <div class="d-grid gap-2">
                            <a href="{{ route('customer.products') }}" class="btn btn-primary btn-lg">Continue</a>
                            <a href="{{ route('customer.orders') }}" class="btn btn-outline-secondary">View Order History</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>