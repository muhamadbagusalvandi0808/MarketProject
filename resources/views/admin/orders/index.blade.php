<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    @include('admin.sidebar')

    <div class="flex-grow-1" style="margin-left: 260px;">
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom p-3 sticky-top shadow-sm">
            <div class="container-fluid d-flex justify-content-between">
                <h5 class="mb-0 fw-bold text-uppercase">Manage Order</h5> 
            </div>
        </nav>
        <div class="container-fluid p-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        Order List
                    </h5>
                </div>
                <div class="card-body">
                    @if (session('Success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <th>Order Id</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Total</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                       <td>{{ $order->order_number }}</td>
                                       <td>{{ $order->created_at->format('d M Y') }}</td> 
                                       <td>{{ $order->user->name }}</td> 
                                       <td>Rp{{ number_format($order->total_amount) }}</td> 
                                       <td class="text-uppercase">{{ str_replace('-','',$order->payment_method)}}</td>
                                       <td> 
                                            <span class="badge-status status-{{ $order->status }}">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td> 
                                       <td> 
                                            <span class="badge-status status-{{ $order->payment_status }}">
                                                {{ ucfirst($order->payment_status) }}
                                            </span>
                                        </td> 
                                        <td>
                                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary"> View & Edit </a>
                                        </td>
                                    </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>