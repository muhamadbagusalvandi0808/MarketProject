<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Details > Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
        .main-content { margin-left: 260px; padding: 30px; }
    </style>
</head>
<body>
    @include('admin.sidebar')

    <div class="container-fluid p-4">
        <div class="main-content">
            <div class="d-flex align-items-center mb-4 gap-3">
                <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i>Back
                </a>
                <h3>Order List</h3>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Order Items</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders->orderItems as $item)
                                <tr>
                                    <td>
                                        <div>
                                            <img src="{{ asset('/storage/products/'.$item->product->image) }}" width="50" class="rounded">
                                            <span>{{ $item->product->title }}</span>
                                        </div>
                                    </td>
                                    <td>Rp{{ number_format($item->price,2,',','.') }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>Rp{{ number_format($item->price*$item->quantity,2,',','.') }}</td>
                                
                                </tr>
                                @endforeach
                                <tr>
                                <td colspan="3" class="text-end">Grand Total</td>
                                <td>Rp{{ number_format($orders->total_amount,2,',','.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Shipping Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="text-muted small">Recipient Name</label>
                                <div class="fw-bold">{{ $orders->shipping_name }}</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-muted small">Phone Number</label>
                                <div class="fw-bold">{{ $orders->shipping_phone }}</div>
                            </div>
                            <div class="col-12">
                                <label class="text-muted small">Address</label>
                                <div class="fw-bold">{{ $orders->shipping_address }}</div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5>Update Order Status</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.orders.update',$orders->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                        
                            <div class="mb-3">
                                <label>Order Status</label>
                                <select name="status" class="form-select">
                                    <option value="pending" {{ $orders->status =='pending'?'selected':'' }}>Pending</option>
                                    <option value="processing" {{ $orders->status =='processing'?'selected':'' }}>Processing</option>
                                    <option value="complete" {{ $orders->status =='complete'?'selected':'' }}>Complete</option>
                                    <option value="cancelled" {{ $orders->status =='cancelled'?'selected':'' }}>Cancelled</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Payment Status</label>
                                <select name="payment_status" class="form-select">
                                    <option value="unpaid"{{ $orders->payment_status =='unpaid'?'selected':'' }}>Unpaid</option>
                                    <option value="paid"{{ $orders->payment_status =='paid'?'selected':'' }}>Paid</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Update Status</button>
                        </form>
                    </div>
                </div>
            
                <div class="card">
                    <div class="card-header">
                        <h4>CUSTOMER INFORMATION</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="bg-light rounded-circle p-2 d-flex"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>"
</body>
</html>
