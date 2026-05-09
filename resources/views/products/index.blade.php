
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>CRUD Sederhana</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <h3 class="text-center mt-4">LIST DATA PRODUCTS</h3>
        </div>
        <div class="card border-0 shadow-sm rounder">
            <div class="card-body">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">Back</a>
                <a href="{{ route('products.create') }}" class="btn btn-success">Add Data</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">IMAGE</th>
                            <th scope="col">TITLE</th>
                            <th scope="col">PRICE</th>
                            <th scope="col">STOCK</th>
                            <th scope="col" style="width:20%">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td class="text-center">
                                <img src="{{ asset('/storage/products/' .$product->image) }}" class="rounded" style="width:150px">    
                            </td>
                            <td>{{ $product->title }}</td>
                            <td>{{ "Rp" .number_format($product->price,2,',','.')}}</td>
                            <td>{{ $product->stock }}</td>
                            <td class="text-center">
                                <a href="{{ route('products.show', $product->id)  }}" class="btn btn-primary">Show</a>
                                <a href="{{ route('products.edit', $product->id)  }}" class="btn btn-warning">Edit</a>
                                <form method="POST" onsubmit="return confirm('apakah anda yakin');" action="{{ route('products.destroy', $product->id) }}">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger mt-5">
                            Data product belum ada
                        </div>
                        @endforelse
                    </tbody>
                </table>
                {{ $products->links() }}
            </div>
        </div>
    </div>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       <script>
            @if(session('success'))
            Swal.fire((
                icon="success",
                title="BERHASIL",
                Text="{{ session('success') }}",
                showConfirmButton:false,
                timer:2000
            ));
            @elseif (session('error'))
            Swal.fire((
                icon="error",
                title="GAGAL",
                Text="{{ session('error') }}",
                showConfirmButton:false,
                timer:2000
            ));
            @endif
       </script>
</body>
</html>