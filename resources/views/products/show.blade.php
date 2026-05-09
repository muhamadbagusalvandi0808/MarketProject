<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Produk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

<div class="container mt-5 mb-5">
    <div class="row">
        <!-- GAMBAR PRODUK -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body text-center">
                    <img 
                        src="{{ asset('storage/products/'.$product->image) }}" 
                        class="img-fluid rounded"
                        alt="{{ $product->title }}">
                </div>
            </div>
        </div>

        <!-- DETAIL PRODUK -->
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h3>{{ $product->title }}</h3>
                    <hr>

                    <p class="fw-bold fs-5 text-success">
                        Rp {{ number_format($product->price, 2, ',', '.') }}
                    </p>

                    <p>
                        {{ $product->description }}
                    </p>

                    <hr>

                    <p>
                        <strong>Stok:</strong> {{ $product->stok }}
                    </p>

                    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
