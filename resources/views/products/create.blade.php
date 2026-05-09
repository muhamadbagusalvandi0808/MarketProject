<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>ADD New Product</title>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('products.index') }}" class="btn btn-danger">Back</a>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">IMAGE</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" value="{{ old('image') }}" placeholder="Masukan Gambar Product">
                                    <!-- error message untuk image -->
                                    @error('image')
                                        <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">TITLE</label>
                                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title') }}" placeholder="Masukan Judul Product">
                                    <!-- error message untuk TITLE -->
                                    @error('title')
                                        <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">DESCRIPTION</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="6" placeholder="masukan deskripsi produk">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">PRICE</label>
                                <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" value="{{ old('price') }}" placeholder="Masukan Harge Product">
                                    <!-- error message untuk PRICE -->
                                    @error('price')
                                        <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="form-group md-5">
                                <label class="font-weight-bold">STOK</label>
                                <input class="form-control @error('stock') is-invalid @enderror" type="number" name="stock" value="{{ old('stock') }}" placeholder="Masukan Stok Product">
                                    <!-- error message untuk STOK -->
                                    @error('stock')
                                        <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary md-3">SAVE</button>
                            <button type="reset" class="btn btn-md btn-danger">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/4.13.1-lts/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
</body>
</html>