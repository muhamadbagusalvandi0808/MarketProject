{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Checkout</title>
</head>

<body>
    <div class="container">
        <a href="{{ route('cart.index') }}" class="back-link">
            <i class="bi bi-arrow-left"></i>Back to cart
        </a>
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf

            <div class="checkout-grid">
                <div class="form-section">
                    <div class="section-title">
                        <i class="bi bi-truck"></i>Shipping information
                    </div>
                    <div class="form-group">
                        <label class="form label">Full Name</label>
                        <input type="text" name="'shipping_name" class="form-control" required
                            value="{{ Auth::user()->name }}">
                    </div>
                    <div class="form-group">
                        <label class="form label">Phone Number</label>
                        <input type="tel" name="'shipping_phone" class="form-control" required
                            placeholder="08xxxxxxxxxx">
                    </div>
                    <div class="form-group">
                        <label class="form label">Shipping Address</label>
                        <textarea name="'shipping_address" class="form-control" rows="4" required
                            placeholder="Complete your Address including streets, city, and zip code">
                        </div>

                    <div class="section-title" style="margin-top: 30px">
                        <i class="bi bi-credit-card"></i>Payment Method
                        </div>

                        <div class="payment-methods">
                            <label for="" class="payment-options"></label>
                            <input type="radio" name="payment-method" value="bank_transfer" required checked>
                            <div class=""><i class="bi bi-bank"></i><br>Bank Transfer</div>

                            <label for="" class="payment-options"></label>
                            <input type="radio" name="payment-method" value="COD" required checked>
                            <div class=""><i class="bi bi-cash"></i><br>COD</div>

                            <label for="" class="payment-options"></label>
                            <input type="radio" name="payment-method" value="e_wallet" required checked>
                            <div class=""><i class="bi bi-wallet2"></i><br>E-Wallet</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-summary">
                    <div class="section-title">
                        Order Summary
                    </div>
                    @foreach ($cartItems as $item)
                        <div class="summary-item">
                            <span>{{$item->product->title}} x {{ $item->quantity }}</span>
                            <span>RP{{ number_format($item->product->price * $item->quantity,2,',','.') }}</span>
                        </div>
                    @endforeach
                    <div class="total-row">
                        <span>Total Pay</span>
                        <span>RP{{ number_format($item->product->price * $item->quantity,2,',','.') }}</span>
                    </div>
                    <button type="submit" class="btn-confirm">
                        Place Order <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const paymentOptions = document.querySelectorAll('.payment-options');
        paymentOptions.forEach(option => {
            option.addEventListener('click', () => {
                paymentOptions.forEach(opt.classList.remove('selected'));
                option.classList.add('selected');
            });
        });
        document.querySelector('input[name="payment-method"]:checked').closest('.payment-option').classList.add('selected');
    </script>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Checkout - Customer Portal</title>
    <style>
        .payment-item { cursor: pointer; border: 2px solid #dee2e6; transition: all 0.2s; display: block; }
        .payment-input:checked + .payment-item { border-color: #0d6efd; background-color: #f8f9ff; box-shadow: 0 0 0 1px #0d6efd; }
        .payment-input:checked + .payment-item i { color: #0d6efd !important; }
        .visually-hidden-input { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border-width: 0; }       
    </style>
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="mb-4">
        <a href="{{ route('cart.index') }}" class="text-decoration-none text-muted">
            <i class="bi bi-arrow-left me-2"></i>Back to cart
        </a>
    </div>

    <h2 class="mb-4 fw-bold">Checkout</h2>

        <!-- Cek Error Validasi -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <!-- Cek Error dari Try-Catch -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <!-- FORM START -->
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <div class="row g-4">
            
            <!-- LEFT SIDE -->
            <div class="col-lg-8">
                <!-- Shipping Information Card -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4"><i class="bi bi-truck me-2 text-primary"></i>Shipping Information</h5>
                        
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="shipping_name" class="form-control" required value="{{ Auth::user()->name }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" name="shipping_phone" class="form-control" required placeholder="08xxxxxxxxxx">
                        </div>

                        <div class="mb-0">
                            <label class="form-label">Shipping Address</label>
                            <textarea name="shipping_address" class="form-control" rows="4" required placeholder="Complete Address..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Payment Method Card -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4"><i class="bi bi-credit-card me-2 text-primary"></i>Payment Method</h5>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <input type="radio" name="payment_method" value="bank_transfer" id="pay_bank" class="visually-hidden-input payment-input" required checked>
                                <label for="pay_bank" class="payment-item p-3 rounded text-center h-100">
                                    <i class="bi bi-bank fs-2 d-block mb-2 text-muted"></i>
                                    <span class="fw-bold d-block small">Bank Transfer</span>
                                </label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="payment_method" value="COD" id="pay_cod" class="visually-hidden-input payment-input">
                                <label for="pay_cod" class="payment-item p-3 rounded text-center h-100">
                                    <i class="bi bi-cash fs-2 d-block mb-2 text-muted"></i>
                                    <span class="fw-bold d-block small">Cash on Delivery</span>
                                </label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="payment_method" value="e_wallet" id="pay_wallet" class="visually-hidden-input payment-input">
                                <label for="pay_wallet" class="payment-item p-3 rounded text-center h-100">
                                    <i class="bi bi-wallet2 fs-2 d-block mb-2 text-muted"></i>
                                    <span class="fw-bold d-block small">E-Wallet</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT SIDE (Order Summary) -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm sticky-top" style="top: 20px;">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4">Order Summary</h5>
                        <div class="summary-items mb-4">
                            @php $totalPrice = 0; @endphp
                            @foreach ($cartItems as $item)
                                @php $subtotal = $item->product->price * $item->quantity; $totalPrice += $subtotal; @endphp
                                <div class="d-flex justify-content-between mb-2 small">
                                    <span class="text-muted">{{$item->product->title}} ({{ $item->quantity }}x)</span>
                                    <span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <span class="h6 mb-0">Total Pay</span>
                            <span class="h5 mb-0 fw-bold text-primary">Rp{{ number_format($totalPrice, 0, ',', '.') }}</span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold shadow-sm">
                            Place Order <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div> <!-- End Row -->
    </form>
    <!-- FORM END -->
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>