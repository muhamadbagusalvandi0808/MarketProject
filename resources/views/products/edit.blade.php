<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>EDIT Product</title>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">

                        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">IMAGE</label>
                                <input class="form-control @error('image') is-invalid @enderror"
                                       type="file"
                                       name="image">
                                @error('image')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">TITLE</label>
                                <input class="form-control @error('title') is-invalid @enderror"
                                       type="text"
                                       name="title"
                                       value="{{ old('title', $product->title) }}">
                                @error('title')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">DESCRIPTION</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          name="description"
                                          rows="6">{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">PRICE</label>
                                <input class="form-control @error('price') is-invalid @enderror"
                                       type="number"
                                       name="price"
                                       value="{{ old('price', $product->price) }}">
                                @error('price')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group md-5">
                                <label class="font-weight-bold">STOK</label>
                                <input class="form-control @error('stock') is-invalid @enderror"
                                       type="number"
                                       name="stock"
                                       value="{{ old('stock', $product->stock) }}">
                                @error('stock')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary md-3">UPADATE</button>
                            <button type="reset" class="btn btn-md btn-danger">RESET</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
